<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Classroom;
use App\Models\Section;
use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function borrar()
    {
        // $section = Block::with('classrooms')->get();
        $obj = Classroom::with('blocks')->find(11);

        

        return dd($obj->toArray());
    }
}
