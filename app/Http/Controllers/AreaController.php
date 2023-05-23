<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexArea()
    {
        return Area::all();
    }

    public function index()
    {
        return inertia('Area/indexArea',[
            'areas' => Area::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Area/createArea');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $area = new Area();
        $area->name = $request->name;
        $area->user_id = $request->user;
        $area->save();

       return to_route('mydash')->with('message', 'Se ha creado el Area con Exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        $erased = $area->name;
        $area->delete();
        return to_route('area.index')->with('message', 'El area "'.$erased.'" fue borrada con exito.');
    }
}
