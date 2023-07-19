<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Classroom;
use App\Models\Pensum;
use App\Models\Project;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function selectProject(Project $project){
        //Se establecen la variables de sesion
        session(['project' => $project]);
        session(['pensum' => Pensum::find($project->pensum_id)]);

        $classrooms = Classroom::where('project_id', $project->id)->get();
        $blocks = 0;
        $freeBlocks = 0;
        //Se establecen los bloques existentes y libres
        foreach ($classrooms as $classroom) {
            $aBlocks = Block::where('classroom_id', $classroom->id)->get();
            $fBlocks = array_filter($aBlocks->toArray(), function($var){
                return $var['meeting_section_id'] == null;
            });
            $freeBlocks = $freeBlocks + count($fBlocks);            
            $blocks = $blocks + count($aBlocks->toArray());            
        
        }


        return Inertia::render('Project/selectProject', [
            'project' => $project,
            'pensum' => Pensum::with('career')->find($project->pensum_id),
            'cantSec' => Section::where('project_id', $project->id)->count(),
            'cantClass' => Classroom::where('project_id', $project->id)->count(),
            'freeBlocks' => $freeBlocks, 
            'Blocks' => $blocks, 
        ]);
    }

    

    public function horary()
    {
        $project = session('project');

        $classrooms = Classroom::where('project_id', $project->id)->get();
        
        $blocks = [];
        foreach ($classrooms as $classroom) {
            $aBlocks = Block::where('classroom_id', $classroom->id)->whereNotNull('meeting_section_id')->with('day')->with('hour')->with('classrooms')->get();
            $blocks = array_merge($blocks, $aBlocks->toArray());
        }


        return inertia('Project/horaryProject', [
            'subjects' => Subject::where('pensum_id', $project->pensum_id)->orderBy('name')->get(),
            'sections' => Section::where('project_id', $project->id)->with('subject')->with('meetings')->with('teacher')->get(),
            'blocks' => $blocks,
        ]);
    }    

    public function index(){
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
