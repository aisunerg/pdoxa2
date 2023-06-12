<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function states()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function municipies()
    {
        return $this->belongsTo(Municipy::class, 'municipy_id');
    }
    public function cards()
    {
        return $this->hasMany(Card::class, 'teacher_id');
    }

    //MUCHOS A MUCHOS
    public function secciones()
    {
        return $this->belongsToMany('App/Models/Section', 'teacher_sections');
    }
}