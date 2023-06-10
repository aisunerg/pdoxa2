<?php

namespace App\Http\Controllers;

use App\Models\ShiftHour;
use Illuminate\Http\Request;

class ShiftHourController extends Controller
{
    public static function keep($shift, $hour)
    {
        $shiftHour = new ShiftHour();

        $shiftHour->shift_id = $shift;
        $shiftHour->hour_id = $hour;
        $shiftHour->save();

        return 'Relacion Exitosa';
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
    public function show(ShiftHour $shiftHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShiftHour $shiftHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShiftHour $shiftHour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShiftHour $shiftHour)
    {
        //
    }
}
