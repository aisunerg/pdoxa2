<?php

namespace App\Http\Controllers;

use App\Models\Pensum;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function selectProject(Project $project)
    {
        return Inertia::render('Project/selectProject', [
            'project' => $project,
        ]);
    }

    public function index()
    {
        return inertia('Project/indexProjects', [
            'projects' => Project::all(),
            'pensums' => Pensum::all(),
        ]);
    }

    public function indexProject()
    {
        return Project::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Project/createProject');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $project = new Project;
        $slug = str_replace(" ", "-", $request->name);

        $project->name = $request->name;
        $project->slug = $slug;
        $project->pensum_id = $request->pensum;
        $project->academic_period = $request->lapso;
        $project->date = $request->fecha;
        $project->date_memo = $request->fecha;
        $project->observations = '';

        $project->save();

        return to_route('mydash')->with('message', 'Proyecto Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return $project;
        /* return Inertia::render('MyDashboard', [
            'LoadProject' => $project,
        ]); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $eliminado = $project->name;
        $project->delete();
        return to_route('project.index')->with('message', 'Se ha eliminado el proyecto: "'.$eliminado.'"');
    }
}
