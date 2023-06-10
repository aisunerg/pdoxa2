<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\MeetingSection;
use Illuminate\Http\Request;

class MeetingSectionController extends Controller
{
    
    public static function keep($section_id, $subject_id)
    {
        $meets = Meeting::where('subject_id', $subject_id)->get();
        $long = count($meets);
        if ($long > 0) {
            foreach ($meets as $meet) {
                $metsec = new MeetingSection();
                $metsec->section_id = $section_id;
                $metsec->meeting_id = $meet->id;
                $metsec->save();
            }
        }else{
            return false;
        }
        
        return true;
    }
    
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MeetingSection $meetingSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MeetingSection $meetingSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MeetingSection $meetingSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetingSection $meetingSection)
    {
        //
    }
}
