<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchemeDay extends Model
{
    use HasFactory;

    public function days()
    {
        return $this->hasMany(Day::class, 'scheme_day_id');
    }
}
