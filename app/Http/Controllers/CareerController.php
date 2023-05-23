<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    
    public function indexCareer()
    {
        return Career::all();
    }
    
    public function index()
    {
        return inertia('Career/indexCareer',[
            'careers' => Career::all(),
            'areas' => Area::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Career/createCareer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $career = new Career();

        $career->name = $request->name;
        $career->code = $request->code;
        $career->area_id = $request->area;

        $career->save();

        return to_route('mydash')->with('message', 'Carrera creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        $borrado = $career->name;
        $career->delete();
        to_route('career.index')->with('message', 'La carrera "'.$borrado.'" fue borrada con exito.');
    }
}
