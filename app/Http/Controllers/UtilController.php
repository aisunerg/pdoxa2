<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function borrar()
    {
        
        $obj = Block::find(81);

        

        // return dd($obj);
        return $obj->classrooms;
    }
}
