<?php

namespace App\Http\Controllers;

use App\Models\Classroom_type;
use App\Models\Subject;
use App\Models\teacher_section;
use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function borrar()
    {
        
        Classroom_type::truncate();
    }
}
