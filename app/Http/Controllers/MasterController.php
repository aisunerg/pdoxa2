<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Classroom;
use App\Models\Day;
use App\Models\Hour;
use App\Models\Meeting;
use App\Models\MeetingSection;
use App\Models\Project;
use App\Models\SchemeDay;
use App\Models\SchemeHour;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\teacher_section;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function view()
    {
        $project = session('project');

        if ($project == null) {
            return to_route('mydash');
        }

        $classrooms = Project::find($project->id)->classrooms;
        $long = count($classrooms);
        $blocks = [];
        foreach ($classrooms as $classroom) {
            $selBlocks = Block::where('classroom_id', $classroom->id)->with('meetsec')->get();
            $blocks = array_merge($blocks, $selBlocks->toArray());
        }

        return inertia('Master/viewMaster',[
            'subjects' => Subject::where('pensum_id', $project->pensum_id)->get(),
            'sections' => Section::where('project_id', $project->id)->with('meetings')->with('teacher')->with('subject')->get(),
            'sec_met' => MeetingSection::all(),
            'meetings' => Meeting::all(),
            'classrooms' => Classroom::where('project_id', $project->id)->with('ubication')->with('type')->get(),
            'project' => $project,
            'blocks' => $blocks,
            'schemehours' => SchemeHour::all(),
            'schemedays' => SchemeDay::all(),
            'hours' => Hour::all(),
            'days' => Day::all(),

        ]);
    }

    public function isAssigned(Request $request)
    {
        
        $block = Block::where('classroom_id', $request->classroom['id'])
                        ->where('day_id', $request->day)
                        ->where('hour_id', $request->hour)
                        ->get();
        $block = $block[0];
        
        if ($block->meeting_section_id == null) {
            return $block;
        }else {
            
                    $meetsec = MeetingSection::where('id', $block->meeting_section_id)->get();
                    $section_id = $meetsec[0]->section_id;
                    $section = Section::where('id', $section_id)->get();
            
                    $subject = Subject::where('id', $section[0]->subject_id)->get();
            
                    $teachsec = teacher_section::where('section_id', $section->id)->get();
                    $teacher = Teacher::where('id', $teachsec->id)->get();
            
                    $block->subject = $subject;
                    $block->teacher = $teacher;
                    return $block;
        }
    }

    public function Assigment(Request $request)
    {
        
        $meeting = $request->meet;
        $limit = $meeting['hour_amount'];
        $block = $request->block;

        // VALIDAR CONCORDANCIA DE TIPO DE AULA. ENCUENTRO - AULA
        $cBlock = Block::find($block['id']);
        if ($cBlock->classrooms->classroom_type_id != $meeting['classroomType_id']) {
            return to_route('master.view')->with('message', 'Tipo de aula incorrecto');
        }
        

        if (!$limit > 1) {
            return "tiene 1 hora";
        }else {
            $id = $block["id"];

            // VALIDAR DISPONIBILIDAD DE LOS BLOQUES
            for ($i=0; $i < $limit ; $i++) { 
                $aBlock = Block::find($id+$i);
                if ($aBlock->meeting_section_id != null) {
                    return to_route('master.view')->with('message', 'Bloque ocupado');
                }
            }
            
            for ($i=0; $i < $limit; $i++) {
                $aBlock = Block::find($id+$i);
                if ($aBlock->meeting_section_id != null) {
                    
                    return to_route('master.view');
                }
                $aBlock->meeting_section_id = $request->meetsec;
                $aBlock->save();
            }
            return to_route('master.view');
        }
    }
}
