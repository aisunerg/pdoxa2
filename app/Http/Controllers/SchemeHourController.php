<?php

namespace App\Http\Controllers;

use App\Models\SchemeHour;
use Illuminate\Http\Request;

class SchemeHourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('SchemeHour/indexSchemeHour',[
            'schemehours' => SchemeHour::all()
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
        $schemehour = new SchemeHour();

        $schemehour->name = $request->name;
        $schemehour->sep_num = $request->sep_num;
        $schemehour->save();

        return to_route('schemehour.index')->with('message', 'Esquema de hora Añadido!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchemeHour $schemeHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchemeHour $schemeHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchemeHour $schemeHour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchemeHour $schemehour)
    {
        $borrado = $schemehour->name;
        $schemehour->delete();
        return to_route('schemehour.index')->with('message', 'Esquema de Hora: "'.$borrado.'", eliminado.');
    }
}
