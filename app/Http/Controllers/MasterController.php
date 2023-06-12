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

        $classrooms = Project::find($project->id)->classrooms;
        $long = count($classrooms);
        $blocks = [];
        foreach ($classrooms as $classroom) {
            $selBlocks = Classroom::find($classroom->id)->blocks;
            $blocks = array_merge($blocks, $selBlocks->toArray());
        }

        return inertia('Master/viewMaster',[
            'subjects' => Subject::all(),
            'sections' => Section::where('project_id', $project->id)->get(),
            'sec_met' => MeetingSection::all(),
            'meetings' => Meeting::all(),
            'classrooms' => $classrooms,
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
        if (!$limit > 1) {
            return "tiene 1 hora";
        }else {
            $id = $block["id"];
            
            for ($i=0; $i < $limit; $i++) { 
                // $Block = Block::where('classroom_id', $block['classroom_id'])
                //                     ->where('day_id', $block['day_id'])
                //                     ->where('hour_id', $block['hour_id']+$i)
                //                     ->get();
                // $arrayBlock = $Block->toArray();
                // $id = $arrayBlock[0]['id'];
                // return $id;
                $aBlock = Block::find($id+$i);
                $aBlock->meeting_section_id = $request->meetsec;
                $aBlock->save();
            }
            return "cool";
        }
    }
}
