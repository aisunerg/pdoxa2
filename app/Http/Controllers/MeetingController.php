<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Classroom_type;
use App\Models\Meeting;
use App\Models\Pensum;
use App\Models\Subject;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Meeting/indexMeeting',[
            'meetings' => Meeting::all(),
            'claasroom_types' => Classroom_type::all(),
            'subjects' => Subject::all(),
        ]);
    }

    public function meetingSubject(Subject $subject)
    {
        return inertia('Meeting/subjectMeeting',[
            'meetings' => Meeting::where('subject_id', $subject->id)->get(),
            'classroom_types' => Classroom_type::all(),
            'subject' => $subject,
            'pensum' => Pensum::where('id', $subject->pensum_id)->get()
        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $meeting = new Meeting();

        $meeting->subject_id = $request->subject;
        $meeting->hour_amount = $request->hours;
        $meeting->classroomType_id = $request->classroom_type;
        $meeting->save();

        
        return to_route('meetingSubject', $request->subject)->with('message', 'Encuentro Añadido!.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meeting $meeting)
    {
        $subject = $meeting->subject_id;
        $meeting->delete();
        return to_route('meetingSubject', $subject)->with('message', 'Encuentro eliminado con exito.');
    }
}
