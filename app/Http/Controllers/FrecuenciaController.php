<?php

namespace App\Http\Controllers;

use App\Models\Frecuencia;
use Illuminate\Http\Request;

class FrecuenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Frecuencia::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frecuencia  $frecuencia
     * @return \Illuminate\Http\Response
     */
    public function show(Frecuencia $frecuencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frecuencia  $frecuencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frecuencia $frecuencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frecuencia  $frecuencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frecuencia $frecuencia)
    {
        //
    }
}
