<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use App\Models\Departament;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Departament/indexDepartament',[
            'departaments' => Departament::all(),
            'adresses' => Adress::all(),
            'teachers' => Teacher::all()
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
        $departament = new Departament();

        $departament->name = $request->name;
        $departament->teacher_id = $request->teacher;
        $departament->adress_id = $request->adress;
        $departament->avr = $request->avr;
        $departament->save();

        return to_route('departament.index')->with('message', 'Nuevo departamento agregado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departament $departament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departament $departament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departament $departament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departament $departament)
    {
        $borrado = $departament->name;
        $departament->delete();
        return to_route('departament.index')->with('message', 'El departamento "'.$borrado.'" fue borrado con exito.');
    }
}
