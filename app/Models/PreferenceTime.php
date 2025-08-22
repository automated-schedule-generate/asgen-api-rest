<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferenceTime extends Model
{
    /** @use HasFactory<\Database\Factories\PreferenceTimeFactory> */
    use HasFactory;
    protected $fillable = [
        'selected',
        'preference_id'
    ];

    public function preference()
    {
        return $this->belongsTo(Preference::class);
    }
}
