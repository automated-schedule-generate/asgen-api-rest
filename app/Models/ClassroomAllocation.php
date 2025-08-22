<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomAllocation extends Model
{
    /** @use HasFactory<\Database\Factories\ClassroomAllocationFactory> */
    use HasFactory;

    protected $fillable = [
        'timetable_allocation_id',
        'classroom_id'
    ];

    public function timetableAllocation()
    {
        return $this->belongsTo(TimetableAllocation::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
