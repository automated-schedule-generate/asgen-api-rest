<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'workload',
        'is_optional',
        'course_semester',
        'prerequisite_id',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function prerequisite()
    {
        return $this->belongsTo(Subject::class, 'prerequisite_id');
    }

    public function prerequisiteBy()
    {
        return $this->hasMany(Subject::class, 'prerequisite_id');
    }
    public function subjectTeachers()
    {
        return $this->hasMany(SubjectTeacher::class);
    }
}
