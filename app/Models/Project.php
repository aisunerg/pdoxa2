<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    

    public function users()
    {
        $this->hasMany(Project::class, 'project_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
