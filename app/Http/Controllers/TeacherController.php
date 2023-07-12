<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Block;
use App\Models\Departament;
use App\Models\Section;
use App\Models\Municipy;
use App\Models\State;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    
    
    public function horaryTeachers()
    {
        $project = session('project');


        $teachers = Teacher::with('sections')
        ->whereHas('sections', function ($query) use ($project) {
            $query->where('project_id', $project->id);
        })->with('sections.subject')->with('sections.meetings')->get();

        $blocks = Block::whereNotNull('meeting_section_id')
        ->whereHas('classrooms', function($query) use ($project) {
            $query->where('project_id', $project->id);
        })
        ->with('day')
        ->with('hour')
        ->with('classrooms')
        ->get();

        return inertia('Teacher/horaryTeachers', [
            'teachers' => $teachers,
            'departaments' => Departament::with('adress')->get(),
            'blocks' => $blocks,
        ]);
    }


    public function index()
    {
        return inertia('Teacher/indexTeacher',[
            'teachers' => Teacher::all(),
            'areas' => Area::all(),
            'states' => State::all(),
            'municipies' => Municipy::all()
        ]);
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
        $teacher = new teacher();

        $teacher->CI = $request->CI;
        $teacher->name = $request->name;
        $teacher->lastname = $request->lastname;
        $teacher->area_id = $request->area;
        $teacher->phone = $request->phone;

        if ($request->home_phone == "") {
            $teacher->home_phone = "1111111";
        }else {
            $teacher->home_phone = $request->home_phone;
        }
        $teacher->email = $request->email;
        $teacher->adress = $request->adress;
        $teacher->state_id = $request->state;
        $teacher->municipy_id = $request->municipy;

        $teacher->save();

        return to_route('teacher.index')->with('message', 'Profesor Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $borrado = $teacher->name;
        $teacher->delete();
        return to_route('teacher.index')->with('message', 'El profesor "'.$borrado.'" fue borrado.');
    }
}
