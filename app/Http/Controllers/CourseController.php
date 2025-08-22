<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseShowTimetableResource;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::orderBy('name')->paginate();
        return response()->json($courses);
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
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->validated());

        if ($request->has('subjects')) {
            $subjectIds = $request->input('subjects');
            Subject::whereIn('id', $subjectIds)->update(['course_id' => $course->id]);
        }
        return response()->json($course, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load(['subjects', 'classes']);
        return response()->json($course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        if ($request->has('subjects')) {
            $course->subjects()->update(['course_id' => null]);
            $subjectIds = $request->input('subjects');
            Subject::whereIn('id', $subjectIds)->update(['course_id' => $course->id]);
        }
        return response()->json($course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->subjects()->update(['course_id' => null]);
        $course->delete();
        return response()->json(null, 204);
    }

    public function timetable(Request $request, Course $course)
    {
        $course->load([
            'classes' => function ($query) {
                $query->select(['id', 'turn', 'course_semester', 'course_id', 'semester_id']);
            },
            'classes.timetables' => function ($query) {
                $query->select(['id', 'day', 'class_id', 'subject_id']);
            },
            'classes.timetables.allocationTimes' => function ($query) {
                $query->select(['id', 'timetable_allocation_id', 'slot_time']);
            },
            'classes.timetables.subject' => function ($query) {
                $query->select(['id', 'name']);
            }
        ]);
        $course->classes->each(function ($class) {
            $newTimetable = [];
            $class->timetables->each(function ($timetable) use (&$newTimetable) {
                $timetable->allocationTimes->each(function ($allocationTime) use ($timetable, &$newTimetable) {
                    if(!isset($newTimetable[(int)$allocationTime->slot_time])) {
                        $newTimetable[(int) $allocationTime->slot_time] = [];
                    }
                    $newTimetable[(int) $allocationTime->slot_time][(int) $timetable->day] = $timetable->subject;
                });
            });
            $class->newTimetables = $newTimetable;
        });
        return response(new CourseShowTimetableResource($course), 200);
    }
}
