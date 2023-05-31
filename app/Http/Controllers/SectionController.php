<?php

namespace App\Http\Controllers;

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
            'sections' => Section::where('project_id', $project->id)->get(),
            'teachsecs' => teacher_section::all(),
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
        $section = new Section();

        $section->name = $request->name;
        $section->subject_id = $request->subject;
        $section->project_id = $project->id;
        $section->quota = $request->quota;
        $section->shift_id = $request->shift_id;
        $section->save();

        $teacherComplete = TeacherSectionController::keep($section->id, $request->teacher_id);

        
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
        //
    }
}
