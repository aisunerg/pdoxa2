<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Classroom_type;
use App\Models\Project;
use App\Models\SchemeDay;
use App\Models\SchemeHour;
use App\Models\Ubication;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        return inertia('Classroom/indexClassroom',[
            'classrooms' => Classroom::where('project_id', $project->id)->get(),
            'classroom_types' => Classroom_type::all(),
            'ubications' => Ubication::all(),
            'scheme_days' => SchemeDay::all(),
            'scheme_hours' => SchemeHour::all(),
            'project' => $project,
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
        $classroom = new Classroom();
        $project = Project::where('id', $request->project_id)->get();

        $classroom->name = $request->name;
        $classroom->classroom_type_id = $request->classroom_type_id;
        $classroom->ubication_id = $request->ubication_id;
        $classroom->project_id = $request->project_id;
        $classroom->scheme_day_id = $request->scheme_day_id;
        $classroom->scheme_hour_id = $request->scheme_hour_id;

        $classroom->save();

        return to_route('project.classroom.index', $project)->with('message', 'Aula Creada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $project = Project::where('id', $classroom->project_id)->get();
        $borrado = $classroom->name;
        return to_route('project.classroom.index', $project)->with('message', 'Aula: "'.$borrado.'", Eliminada!');
    }
}
