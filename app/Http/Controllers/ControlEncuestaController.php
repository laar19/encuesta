<?php

namespace App\Http\Controllers;

use App\control_encuesta;
use Illuminate\Http\Request;

use App\control_encuestado;
use App\encuestado;
use App\respuestas;
use App\opciones_preguntas;

class ControlEncuestaController extends Controller
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
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function stats()
    {
        $estadisticas = collect();
        
        // Número de encuestados en la última encuesta
        $id_ultima_encuesta = json_decode(control_encuesta::latest('id')->first());
        if($id_ultima_encuesta != NULL) {
            $numero_encuestados = count(control_encuestado::select('id')->where('id_control_encuesta', $id_ultima_encuesta->id)->get());
            $estadisticas->put('numero_encuestados', $numero_encuestados);
        }
        else {
            return 'NO HAY NADA';
        }

        // Número de encuestados masculinos
        $numero_encuestados_masculinos = count(control_encuestado::select('control_encuestados.id')
            ->join('encuestados', 'encuestados.id', '=', 'control_encuestados.id_encuestado')
            ->where([
                ['control_encuestados.id_control_encuesta', '=', $id_ultima_encuesta->id],
                ['encuestados.genero', '=', 'M']
            ])->get());
        $estadisticas->put('numero_encuestados_masculinos', $numero_encuestados_masculinos);

        // Número de encuestados femeninos
        $numero_encuestados_femeninos = count(control_encuestado::select('control_encuestados.id')
            ->join('encuestados', 'encuestados.id', '=', 'control_encuestados.id_encuestado')
            ->where([
                ['control_encuestados.id_control_encuesta', '=', $id_ultima_encuesta->id],
                ['encuestados.genero', '=', 'F']
            ])->get());
        $estadisticas->put('numero_encuestados_femeninos', $numero_encuestados_femeninos);

        // % Distribución por rango de edad
        $aux1 = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'rango_edad')->get();
        $aux2 = collect();
        foreach($aux1 as $i) {
            $aux3 = respuestas::select('id')->where([
                ['id_preguntas', 'rango_edad'],
                ['respuesta', $i->numero_opcion]
            ])->get();
            $aux2->put($i->opcion, count($aux3));
        }

        $aux4 = collect();
        foreach($aux2->keys() as $i) {
            $aux4->put($i, ($aux2[$i] * 100) / $numero_encuestados);
        }
        $estadisticas->put('porcentaje_rango_edades', $aux4);

        // % Distribución por nivel de instrucción
        $aux1 = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'nivel_instruccion')->get();
        $aux2 = collect();
        foreach($aux1 as $i) {
            $aux3 = respuestas::select('id')->where([
                ['id_preguntas', 'nivel_instruccion'],
                ['respuesta', $i->numero_opcion]
            ])->get();
            $aux2->put($i->opcion, count($aux3));
        }

        $aux4 = collect();
        foreach($aux2->keys() as $i) {
            $aux4->put($i, ($aux2[$i] * 100) / $numero_encuestados);
        }
        $estadisticas->put('porcentaje_nivel_instruccion', $aux4);

        // % Distribución por región
        $aux1 = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'region')->get();
        $aux2 = collect();
        foreach($aux1 as $i) {
            $aux3 = respuestas::select('id')->where([
                ['id_preguntas', 'region'],
                ['respuesta', $i->numero_opcion]
            ])->get();
            $aux2->put($i->opcion, count($aux3));
        }

        $aux4 = collect();
        foreach($aux2->keys() as $i) {
            $aux4->put($i, ($aux2[$i] * 100) / $numero_encuestados);
        }
        $estadisticas->put('porcentaje_region', $aux4);
        
        return view('admin.stats')->with('estadisticas', $estadisticas);
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
        //
    }
    public function store_quest(Request $request)
    {
        // Apertura una nueva encuesta, si ya hay una aperturada devuelve error
        $aperturada = control_encuesta::select('aperturada')->where('aperturada', 1)->get();
        if(count($aperturada) == 1) {
            return 'Ya existe una encuesta aperturada. No puede aperturar otra, debe finalizar la primera';
        }
        else {
            $control_encuesta = collect();
            $control_encuesta->put('fecha_apertura', $request->input('fecha_apertura'));
            $control_encuesta->put('fecha_cierre', $request->input('fecha_cierre'));
            $control_encuesta->put('aperturada', 1);
            control_encuesta::create(json_decode(json_encode($control_encuesta), true));
            
            return 'Encuesta aperturada con éxito';
        }
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

    public function close_quest()
    {
        // Cierra la encuesta aperturada
        $id_aperturada = control_encuesta::select('id')->where('aperturada', 1);
        if(count($id_aperturada) == 0) {
            return 'No hay encuesta aperturada para cerrar';
        }
        else {
            $control_encuesta = control_encuesta::find($id_aperturada->get()[0]->id);
            $control_encuesta->aperturada = 0;
            $control_encuesta->save();
            
            return 'La encuesta se ha cerrado';
        }
    }
}
