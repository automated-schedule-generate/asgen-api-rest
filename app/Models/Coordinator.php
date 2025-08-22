<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    /** @use HasFactory<\Database\Factories\CoordinatorFactory> */
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'teacher_id',
    ];

    // Coordinator.php
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

}
