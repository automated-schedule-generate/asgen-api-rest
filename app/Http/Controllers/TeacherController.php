<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Preference;
use App\Models\PreferenceTime;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with('user')
            ->paginate(10);

        return response()->json($teachers);
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
    public function store(StoreTeacherRequest $request)
    {

        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        DB::beginTransaction();
        try {
            $teacher = Teacher::create($validated);
            foreach ($validated['preferences'] as $preference) {
                $turn = $preference['turn'];
                foreach ($preference['preference'] as $preferenceDay => $preferenceTimes) {
                    $preference = Preference::create([
                        'day' => (string) $preferenceDay,
                        'turn' => $turn,
                        'teacher_id' => $validated['user_id'],
                    ]);
                    foreach ($preferenceTimes as $hora => $isSelected) {
                        if ($isSelected === true) {
                            PreferenceTime::create([
                                'selected' => (string) ($hora),
                                'preference_id' => $preference->id,
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
        return response()->json($teacher, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $teacher = Teacher::where('user_id', $id)->firstOrFail();
        return response()->json($teacher);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teachers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, $id)
    {
        $teacher = Teacher::where('user_id', $id)->firstOrFail();
        $validated = $request->validated();
        $teacher->update($validated);

        return response()->json($teacher);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teachers)
    {
        $teachers->delete();
        return response()->json(null, 204);
    }
}
