<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Section extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_sections');
    }

    public function meetings()
    {
        return $this->belongsToMany(Meeting::class, 'meeting_sections')->withPivot('id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
