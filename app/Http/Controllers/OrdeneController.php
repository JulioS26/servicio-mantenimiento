<?php

namespace App\Http\Controllers;

use App\Models\Ordene;
use Illuminate\Http\Request;
use App\Http\Requests\OrdenRequest;

class OrdeneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Ordene::get();

        $per_page = $request->per_page;

        return Ordene::paginate($per_page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrdenRequest $request)
    {

        // $request->validate([
        //     'equipo'=>'required',
        //     'codigo'=>'required',
        //     'frecuencia'=>'required',
        //     'mes'=>'required',
        //     'horaInicio'=>'required',
        //     'horaFinal'=>'required',
        //     'tiempoTotal'=>'required',
        //     'actividades'=>'required',
        // ]);

        $orden = new Ordene;
        $orden->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ordene  $ordene
     * @return \Illuminate\Http\Response
     */
    public function show(Ordene $ordene)
    {
        return $ordene;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ordene  $ordene
     * @return \Illuminate\Http\Response
     */
    public function update(OrdenRequest $request, Ordene $ordene)
    {
        $ordene->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordene  $ordene
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordene $ordene)
    {
        //
    }
}
