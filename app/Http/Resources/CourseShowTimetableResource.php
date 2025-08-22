<?php

namespace App\Http\Resources;

use App\Http\Resources\courses\CourseShowTimetableClassesResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseShowTimetableResource extends JsonResource
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
            'name' => $this->name,
            'total_semesters' => $this->total_semesters,
//            'classes' => $this->classes,
            'classes' => CourseShowTimetableClassesResource::collection($this->classes),
        ];
    }
}
