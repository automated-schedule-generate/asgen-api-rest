<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TimetableAllocation extends Model
{
    /** @use HasFactory<\Database\Factories\TimetableAllocationFactory> */
    use HasFactory;

    protected $fillable = [
        'day',
        'class_id',
        'subject_id',
        'semester_id',
    ];

    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class);
    }
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }
    public function allocationTimes(): HasMany
    {
        return $this->hasMany(AllocationTime::class);
    }
    public function classroomAllocation(): HasMany
    {
        return $this->hasMany(ClassroomAllocation::class);
    }
}
