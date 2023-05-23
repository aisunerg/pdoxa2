<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Pensum;
use Illuminate\Http\Request;

class PensumController extends Controller
{
    
    public function indexPensum()
    {
        return pensum::all();
    }

    public function index()
    {
        return inertia('Pensum/indexPensums', [
            'pensums' => Pensum::all(),
            'careers' => Career::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Pensum/createPensum');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pensum = new Pensum();

        $pensum->name = $request->name;
        $pensum->career_id = $request->career;
        $pensum->regime = $request->regime;
        $pensum->creation_date = '2000-01-01';

        $pensum->save();
        return to_route('mydash')->with('message', 'Pensum Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pensum $pensum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pensum $pensum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pensum $pensum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pensum $pensum)
    {
        $eliminado = $pensum->name;
        $pensum->delete();
        return to_route('pensum.index')->with('message', 'Se ha eliminado el pensum: "'.$eliminado.'" con exito');
    }
}
