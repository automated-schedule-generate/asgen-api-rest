<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectTeacherFactory> */
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'teacher_id',
        'semester_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
