<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\teacher_section;
use Illuminate\Http\Request;

class TeacherSectionController extends Controller
{
    public static function keep($section, $teacher)
    {
        $teachsec = new teacher_section();

        $teachsec->section_id = $section;
        $teachsec->teacher_id = $teacher;

        $teachsec->save();

        return "Profesor Vinculado";
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(teacher_section $teacher_section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teacher_section $teacher_section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, teacher_section $teacher_section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(teacher_section $teacher_section)
    {
        //
    }
}
