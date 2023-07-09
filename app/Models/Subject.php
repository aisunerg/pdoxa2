<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function departament()
    {
        return $this->belongsTo(Departament::class);
    }
}
