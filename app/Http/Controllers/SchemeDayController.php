<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\SchemeDay;
use App\Models\ShiftHour;
use Illuminate\Http\Request;

class SchemeDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('SchemeDay/indexSchemeDay',[
            'schemedays' => SchemeDay::all()
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
        $schemeday = new SchemeDay();

        $schemeday->name = $request->name;
        $schemeday->save();

        return to_route('schemeday.index')->with('message', 'Esquema de Dia Añadido!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchemeDay $schemeday)
    {
        return inertia('Day/schemeDays',[
            'schemeday' => $schemeday,
            'days' => Day::where('scheme_day_id', $schemeday->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchemeDay $schemeDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchemeDay $schemeDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchemeDay $schemeday)
    {
        $borrado = $schemeday->name;
        $schemeday->delete();
        return to_route('schemeday.index')->with('message', 'Esquema de dia: "'.$borrado.'", Eliminado!');
    }
}
