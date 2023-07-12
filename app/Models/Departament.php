<?php

namespace App\Models;

use App\Models\Adress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;

    public function adress()
    {
        return $this->belongsTo(Adress::class);
    }
}
