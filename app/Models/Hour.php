<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;

    public function schemehour()
    {
        return $this->belongsTo(SchemeHour::class, 'scheme_hour_id');
    }

    public function shift()
    {
        return $this->belongsToMany(Shift::class, 'shift_hours');
    }
}
