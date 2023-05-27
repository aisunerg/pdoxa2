<?php

namespace App\Http\Controllers;

use App\Models\Municipy;
use Illuminate\Http\Request;

class MunicipyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Municipy::all();
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
    public function show(Municipy $municipy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Municipy $municipy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Municipy $municipy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Municipy $municipy)
    {
        //
    }
}
