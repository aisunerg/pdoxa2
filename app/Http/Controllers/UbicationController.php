<?php

namespace App\Http\Controllers;

use App\Models\Ubication;
use Illuminate\Http\Request;

class UbicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Ubication/indexUbication',[
            'ubications' => Ubication::all(),
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
        $ubication = new Ubication();

        $ubication->name = $request->name;
        $ubication->description = $request->description;
        $ubication->coords = $request->coords;
        $ubication->save();

        return to_route('ubication.index')->with('message', 'Ubicacion Añadida.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ubication $ubication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ubication $ubication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ubication $ubication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ubication $ubication)
    {
        $borrado = $ubication->name;
        $ubication->delete();
        return to_route('ubication.index')->with('message', 'Ubicacion: "'.$borrado.'", Eliminada.');
    }
}
