<?php

namespace App\Http\Controllers;

use App\Models\Classroom_type;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClassroomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('ClassroomType/indexClassroomType',[
            "ClassroomTypes" => Classroom_type::all()
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
        $classtype = new Classroom_type();

        $classtype->name = $request->name;
        $classtype->modality = $request->modality;
        $classtype->description = $request->description;
        $classtype->save();

        return to_route('classroom_type.index')->with('message', 'Tipo de Aula Creada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom_type $classroom_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom_type $classroom_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom_type $classroom_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom_type $classroom_type)
    {
        $borrado = $classroom_type->name;
        $classroom_type->delete();
        return to_route('classroom_type.index')->with('message', 'Tipo de Aula "'.$borrado.'" eliminada');
    }
}
