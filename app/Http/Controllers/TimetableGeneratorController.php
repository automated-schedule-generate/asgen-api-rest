<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SchoolClass;
use App\Models\TimetableAllocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TimetableGeneratorController extends Controller
{
    private string $baseURL;

    public function __construct()
    {
        $this->baseURL = strval( env('MICROSERVICE_URL', 'http://localhost:9000') );
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validation = $request->validate([
                'data' => ['required', 'array'],
                'data.*.id' => ['required', 'exists:courses,id'],
                'data.*.classes' => ['required', 'array'],
                'data.*.classes.*.id' => ['required', 'exists:classes,id'],
                'data.*.classes.*.timetables' => ['required', 'array'],
                'data.*.classes.*.timetables.*.*' => ['nullable', 'array:id'],
                'data.*.classes.*.timetables.*.*.id' => ['required_with:data.*.classes.*.timetables.*.*', 'exists:subjects,id'],
            ]);

            foreach ($validation['data'] as $course) {
                foreach($course['classes'] as $class) {
                    $timetables = $class['timetables'];

                    foreach($timetables as $timetable) {
                        $registeredSubjectsId = [];
                        foreach($timetable as $col => $subject) {
                            if($subject && !in_array($subject['id'], $registeredSubjectsId)) {
                                $timetableAllocation = TimetableAllocation::create([
                                    'subject_id' => $subject['id'],
                                    'class_id' => $class['id'],
                                    'day' => $col
                                ]);
                                $createManyAllocationTimes = [];
                                for($row = 0; $row < 6; $row++) {
                                    if($timetables[$row][$col] && $subject['id'] === $timetables[$row][$col]['id']) {
                                        $createManyAllocationTimes[] = [
                                            'slot_time' => $row
                                        ];
                                    }
                                }
                                $registeredSubjectsId[] = $subject['id'];
                                $timetableAllocation->allocationTimes()->createMany($createManyAllocationTimes);
                            }
                        }
                    }

                }
            }
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return $e;
        }

        return response()->noContent();
    }

    public function start()
    {
        $courses = Course::select(['id', 'name', 'total_semesters'])
            ->with([
                'subjects' => function ($query) {
                    $query->select(['id', 'name', 'workload', 'is_optional', 'course_semester', 'prerequisite_id', 'course_id']);
                },
                'classes',
            ])
            ->get();
        $response = Http::post($this->baseURL . '/start', $courses);

        return response($response->json(), $response->status());
    }
}
