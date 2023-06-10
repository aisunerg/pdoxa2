<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Classroom;
use App\Models\Classroom_type;
use App\Models\Day;
use App\Models\Hour;
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
    public function store(Request $request, Project $project)
    {
        $classroom = new Classroom();

        $classroom->name = $request->name;
        $classroom->classroom_type_id = $request->classroom_type;
        $classroom->ubication_id = $request->ubication;
        $classroom->project_id = $request->project;
        $classroom->scheme_day_id = $request->scheme_day;
        $classroom->scheme_hour_id = $request->scheme_hour;

        $classroom->save();
        
        // CREANDO BLOQUES SIN ASIGNAR
        $days = Day::where('scheme_day_id', $classroom->scheme_day_id)->get();
        $hours = Hour::where('scheme_hour_id', $classroom->scheme_hour_id)->get();

        foreach ($days as $day) {
            foreach ($hours as $hour) {
                $block = new Block();
                
                $block->classroom_id = $classroom->id;
                $block->day_id = $day->id;
                $block->hour_id = $hour->id;
                $block->active = 1;
                $block->meeting_section_id = NULL;
                $block->save();

            }
        }


        return to_route('project.classroom.index', $project->slug)->with('message', 'Aula Creada! Nuevos Bloques Disponibles.');
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
        $classroom->delete();
        return to_route('project.classroom.index', $project[0]->slug)->with('message', 'Aula: "'.$borrado.'", Eliminada!');
    }
}
