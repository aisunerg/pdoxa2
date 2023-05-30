<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Pensum;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Subject/indexSubject',[
            'subjects' => Subject::all(),
            'pensums' => Pensum::all(),
            'departaments' => Departament::all()
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
        $subject = new Subject();

        $subject->code = $request->code;
        $subject->name = $request->name;
        $subject->avr = $request->avr;
        $subject->u_c = $request->u_c;
        $subject->h_s = $request->h_s;
        $subject->pensum_id = $request->pensum;
        $subject->level = $request->level;
        $subject->departament_id = $request->departament;
        $subject->save();

        return to_route('subject.index')->with('message', 'Materia agregada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $borrado = $subject->name;
        $subject->delete();
        return to_route('subject.index')->with('message', 'La Materia "'.$borrado.'" fue Eliminada');
    }
}
