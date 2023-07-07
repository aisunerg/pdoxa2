<?php

namespace App\Http\Controllers;

use App\Models\MeetingSection;
use App\Models\Project;
use App\Models\Section;
use App\Models\Shift;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\teacher_section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        return inertia('Section/indexSection',[
            'project' => $project,
            'sections' => Section::with('teacher')->where('project_id', $project->id)->get(),
            'shifts' => Shift::all(),
            'subjects' => Subject::where('pensum_id', $project->pensum_id)->orderBy('level')->get(), 
            'teachers' => Teacher::where('id', 'LIKE', '%%')->orderBy('name')->get(), 
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
        return $request;

        $validated = $request->validate([
            "name" => 'required|max:255',
            "materia" => 'required',
            "project" => 'required',
            "quota" => 'required',
            "shift_id" => 'required',
            "profesor" => 'required'
        ]);

        $val = Section::where('subject_id', '=', $request->materia)
        ->where('name', '=', $request->name)
        ->first();

        if ($val) {
            return to_route('project.section.index', $project->slug)->with('message', 'ERROR: Ya existe una seccion con este nombre');
        }
        
        $section = new Section();

        $section->name = $request->name;
        $section->subject_id = $request->materia;
        $section->project_id = $project->id;
        $section->quota = $request->quota;
        $section->shift_id = $request->shift_id;
        $section->save();
        
        $project = session('project');
        
        try {
            $subject = Subject::find($request->subject);
            $limit = count($subject->meetings->toArray());
            if ($limit == 0) {
                $section->delete();
                return to_route('project.section.index', $project->slug)->with('message', 'La materia "'.$subject->name.'" no tiene encuentros asignados');
            }
            foreach ($subject->meetings as $meeting) {
                $section->meetings()->attach($meeting->id);
            }
            $meetingComplete = "Encuentro Relacionado";//MeetingSectionController::keep($section->id, $section->subject_id);
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejo de la excepción
            $section->delete();
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1452) {
                // Manejo específico para el error de clave inexistente
                return to_route('project.section.index', $project->slug)->with('message', 'La materia "'.$subject->name.'" no tiene encuentros asignados');
            } else {
                return to_route('project.section.index', $project->slug)->with('message', 'Ha ocurrido un error en la base de datos');
            }
        }
        
        if ($meetingComplete) {
            $section->teacher()->attach($request->profesor);
            $teacherComplete = "Profesor Relacionado";
        }else {
            $section->delete();
            return to_route('project.section.index', $project->slug)->with('message', 'No existen encuentros para esta materia');
        }

        
        return to_route('project.section.index', $project->slug)->with('message', 'Seccion Creada. '.$teacherComplete);
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $project = session('project');
        $borrado = $section->name;
        $section->teacher()->detach($section->teacher[0]->id);
        $section->delete();
        return to_route('project.section.index', $project->slug)->with('message', 'Seccion "'.$borrado.'" Eliminada.');
    }
}
