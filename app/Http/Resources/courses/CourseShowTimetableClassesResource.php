<?php

namespace App\Http\Resources\courses;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseShowTimetableClassesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "turn" => $this->turn,
            "course_semester" => $this->course_semester,
            "course_id" => $this->course_id,
            "semester_id" => $this->semester_id,
            'timetables' => $this->newTimetables,
        ];
    }
}
