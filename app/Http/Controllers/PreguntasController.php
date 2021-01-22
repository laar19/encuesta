<?php

namespace App\Http\Controllers;

use App\preguntas;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
/*use Illuminate\Support\Facades\DB;
use App\opciones_preguntas;
use App\otras_opciones_preguntas;*/

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = collect();

        $datas->put('cedula', $request->input('cedula'));
        $datas->put('primer_nombre', $request->input('primer_nombre'));
        $datas->put('segundo_nombre', $request->input('segundo_nombre'));
        $datas->put('primer_apellido', $request->input('primer_apellido'));
        $datas->put('segundo_apellido', $request->input('segundo_apellido'));
        $datas->put('genero', $request->input('genero'));
        $datas->put('nivel_instruccion', $request->input('nivel_instruccion'));

        return $datas;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function show(preguntas $preguntas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function edit(preguntas $preguntas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, preguntas $preguntas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function destroy(preguntas $preguntas)
    {
        //
    }
}
