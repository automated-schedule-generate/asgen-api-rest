<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePreferenceRequest;
use App\Http\Requests\UpdatePreferenceRequest;
use App\Models\Preference;
use App\Models\PreferenceTime;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preferences = Preference::with('preferenceTimes')->paginate(10);
        return response()->json($preferences);
    }

    public function showTeacherPreferences($id)
    {
        $preferences = Preference::where('teacher_id', $id)
            ->with('preferenceTimes')
            ->get();

        if ($preferences->isEmpty()) {
            return response()->json(null, 404);
        }

        return response()->json($preferences);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePreferenceRequest $request)
    {
        $validated = $request->validated();
        $teacherId = $validated['teacher_id'] = auth()->user()->id;

        DB::beginTransaction();

        try {
            $teacher = Teacher::where('user_id', $teacherId)->firstOrFail();

            $teacher->preferences()->each(function ($preference) {
                $preference->preferenceTimes()->delete();
                $preference->delete();
            });

            foreach ($validated['preferences'] as $preference) {
                $turn = $preference['turn'];
                foreach ($preference['preference'] as $preferenceDay => $preferenceTimes) {
                    if (empty($preferenceTimes)) {
                        continue;
                    } else {
                        $newPreference = Preference::create([
                            'day' => (string) $preferenceDay,
                            'turn' => $turn,
                            'teacher_id' => $teacherId,
                        ]);
                    }
                    foreach ($preferenceTimes as $hora => $isSelected) {
                        if ($isSelected === true) {
                            PreferenceTime::create([
                                'selected' => (string) ($hora),
                                'preference_id' => $newPreference->id,
                            ]);
                        }
                    }

                }

            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return response()->json($teacher->load('preferences.preferenceTimes'), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $teacherId = auth()->user()->id;
        $teacher = Teacher::where('user_id', $teacherId)->first();

        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        return response()->json($teacher->preferences()->with('preferenceTimes')->get());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Preference $preference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePreferenceRequest $request, Preference $preference)
    {
        $validated = $request->validated();
        $teacherId = $validated['teacher_id'] = auth()->user()->id;

        DB::beginTransaction();

        try {
            $teacher = Teacher::where('user_id', $teacherId)->firstOrFail();

            $teacher->preferences()->each(function ($preference) {
                $preference->preferenceTimes()->delete();
                $preference->delete();
            });

            foreach ($validated['preferences'] as $preference) {
                $turn = $preference['turn'];
                foreach ($preference['preference'] as $preferenceDay => $preferenceTimes) {
                    $newPreference = Preference::create([
                        'day' => (string) $preferenceDay,
                        'turn' => $turn,
                        'teacher_id' => $teacherId,
                    ]);
                    foreach ($preferenceTimes as $hora => $isSelected) {
                        if ($isSelected === true) {
                            PreferenceTime::create([
                                'selected' => (string) ($hora),
                                'preference_id' => $newPreference->id,
                            ]);
                        }
                    }

                }

            }
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return response()->json($newPreference->load('preferenceTimes'), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $teacherId = auth()->user()->id;
        $teacher = Teacher::where('user_id', $teacherId)->firstOrFail();

        $preferences = $teacher->preferences();
        if (!$preferences) {
            return response()->json(['message' => 'Preferences not found'], 404);
        }
        $preferences->each(function ($preference) {
            $preference->preferenceTimes()->delete();
            $preference->delete();
        });
        return response()->json(null, 204);
    }
}
