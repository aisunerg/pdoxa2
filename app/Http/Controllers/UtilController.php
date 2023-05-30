<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function borrar()
    {
        Subject::truncate();
    }
}
