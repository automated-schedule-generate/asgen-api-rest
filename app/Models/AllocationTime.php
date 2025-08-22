<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllocationTime extends Model
{
    /** @use HasFactory<\Database\Factories\AllocationTimeFactory> */
    use HasFactory;

    protected $fillable = [
        'slot_time',
        'timetable_allocation_id',
    ];

    public function timetableAllocation()
    {
        return $this->belongsTo(TimetableAllocation::class);
    }
}
