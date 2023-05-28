<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use App\Models\Area;
use Illuminate\Http\Request;

class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Adress/indexAdress',[
            'adresses' => Adress::all(),
            'areas' => Area::all(),
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
        $adress = new Adress();

        $adress->name = $request->name;
        $adress->area_id = $request->area;
        $adress->save();

        return to_route('adress.index')->with('message', 'La direccion fue creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Adress $adress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adress $adress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adress $adress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adress $adress)
    {
        $borrado = $adress->name;
        $adress->delete();
        return to_route('adress.index')->with('message', 'La direccion "'.$borrado.'" fue borrada.');
    }
}
