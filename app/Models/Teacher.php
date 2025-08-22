<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'special_need',
        'description_special_need',
        'observation',
    ];
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'int';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function preferences()
    {
        return $this->hasMany(Preference::class, 'teacher_id');
    }

    // Teacher.php
    public function coordinator()
    {
        return $this->hasMany(Coordinator::class, 'teacher_id');
    }


    public function subectTeachers()
    {
        return $this->hasMany(SubjectTeacher::class);
    }
}
