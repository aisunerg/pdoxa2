<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;


    public function sections()
    {
        return $this->belongsToMany(Section::class, 'meeting_sections');
    }
}
