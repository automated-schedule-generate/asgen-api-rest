<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    /** @use HasFactory<\Database\Factories\SemesterFactory> */
    use HasFactory;

    protected $fillable = [
        'age',
        'semester'
    ];

    public function schoolClass()
    {
        return $this->hasMany(SchoolClass::class);
    }
    public function timetableAllocations()
    {
        return $this->hasMany(TimetableAllocation::class);
    }
    public function subjectTeachers()
    {
        return $this->hasMany(SubjectTeacher::class);
    }
}
