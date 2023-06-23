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
        
        $obj = Section::find(2);

        

        // return dd($obj);
        return $obj->meetings;
    }
}
