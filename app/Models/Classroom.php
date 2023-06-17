<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }

    public function ubication()
    {
        return $this->belongsTo(Ubication::class);
    }

    public function type()
    {
        return $this->belongsTo(Classroom_type::class, 'classroom_type_id');
    }
}
