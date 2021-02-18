<?php

namespace App\Http\Controllers;

use App\control_encuesta;
use Illuminate\Http\Request;

use App\control_encuestado;
use App\encuestado;
use App\preguntas;
use App\respuestas;
use App\opciones_preguntas;
use App\otras_opciones_preguntas;

class ControlEncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function stats()
    {
        $estadisticas = collect();

        // Obtiene la encuesta abierta
        $id_encuesta_abierta = json_decode(control_encuesta::latest('id')->first())->id;
        
        // Número de encuestados en la última encuesta
        if($id_encuesta_abierta != NULL) {
            $numero_encuestados = count(control_encuestado::select('id')->where('id_control_encuesta', $id_encuesta_abierta)->get());
            $estadisticas->put('numero_encuestados', $numero_encuestados);
        }
        else {
            return 'NO HAY NADA';
        }

        // Número de encuestados masculinos
        $numero_encuestados_masculinos = count(control_encuestado::select('control_encuestados.id')
            ->join('encuestados', 'encuestados.id', '=', 'control_encuestados.id_encuestado')
            ->where([
                ['control_encuestados.id_control_encuesta', '=', $id_encuesta_abierta],
                ['encuestados.genero', '=', 'M']
            ])->get());
        $estadisticas->put('numero_encuestados_masculinos', $numero_encuestados_masculinos);

        // Número de encuestados femeninos
        $numero_encuestados_femeninos = count(control_encuestado::select('control_encuestados.id')
            ->join('encuestados', 'encuestados.id', '=', 'control_encuestados.id_encuestado')
            ->where([
                ['control_encuestados.id_control_encuesta', '=', $id_encuesta_abierta],
                ['encuestados.genero', '=', 'F']
            ])->get());
        $estadisticas->put('numero_encuestados_femeninos', $numero_encuestados_femeninos);

        //----------------------------------------------------------------------------------------//
        
        // % Distribución por rango de edad
        $aux1 = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'rango_edad')->get();
        $aux2 = collect();
        foreach($aux1 as $i) {
            $aux3 = respuestas::select('id')->where([
                ['id_preguntas', 'rango_edad'],
                ['respuesta', $i->numero_opcion],
                ['id_control_encuesta', $id_encuesta_abierta]
            ])->get();
            $aux2->put($i->opcion, count($aux3));
        }

        $aux4 = collect();
        foreach($aux2->keys() as $i) {
            $aux4->put($i, ($aux2[$i] * 100) / $numero_encuestados);
        }
        $estadisticas->put('porcentaje_rango_edades', $aux4);

        //----------------------------------------------------------------------------------------//

        // % Distribución por nivel de instrucción
        $aux1 = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'nivel_instruccion')->get();
        $aux2 = collect();
        foreach($aux1 as $i) {
            $aux3 = respuestas::select('id')->where([
                ['id_preguntas', 'nivel_instruccion'],
                ['respuesta', $i->numero_opcion],
                ['id_control_encuesta', $id_encuesta_abierta]
            ])->get();
            $aux2->put($i->opcion, count($aux3));
        }

        $aux4 = collect();
        foreach($aux2->keys() as $i) {
            $aux4->put($i, ($aux2[$i] * 100) / $numero_encuestados);
        }
        $estadisticas->put('porcentaje_nivel_instruccion', $aux4);

        //----------------------------------------------------------------------------------------//

        // % Distribución por región
        $aux1 = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'region')->get();
        $aux2 = collect();
        foreach($aux1 as $i) {
            $aux3 = respuestas::select('id')->where([
                ['id_preguntas', 'region'],
                ['respuesta', $i->numero_opcion],
                ['id_control_encuesta', $id_encuesta_abierta]
            ])->get();
            $aux2->put($i->opcion, count($aux3));
        }

        $aux4 = collect();
        foreach($aux2->keys() as $i) {
            $aux4->put($i, ($aux2[$i] * 100) / $numero_encuestados);
        }
        $estadisticas->put('porcentaje_region', $aux4);

        //----------------------------------------------------------------------------------------//

        // % Districbución de respuestas por preguntas
        $respuestas = collect();

        // Selecciona las preguntas de selección simple
        $preguntas_seleccion_simple  = json_decode(preguntas::select('id')->where('tipo_pregunta', 1)->get());
        $respuestas_seleccion_simple = collect();
        // Selecciona todas las opciones disponibles de las preguntas de selección simple
        foreach($preguntas_seleccion_simple as $i){
            $id_pregunta = $i->id;
            $opciones = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get();
            for($j=0; $j<=$opciones->count()-1; $j++) {
                // Obtiene las respuestas
                $aux = respuestas::select('respuesta')->where([
                    ['id_preguntas', $id_pregunta],
                    ['respuesta', $opciones[$j]['numero_opcion']],
                    ['id_control_encuesta', $id_encuesta_abierta]
                    ])->get();

                $aux2 = collect();
                $aux2->put('pregunta', $id_pregunta);
                $aux2->put('opcion', $opciones[$j]['opcion']);
                $aux2->put('numero_opcion', $opciones[$j]['numero_opcion']);
                $aux2->put('total', $aux->count());
                $aux2->put('porcentaje', ($aux->count() * 100) / $numero_encuestados);
                $respuestas_seleccion_simple->push($aux2);
            }
        }
        $respuestas->put('respuestas_seleccion_simple', $respuestas_seleccion_simple);

        // Selecciona las preguntas de selección múltiple
        $preguntas_seleccion_multiple   = json_decode(preguntas::select('id')->where('tipo_pregunta', 2)->get());
        $respuestas_seleccion_multiple = collect();

        foreach($preguntas_seleccion_multiple as $i) {
            $id_pregunta = $i->id;
            // Selecciona las opciones
            $opciones = json_decode(opciones_preguntas::select('id', 'opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get());
            // Selecciona las sub opciones
            $otras_opciones = json_decode(otras_opciones_preguntas::select('id', 'opcion', 'numero_opcion', 'id_preguntas')->where('id_preguntas', $id_pregunta)->get());

            foreach($opciones as $j) {
                $aux = json_decode(otras_opciones_preguntas::select('id_preguntas')->where('id_preguntas', $id_pregunta)->get());
                if(count($aux) > 0) {
                    foreach($otras_opciones as $k) {
                        // Obtiene las respuestas
                        $aux = respuestas::select('opcion', 'respuesta')->where([
                            ['id_preguntas', $id_pregunta],
                            ['opcion', $j->id],
                            ['respuesta', $k->id],
                            ['id_control_encuesta', $id_encuesta_abierta]
                            ])->get();
                            
                        $aux2 = collect();
                        $aux2->put('pregunta', $id_pregunta);
                        $aux2->put('opcion', $j->opcion);
                        $aux2->put('respuesta', $k->opcion);
                        //$aux2->put('numero_opcion', $k->id);
                        $aux2->put('total', count($aux));
                        $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                        $respuestas_seleccion_multiple->push($aux2);
                    }
                }
                else {
                    // Obtiene las respuestas
                    $aux = respuestas::select('opcion', 'respuesta')->where([
                        ['id_preguntas', $id_pregunta],
                        ['opcion', $j->id],
                        ['respuesta', $j->numero_opcion],
                        ['id_control_encuesta', $id_encuesta_abierta]
                        ])->get();
                            
                    $aux2 = collect();
                    $aux2->put('pregunta', $id_pregunta);
                    //$aux2->put('opcion', $j->id);
                    $aux2->put('opcion', $j->opcion);
                    //$aux2->put('respuesta', $k->opcion);
                    //$aux2->put('numero_opcion', $j->numero_opcion);
                    $aux2->put('respuesta', $j->numero_opcion);
                    $aux2->put('total', count($aux));
                    $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                    $respuestas_seleccion_multiple->push($aux2);
                }
            }
        }
        $respuestas->put('respuestas_seleccion_multiple', $respuestas_seleccion_multiple);

        // Selecciona las preguntas de redacción
        $preguntas_redaccion   = json_decode(preguntas::select('id')->where('tipo_pregunta', 3)->get());
        $respuestas_redaccion  = collect();
        // Selecciona las respuestas
        foreach($preguntas_redaccion as $i) {
            $id_pregunta = $i->id;
            $aux = respuestas::select('opcion', 'respuesta')->where([
                ['id_preguntas', $id_pregunta],
                ['id_control_encuesta', $id_encuesta_abierta]
                ])->get();

            /*
            $aux2 = collect();
            $aux2->put($id_pregunta, $aux);
            $respuestas_redaccion->push($aux2);
            */

            $aux2 = collect();
            $aux2->put('pregunta', $id_pregunta);
            //$aux2->put('opcion', $j->id);
            $aux2->put('respuesta', $aux[0]->respuesta);
            //$aux2->put('numero_opcion', $j->numero_opcion);
            //$aux2->put('total', count($aux));
            //$aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
            $respuestas_redaccion->push($aux2);
        }
        $respuestas->put('respuestas_redaccion', $respuestas_redaccion);
        $estadisticas->put('porcentaje_respuestas', $respuestas);

        //----------------------------------------------------------------------------------------//

        // % Districbución de respuestas por preguntas por género
        $respuestas = collect();

        // Selecciona las preguntas de selección simple
        $preguntas_seleccion_simple  = json_decode(preguntas::select('id')->where('tipo_pregunta', 1)->get());
        $respuestas_seleccion_simple = collect();
        // Selecciona todas las opciones disponibles de las preguntas de selección simple
        foreach($preguntas_seleccion_simple as $i){
            $id_pregunta = $i->id;
            $opciones = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get();
            for($j=0; $j<=$opciones->count()-1; $j++) {
                $generos = collect(['M', 'F']);
                foreach($generos as $k) {
                    // Obtiene las respuestas
                    $aux = respuestas::select('respuestas.respuesta', 'respuestas.id_encuestado', 'encuestados.genero')
                        ->join('encuestados', 'encuestados.id', '=', 'respuestas.id_encuestado')
                        ->where([
                            ['id_preguntas', $id_pregunta],
                            ['respuesta', $opciones[$j]['numero_opcion']],
                            ['encuestados.genero', '=', $k],
                            ['id_control_encuesta', $id_encuesta_abierta]
                        ])->get();

                    $aux2 = collect();
                    $aux2->put('pregunta', $id_pregunta);
                    $aux2->put('opcion', $opciones[$j]['opcion']);
                    $aux2->put('numero_opcion', $opciones[$j]['numero_opcion']);
                    $aux2->put('genero', $k);
                    $aux2->put('total', $aux->count());
                    $aux2->put('porcentaje', ($aux->count() * 100) / $numero_encuestados);
                    $respuestas_seleccion_simple->push($aux2);
                }
            }
        }
        $respuestas->put('respuestas_seleccion_simple', $respuestas_seleccion_simple);

        // Selecciona las preguntas de selección múltiple
        $preguntas_seleccion_multiple  = json_decode(preguntas::select('id')->where('tipo_pregunta', 2)->get());
        $respuestas_seleccion_multiple = collect();

        foreach($preguntas_seleccion_multiple as $i) {
            $id_pregunta = $i->id;
            $generos = collect(['M', 'F']);
            // Selecciona las opciones
            $opciones = json_decode(opciones_preguntas::select('id', 'opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get());
            // Selecciona las sub opciones
            $otras_opciones = json_decode(otras_opciones_preguntas::select('id', 'opcion', 'numero_opcion', 'id_preguntas')->where('id_preguntas', $id_pregunta)->get());

            foreach($opciones as $j) {
                $aux = json_decode(otras_opciones_preguntas::select('id_preguntas')->where('id_preguntas', $id_pregunta)->get());
                if(count($aux) > 0) {
                    foreach($otras_opciones as $k) {
                        foreach($generos as $l) {
                            // Obtiene las respuestas
                            $aux = respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado', 'encuestados.genero')
                                ->join('encuestados', 'encuestados.id', '=', 'respuestas.id_encuestado')
                                ->where([
                                    ['id_preguntas', $id_pregunta],
                                    ['opcion', $j->id],
                                    ['respuesta', $k->id],
                                    ['encuestados.genero', '=', $l],
                                    ['id_control_encuesta', $id_encuesta_abierta]
                                ])->get();
                                
                            $aux2 = collect();
                            $aux2->put('pregunta', $id_pregunta);
                            $aux2->put('opcion', $j->opcion);
                            $aux2->put('respuesta', $k->opcion);
                            $aux2->put('genero', $l);
                            $aux2->put('total', count($aux));
                            $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                            $respuestas_seleccion_multiple->push($aux2);
                        }
                    }
                }
                else {
                    foreach($opciones as $m) {
                        foreach($generos as $l) {
                            // Obtiene las respuestas
                            $aux = respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado', 'encuestados.genero')
                                ->join('encuestados', 'encuestados.id', '=', 'respuestas.id_encuestado')
                                ->where([
                                    ['id_preguntas', $id_pregunta],
                                    ['opcion', $j->id],
                                    ['respuesta', $m->numero_opcion],
                                    ['encuestados.genero', '=', $l],
                                    ['id_control_encuesta', $id_encuesta_abierta]
                                ])->get();
                                    
                            $aux2 = collect();
                            $aux2->put('pregunta', $id_pregunta);
                            //$aux2->put('opcion', $j->id);
                            $aux2->put('opcion', $j->opcion);
                            //$aux2->put('respuesta', $k->opcion);
                            //$aux2->put('numero_opcion', $j->numero_opcion);
                            $aux2->put('respuesta', $j->numero_opcion);
                            $aux2->put('genero', $l);
                            $aux2->put('total', count($aux));
                            $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                            $respuestas_seleccion_multiple->push($aux2);
                        }
                    }
                }
            }
        }
        $respuestas->put('respuestas_seleccion_multiple', $respuestas_seleccion_multiple);        
        $estadisticas->put('porcentaje_respuestas_genero', $respuestas);

        //----------------------------------------------------------------------------------------//

        // % Districbución de respuestas por preguntas por rango de edad
        $respuestas = collect();

        // Selecciona las preguntas de selección simple
        $preguntas_seleccion_simple  = json_decode(preguntas::select('id')->where('tipo_pregunta', 1)->get());
        $respuestas_seleccion_simple = collect();
        // Selecciona todas las opciones disponibles de las preguntas de selección simple
        foreach($preguntas_seleccion_simple as $i){
            $id_pregunta = $i->id;
            $opciones = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get();
            for($j=0; $j<=$opciones->count()-1; $j++) {
                $rango_edad  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'rango_edad')->get());
                foreach($rango_edad as $k) {
                    // Obtiene las respuestas
                    $aux = respuestas::select('respuestas.respuesta', 'respuestas.id_encuestado', 'control_encuestados.rango_edad')
                        ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                        ->where([
                            ['id_preguntas', $id_pregunta],
                            ['respuesta', $opciones[$j]['numero_opcion']],
                            ['control_encuestados.rango_edad', '=', $k->numero_opcion],
                            ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                        ])->get();

                    $aux2 = collect();
                    $aux2->put('pregunta', $id_pregunta);
                    $aux2->put('opcion', $opciones[$j]['opcion']);
                    $aux2->put('numero_opcion', $opciones[$j]['numero_opcion']);
                    $aux2->put('rango_edad', $k->opcion);
                    $aux2->put('total', $aux->count());
                    $aux2->put('porcentaje', ($aux->count() * 100) / $numero_encuestados);
                    $respuestas_seleccion_simple->push($aux2);
                }
            }
        }
        $respuestas->put('respuestas_seleccion_simple', $respuestas_seleccion_simple);

        // Selecciona las preguntas de selección múltiple
        $preguntas_seleccion_multiple   = json_decode(preguntas::select('id')->where('tipo_pregunta', 2)->get());
        $respuestas_seleccion_multiple = collect();

        foreach($preguntas_seleccion_multiple as $i) {
            $id_pregunta = $i->id;
            $rango_edad  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'rango_edad')->get());
            // Selecciona las opciones
            $opciones = json_decode(opciones_preguntas::select('id', 'opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get());
            // Selecciona las sub opciones
            $otras_opciones = json_decode(otras_opciones_preguntas::select('id', 'opcion', 'numero_opcion', 'id_preguntas')->where('id_preguntas', $id_pregunta)->get());

            foreach($opciones as $j) {
                $aux = json_decode(otras_opciones_preguntas::select('id_preguntas')->where('id_preguntas', $id_pregunta)->get());
                if(count($aux) > 0) {
                    foreach($otras_opciones as $k) {
                        foreach($rango_edad as $l) {
                            // Obtiene las respuestas
                            $aux = respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado', 'control_encuestados.rango_edad')
                                ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                                ->where([
                                    ['id_preguntas', $id_pregunta],
                                    ['opcion', $j->id],
                                    ['respuesta', $k->id],
                                    ['control_encuestados.rango_edad', '=', $l->numero_opcion],
                                    ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                                ])->get();
                                
                            $aux2 = collect();
                            $aux2->put('pregunta', $id_pregunta);
                            $aux2->put('opcion', $j->opcion);
                            $aux2->put('respuesta', $k->opcion);
                            //$aux2->put('numero_opcion', $k->id);
                            $aux2->put('rango_edad', $l->opcion);
                            $aux2->put('total', count($aux));
                            $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                            $respuestas_seleccion_multiple->push($aux2);
                        }
                    }
                }
                else {
                    foreach($rango_edad as $l) {
                        // Obtiene las respuestas
                        $aux = respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado', 'control_encuestados.rango_edad')
                            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                            ->where([
                                ['id_preguntas', $id_pregunta],
                                ['opcion', $j->id],
                                ['respuesta', $j->numero_opcion],
                                ['control_encuestados.rango_edad', '=', $l->numero_opcion],
                                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                            ])->get();
                                
                        $aux2 = collect();
                        $aux2->put('pregunta', $id_pregunta);
                        //$aux2->put('opcion', $j->id);
                        $aux2->put('opcion', $j->opcion);
                        //$aux2->put('respuesta', $k->opcion);
                        //$aux2->put('numero_opcion', $j->numero_opcion);
                        $aux2->put('respuesta', $j->numero_opcion);
                        $aux2->put('rango_edad', $l->opcion);
                        $aux2->put('total', count($aux));
                        $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                        $respuestas_seleccion_multiple->push($aux2);
                    }
                }
            }
        }
        $respuestas->put('respuestas_seleccion_multiple', $respuestas_seleccion_multiple);        
        $estadisticas->put('porcentaje_respuestas_rango_edad', $respuestas);        
        
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
