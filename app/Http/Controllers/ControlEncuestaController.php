<?php

namespace App\Http\Controllers;

use App\control_encuesta;
use Illuminate\Http\Request;

class ControlEncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
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
        $control_encuesta = collect();
        $control_encuesta->put('fecha_apertura', $request->input('fecha_apertura'));
        $control_encuesta->put('fecha_cierre', $request->input('fecha_cierre'));
        $control_encuesta->put('aperturada', 1);
        control_encuesta::create(json_decode(json_encode($control_encuesta), true));
        
        return 'it works';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Control_encuesta  $control_encuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Control_encuesta $control_encuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Control_encuesta  $control_encuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Control_encuesta $control_encuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Control_encuesta  $control_encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control_encuesta $control_encuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Control_encuesta  $control_encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control_encuesta $control_encuesta)
    {
        //
    }
}
