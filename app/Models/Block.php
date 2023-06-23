<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Block extends Model
{
    use HasFactory;

    public function classrooms()
    {
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

    public function meetsec()
    {
        return $this->belongsTo(MeetingSection::class, 'meeting_section_id');
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function hour()
    {
        return $this->belongsTo(Hour::class);
    }
}
