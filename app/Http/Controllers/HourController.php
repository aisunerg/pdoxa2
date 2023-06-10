<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use App\Models\ShiftHour;
use Illuminate\Http\Request;

class HourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $hour = new Hour();

        $hour->number = $request->number;
        $hour->start = $request->start;
        $hour->end = $request->end;
        $hour->scheme_hour_id = $request->schemehour;
        $hour->save();

        $shifthour = new ShiftHourController();
        $estado = $shifthour->keep($request->shift, $hour->id);

        return to_route('schemehour.show', $hour->scheme_hour_id)->with('message', 'Hora agregada!. '.$estado);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hour $hour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hour $hour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hour $hour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hour $hour)
    {
        $hour->delete();
        $borrar = ShiftHour::where('hour_id', $hour->id)->delete();
        return to_route('schemehour.show', $hour->scheme_hour_id)->with('message', 'Hora eliminada.');
    }
}
