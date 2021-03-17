<?php

use App\control_encuesta;
use App\control_encuestado;
use App\preguntas;
use App\respuestas;
use App\opciones_preguntas;
use App\otras_opciones_preguntas;

function stats()
{
    $estadisticas = collect();

    // Obtiene la encuesta abierta
    $id_encuesta_abierta = json_decode(control_encuesta::latest('id')->first())->id;

    //----------------------------------------------------------------------------------------//
    
    // Número de encuestados en la última encuesta
    if($id_encuesta_abierta != NULL) {
        $numero_encuestados = count(control_encuestado::select('id')->where('id_control_encuesta', $id_encuesta_abierta)->get());
        $estadisticas->put('numero_encuestados', $numero_encuestados);
    }
    else {
        return 'NO HAY NADA';
    }

    //----------------------------------------------------------------------------------------//

    // Número de encuestados masculinos
    $numero_encuestados_masculinos = count(control_encuestado::select('control_encuestados.id')
        ->join('encuestados', 'encuestados.id', '=', 'control_encuestados.id_encuestado')
        ->where([
            ['control_encuestados.id_control_encuesta', '=', $id_encuesta_abierta],
            ['encuestados.genero', '=', 'M']
        ])->get());
        
    $estadisticas->put('numero_encuestados_masculinos', $numero_encuestados_masculinos);
    $estadisticas->put('porcentaje_encuestados_masculinos', ($numero_encuestados_masculinos * 100) / $estadisticas['numero_encuestados']);

    //----------------------------------------------------------------------------------------//

    // Número de encuestados femeninos
    $numero_encuestados_femeninos = count(control_encuestado::select('control_encuestados.id')
        ->join('encuestados', 'encuestados.id', '=', 'control_encuestados.id_encuestado')
        ->where([
            ['control_encuestados.id_control_encuesta', '=', $id_encuesta_abierta],
            ['encuestados.genero', '=', 'F']
        ])->get());
        
    $estadisticas->put('numero_encuestados_femeninos', $numero_encuestados_femeninos);
    $estadisticas->put('porcentaje_encuestados_femeninos', ($numero_encuestados_femeninos * 100) / $estadisticas['numero_encuestados']);

    //----------------------------------------------------------------------------------------//
    
    // % Distribución por rango de edad
    $aux1 = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'rango_edad')->get();
    $aux2 = collect();
    
    foreach($aux1 as $i) {
        $aux3 = control_encuestado::select('id')->where([
            ['rango_edad', $i->numero_opcion],
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
        $aux3 = control_encuestado::select('id')->where([
            ['nivel_instruccion', $i->numero_opcion],
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
        $aux3 = control_encuestado::select('id')->where([
            ['region', $i->numero_opcion],
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
        $tmp = collect();
        $id_pregunta = $i->id;
        
        $opciones = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get();
        
        for($j=0; $j<=$opciones->count()-1; $j++) {
            // Obtiene las respuestas
            //$aux = respuestas::select('respuesta')->where([
            $aux = respuestas::select('id')->where([
                ['id_preguntas', $id_pregunta],
                ['respuesta', $opciones[$j]['numero_opcion']],
                ['id_control_encuesta', $id_encuesta_abierta]
                ])->get();

            $aux2 = collect();
            $aux2->put('pregunta', $id_pregunta);
            $aux2->put('opcion', $opciones[$j]['opcion']);
            //$aux2->put('numero_opcion', $opciones[$j]['numero_opcion']);
            $aux2->put('total', $aux->count());
            $aux2->put('porcentaje', ($aux->count() * 100) / $numero_encuestados);
            $tmp->push($aux2);
        }
        $respuestas_seleccion_simple->put($id_pregunta, $tmp);
    }
    $respuestas->put('respuestas_seleccion_simple', $respuestas_seleccion_simple);

    // Selecciona las preguntas de selección múltiple
    $preguntas_seleccion_multiple   = json_decode(preguntas::select('id')->where('tipo_pregunta', 2)->get());
    $respuestas_seleccion_multiple  = collect();

    foreach($preguntas_seleccion_multiple as $i) {
        $tmp = collect();
        $id_pregunta = $i->id;
        
        // Selecciona las opciones
        $opciones = json_decode(opciones_preguntas::select('id', 'opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get());
        
        // Selecciona las sub opciones
        $otras_opciones = json_decode(otras_opciones_preguntas::select('id')->where('id_preguntas', $id_pregunta)->get());
        
        foreach($opciones as $j) {
            if(count($otras_opciones) > 0) {
                foreach($otras_opciones as $k) {
                    // Obtiene las respuestas
                    //$aux = respuestas::select('opcion', 'respuesta')->where([
                    $aux = respuestas::select('id')->where([
                        ['id_preguntas', $id_pregunta],
                        ['opcion', $j->id],
                        ['respuesta', $k->id],
                        ['id_control_encuesta', $id_encuesta_abierta]
                        ])->get();
                        
                    $aux2 = collect();
                    $aux2->put('pregunta', $id_pregunta);
                    $aux2->put('opcion', $j->opcion);
                    //$aux2->put('respuesta', $k->opcion);
                    //$aux2->put('numero_opcion', $k->id);
                    $aux2->put('total', count($aux));
                    $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                    $tmp->push($aux2);
                }
                $respuestas_seleccion_multiple->put($id_pregunta, $tmp);
            }
            else {
                // Obtiene las respuestas
                //$aux = respuestas::select('opcion', 'respuesta')->where([
                $aux = respuestas::select('id')->where([
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
                //$aux2->put('respuesta', $j->numero_opcion);
                $aux2->put('total', count($aux));
                $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                $tmp->push($aux2);
            }
            $respuestas_seleccion_multiple->put($id_pregunta, $tmp);
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

        $aux2 = collect();
        $aux2->put('pregunta', $id_pregunta);
        //$aux2->put('opcion', $j->id);
        //$aux2->put('respuesta', $aux[0]->respuesta);
        //$aux2->put('numero_opcion', $j->numero_opcion);
        $aux2->put('total', count($aux));
        $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
        $respuestas_redaccion->push($aux2);
    }
    $respuestas->put('respuestas_redaccion', $respuestas_redaccion);
    $estadisticas->put('porcentaje_respuestas', $respuestas);

    //----------------------------------------------------------------------------------------//

    // % Districbución de respuestas por preguntas por género
    
    $generos = json_decode(opciones_preguntas::select('opcion')->where('id_preguntas', 'genero')->get());
    $rule = collect();
    foreach($generos as $i) {
        $rule->push(($i->opcion));
    }

    $respuestas = collect();

    // Selecciona las preguntas de selección simple
    $preguntas_seleccion_simple  = json_decode(preguntas::select('id')->where('tipo_pregunta', 1)->get());
    $respuestas_seleccion_simple = collect();
    
    // Selecciona todas las opciones disponibles de las preguntas de selección simple
    foreach($preguntas_seleccion_simple as $i){
        $male_data    = collect();
        $female_data  = collect();
        $tmp          = collect();
        $id_pregunta  = $i->id;
        
        $opciones = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get();
        
        for($j=0; $j<=$opciones->count()-1; $j++) {
            foreach($rule as $k) {
                // Obtiene las respuestas
                $aux = respuestas::select('respuestas.id')
                    ->join('encuestados', 'encuestados.id', '=', 'respuestas.id_encuestado')
                    ->where([
                        ['id_preguntas', $id_pregunta],
                        ['respuesta', $opciones[$j]['numero_opcion']],
                        ['encuestados.genero', '=', $k],
                        ['id_control_encuesta', $id_encuesta_abierta]
                    ])->get();

                //$aux2 = collect();
                //$aux2->put('pregunta', $id_pregunta);
                //$aux2->put('opcion', $opciones[$j]['opcion']);
                //$aux2->put('numero_opcion', $opciones[$j]['numero_opcion']);
                //$aux2->put('genero', $k);
                //$aux2->put('total', $aux->count());
                //$aux2->put('porcentaje', ($aux->count() * 100) / $numero_encuestados);
                $porcentaje = (count($aux) * 100) / $numero_encuestados;
                if($k == 'M') {
                    $male_data->push($porcentaje);
                }
                else {
                    $female_data->push($porcentaje);
                }
            }
            $tmp->put('male_data', $male_data);
            $tmp->put('female_data', $female_data);
            $tmp->put('labels', $opciones);
        }
        $respuestas_seleccion_simple->put($id_pregunta, $tmp);
    }
    $respuestas->put('respuestas_seleccion_simple', $respuestas_seleccion_simple);

    // Selecciona las preguntas de selección múltiple
    $preguntas_seleccion_multiple  = json_decode(preguntas::select('id')->where('tipo_pregunta', 2)->get());
    $respuestas_seleccion_multiple = collect();

    foreach($preguntas_seleccion_multiple as $i) {
        $id_pregunta  = $i->id;
        
        // Selecciona las opciones
        $opciones = json_decode(opciones_preguntas::select('id', 'opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get());

        $labels = collect();
        foreach($opciones as $x) {
            $labels->push($x->opcion);
        }
        
        // Selecciona las sub opciones
        $otras_opciones = json_decode(otras_opciones_preguntas::select('id', 'opcion', 'id_preguntas')->where('id_preguntas', $id_pregunta)->get());

        $otras_opciones2 = collect();
        foreach($otras_opciones as $x) {
            $otras_opciones2->push($x->opcion);
        }

        $tmp2 = collect();

        $flag = 0;
        foreach($opciones as $j) {
            $tmp         = collect();
            $male_data   = collect();
            $female_data = collect();
            
            if(count($otras_opciones) > 0) {
                $flag = 1;
                
                foreach($otras_opciones as $k) {
                    foreach($rule as $l) {
                        // Obtiene las respuestas
                        $aux = respuestas::select('respuestas.id')
                            ->join('encuestados', 'encuestados.id', '=', 'respuestas.id_encuestado')
                            ->where([
                                ['id_preguntas', $id_pregunta],
                                ['opcion', $j->id],
                                ['respuesta', $k->id],
                                ['encuestados.genero', '=', $l],
                                ['id_control_encuesta', $id_encuesta_abierta]
                            ])->get();
                            
                        //$aux2 = collect();
                        //$aux2->put('pregunta', $id_pregunta);
                        //$aux2->put('opcion', $j->opcion);
                        //$aux2->put('respuesta', $k->opcion);
                        //$aux2->put('genero', $l);
                        //$aux2->put('total', count($aux));
                        //$aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                        $porcentaje = (count($aux) * 100) / $numero_encuestados;
                        if($l == 'M') {
                            $male_data->push($porcentaje);
                        }
                        else {
                            $female_data->push($porcentaje);
                        }
                    }
                }
            }
            else {
                $flag = 0;                    
                foreach($rule as $l) {
                    // Obtiene las respuestas
                    $aux = respuestas::select('respuestas.id')
                        ->join('encuestados', 'encuestados.id', '=', 'respuestas.id_encuestado')
                        ->where([
                            ['id_preguntas', $id_pregunta],
                            ['opcion', $j->id],
                            ['respuesta', $j->numero_opcion],
                            ['encuestados.genero', '=', $l],
                            ['id_control_encuesta', $id_encuesta_abierta]
                        ])->get();
                                
                    //$aux2 = collect();
                    //$aux2->put('pregunta', $id_pregunta);
                    //$aux2->put('opcion', $j->id);
                    //$aux2->put('opcion', $j->opcion);
                    //$aux2->put('respuesta', $k->opcion);
                    //$aux2->put('numero_opcion', $j->numero_opcion);
                    //$aux2->put('respuesta', $j->numero_opcion);
                    //$aux2->put('genero', $l);
                    //$aux2->put('total', count($aux));
                    //$aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                    $porcentaje = (count($aux) * 100) / $numero_encuestados;
                    if($l == 'M') {
                        $male_data->push($porcentaje);
                    }
                    else {
                        $female_data->push($porcentaje);
                    }
                }
            }
            if($flag == 1) {
                $tmp->put('male_data', $male_data);
                $tmp->put('female_data', $female_data);
                $tmp->put('labels', $labels);
                $tmp->put('otras_opciones', $otras_opciones2);
                $tmp2->put($j->opcion, $tmp);
            }
            else {
                $tmp->put('male_data', $male_data);
                $tmp->put('female_data', $female_data);
                $tmp->put('labels', $labels);
                $tmp2->put(rand(), $tmp);
            }
        }
        $respuestas_seleccion_multiple->put($id_pregunta, $tmp2);
    }
    $respuestas->put('respuestas_seleccion_multiple', $respuestas_seleccion_multiple);

    $estadisticas->put('porcentaje_respuestas_genero', $respuestas);


    //----------------------------------------------------------------------------------------//

    // % Districbución de respuestas por preguntas por rango de edad
    
    $rangos_edades = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'rango_edad')->get());
    
    $rule   = collect();
    $labels = collect();        
    foreach($rangos_edades as $i) {
        $rule->push($i->numero_opcion);
        $labels->push($i->opcion);
    }
    
    $respuestas = collect();

    // Selecciona las preguntas de selección simple
    $preguntas_seleccion_simple  = json_decode(preguntas::select('id')->where('tipo_pregunta', 1)->get());
    $respuestas_seleccion_simple = collect();
    
    // Selecciona todas las opciones disponibles de las preguntas de selección simple
    foreach($preguntas_seleccion_simple as $i){
        $id_pregunta = $i->id;
        
        $opciones = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get();

        $options = collect();
        foreach($opciones as $j) {
            $options->push($j->opcion);
        }

        $a_by_rule = collect();

        foreach($rule as $k) {
            $a_by_option = collect();
            
            foreach($opciones as $j) {
                // Obtiene las respuestas
                $aux = respuestas::select('respuestas.id')
                    ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                    ->where([
                        ['id_preguntas', $id_pregunta],
                        ['respuesta', $j->numero_opcion],
                        ['control_encuestados.rango_edad', '=', $k],
                        ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                    ])->get();

                $porcentaje = (count($aux) * 100) / $numero_encuestados;
                $a_by_option->push($porcentaje);
            }
            $a_by_rule->put($labels[$k-1], $a_by_option);
        }
        $tmp = collect();
        $tmp->put('a_by_rule', $a_by_rule);
        $tmp->put('options', $options);
        $respuestas_seleccion_simple->put($id_pregunta, $tmp);
    }
    $respuestas->put('respuestas_seleccion_simple', $respuestas_seleccion_simple);

    // Selecciona las preguntas de selección múltiple
    $preguntas_seleccion_multiple  = json_decode(preguntas::select('id')->where('tipo_pregunta', 2)->get());
    $respuestas_seleccion_multiple = collect();

    foreach($preguntas_seleccion_multiple as $i) {
        $id_pregunta  = $i->id;
        
        // Selecciona las opciones
        $opciones = json_decode(opciones_preguntas::select('id', 'opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get());

        $options = collect();
        foreach($opciones as $j) {
            $options->push($j->opcion);
        }
        
        // Selecciona las sub opciones
        $otras_opciones = json_decode(otras_opciones_preguntas::select('id', 'opcion', 'id_preguntas')->where('id_preguntas', $id_pregunta)->get());

        $other_options = collect();
        foreach($otras_opciones as $j) {
            $other_options->push($j->opcion);
        }
        
        $a_by_option = collect();

        $flag = 0;
        foreach($opciones as $j) {
            $a_by_rule1 = collect();
            $a_by_rule2 = collect();

            foreach($rule as $m) {
                $a_by_other_option = collect();
                
                if(count($otras_opciones) > 0) {
                    $flag = 1;
                    
                    foreach($otras_opciones as $k) {
                        // Obtiene las respuestas
                        $aux = respuestas::select('respuestas.id')
                            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                            ->where([
                                ['id_preguntas', $id_pregunta],
                                ['opcion', $j->id],
                                ['respuesta', $k->id],
                                ['control_encuestados.rango_edad', '=', $m],
                                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                            ])->get();
                            
                        $porcentaje = (count($aux) * 100) / $numero_encuestados;
                        $a_by_other_option->push($porcentaje);
                    }
                    $tmp = collect();
                    $tmp->put('key', $labels[$m-1]);
                    $tmp->put('value', $a_by_other_option);
                    $a_by_rule1->push($tmp);
                }
                else {
                    $flag = 0;
                    // Obtiene las respuestas
                    $aux = respuestas::select('respuestas.id')
                        ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                        ->where([
                            ['id_preguntas', $id_pregunta],
                            ['opcion', $j->id],
                            ['respuesta', $j->numero_opcion],
                            ['control_encuestados.rango_edad', '=', $m],
                            ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                        ])->get();

                    $porcentaje = (count($aux) * 100) / $numero_encuestados;
                    $a_by_rule2->push($porcentaje);
                }
                if($flag == 0) {
                    $tmp = collect();
                    $tmp->put('key', $labels[$m-1]);
                    $tmp->put('value', $a_by_rule2);
                    $a_by_option->push($tmp);
                }
                else {
                    $tmp = collect();
                    $tmp->put('key', $j->opcion);
                    $tmp->put('value', $a_by_rule1);
                    $a_by_option->push($tmp);
                }
                
            }
            $tmp = collect();
            $tmp->put('a_by_option', $a_by_option);
            $tmp->put('options', $options);
            $tmp->put('other_options', $other_options);
        }
        $respuestas_seleccion_multiple->put($id_pregunta, $tmp);
    }
    $respuestas->put('respuestas_seleccion_multiple', $respuestas_seleccion_multiple);

    $estadisticas->put('porcentaje_respuestas_rango_edad', $respuestas);


    /*
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
    */

    //----------------------------------------------------------------------------------------//

    // % Districbución de respuestas por preguntas por nivel de instruccion
    $respuestas = collect();

    // Selecciona las preguntas de selección simple
    $preguntas_seleccion_simple  = json_decode(preguntas::select('id')->where('tipo_pregunta', 1)->get());
    $respuestas_seleccion_simple = collect();
    // Selecciona todas las opciones disponibles de las preguntas de selección simple
    foreach($preguntas_seleccion_simple as $i){
        $id_pregunta = $i->id;
        $opciones = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get();
        for($j=0; $j<=$opciones->count()-1; $j++) {
            $rango_edad  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'nivel_instruccion')->get());
            foreach($rango_edad as $k) {
                // Obtiene las respuestas
                $aux = respuestas::select('respuestas.respuesta', 'respuestas.id_encuestado', 'control_encuestados.nivel_instruccion')
                    ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                    ->where([
                        ['id_preguntas', $id_pregunta],
                        ['respuesta', $opciones[$j]['numero_opcion']],
                        ['control_encuestados.nivel_instruccion', '=', $k->numero_opcion],
                        ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                    ])->get();

                $aux2 = collect();
                $aux2->put('pregunta', $id_pregunta);
                $aux2->put('opcion', $opciones[$j]['opcion']);
                $aux2->put('numero_opcion', $opciones[$j]['numero_opcion']);
                $aux2->put('nivel_instruccion', $k->opcion);
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
        $rango_edad  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'nivel_instruccion')->get());
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
                        $aux = respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado', 'control_encuestados.nivel_instruccion')
                            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                            ->where([
                                ['id_preguntas', $id_pregunta],
                                ['opcion', $j->id],
                                ['respuesta', $k->id],
                                ['control_encuestados.nivel_instruccion', '=', $l->numero_opcion],
                                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                            ])->get();
                            
                        $aux2 = collect();
                        $aux2->put('pregunta', $id_pregunta);
                        $aux2->put('opcion', $j->opcion);
                        $aux2->put('respuesta', $k->opcion);
                        //$aux2->put('numero_opcion', $k->id);
                        $aux2->put('nivel_instruccion', $l->opcion);
                        $aux2->put('total', count($aux));
                        $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                        $respuestas_seleccion_multiple->push($aux2);
                    }
                }
            }
            else {
                foreach($rango_edad as $l) {
                    // Obtiene las respuestas
                    $aux = respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado', 'control_encuestados.nivel_instruccion')
                        ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                        ->where([
                            ['id_preguntas', $id_pregunta],
                            ['opcion', $j->id],
                            ['respuesta', $j->numero_opcion],
                            ['control_encuestados.nivel_instruccion', '=', $l->numero_opcion],
                            ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                        ])->get();
                            
                    $aux2 = collect();
                    $aux2->put('pregunta', $id_pregunta);
                    //$aux2->put('opcion', $j->id);
                    $aux2->put('opcion', $j->opcion);
                    //$aux2->put('respuesta', $k->opcion);
                    //$aux2->put('numero_opcion', $j->numero_opcion);
                    $aux2->put('respuesta', $j->numero_opcion);
                    $aux2->put('nivel_instruccion', $l->opcion);
                    $aux2->put('total', count($aux));
                    $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                    $respuestas_seleccion_multiple->push($aux2);
                }
            }
        }
    }
    $respuestas->put('respuestas_seleccion_multiple', $respuestas_seleccion_multiple);        
    $estadisticas->put('porcentaje_respuestas_nivel_instruccion', $respuestas);

    //----------------------------------------------------------------------------------------//

    // % Districbución de respuestas por preguntas por region
    $respuestas = collect();

    // Selecciona las preguntas de selección simple
    $preguntas_seleccion_simple  = json_decode(preguntas::select('id')->where('tipo_pregunta', 1)->get());
    $respuestas_seleccion_simple = collect();
    // Selecciona todas las opciones disponibles de las preguntas de selección simple
    foreach($preguntas_seleccion_simple as $i){
        $id_pregunta = $i->id;
        $opciones = opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', $id_pregunta)->get();
        for($j=0; $j<=$opciones->count()-1; $j++) {
            $rango_edad  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'region')->get());
            foreach($rango_edad as $k) {
                // Obtiene las respuestas
                $aux = respuestas::select('respuestas.respuesta', 'respuestas.id_encuestado', 'control_encuestados.region')
                    ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                    ->where([
                        ['id_preguntas', $id_pregunta],
                        ['respuesta', $opciones[$j]['numero_opcion']],
                        ['control_encuestados.region', '=', $k->numero_opcion],
                        ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                    ])->get();

                $aux2 = collect();
                $aux2->put('pregunta', $id_pregunta);
                $aux2->put('opcion', $opciones[$j]['opcion']);
                $aux2->put('numero_opcion', $opciones[$j]['numero_opcion']);
                $aux2->put('region', $k->opcion);
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
        $rango_edad  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'region')->get());
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
                        $aux = respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado', 'control_encuestados.region')
                            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                            ->where([
                                ['id_preguntas', $id_pregunta],
                                ['opcion', $j->id],
                                ['respuesta', $k->id],
                                ['control_encuestados.region', '=', $l->numero_opcion],
                                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                            ])->get();
                            
                        $aux2 = collect();
                        $aux2->put('pregunta', $id_pregunta);
                        $aux2->put('opcion', $j->opcion);
                        $aux2->put('respuesta', $k->opcion);
                        //$aux2->put('numero_opcion', $k->id);
                        $aux2->put('region', $l->opcion);
                        $aux2->put('total', count($aux));
                        $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                        $respuestas_seleccion_multiple->push($aux2);
                    }
                }
            }
            else {
                foreach($rango_edad as $l) {
                    // Obtiene las respuestas
                    $aux = respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado', 'control_encuestados.region')
                        ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                        ->where([
                            ['id_preguntas', $id_pregunta],
                            ['opcion', $j->id],
                            ['respuesta', $j->numero_opcion],
                            ['control_encuestados.region', '=', $l->numero_opcion],
                            ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                        ])->get();
                            
                    $aux2 = collect();
                    $aux2->put('pregunta', $id_pregunta);
                    //$aux2->put('opcion', $j->id);
                    $aux2->put('opcion', $j->opcion);
                    //$aux2->put('respuesta', $k->opcion);
                    //$aux2->put('numero_opcion', $j->numero_opcion);
                    $aux2->put('respuesta', $j->numero_opcion);
                    $aux2->put('region', $l->opcion);
                    $aux2->put('total', count($aux));
                    $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
                    $respuestas_seleccion_multiple->push($aux2);
                }
            }
        }
    }
    $respuestas->put('respuestas_seleccion_multiple', $respuestas_seleccion_multiple);        
    $estadisticas->put('porcentaje_respuestas_region', $respuestas);

    //----------------------------------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE

    $count = 0;
    $aux = json_decode(respuestas::select('opcion', 'respuesta', 'id_encuestado')->where([
        ['id_preguntas', 'pregunta10'],
        ['respuesta', 1],
        ['id_control_encuesta', $id_encuesta_abierta]
    ])->get());

    foreach($aux as $i) {
        $aux2 = json_decode(respuestas::select('opcion', 'respuesta', 'id_encuestado')->where([
            ['id_preguntas', 'pregunta10-1'],
            ['respuesta', 'abae'],
            ['id_encuestado', $i->id_encuestado],
            ['id_control_encuesta', $id_encuesta_abierta]
        ])->get());
        if(count($aux2) > 0) {
            $count++;
        }
    }
                        
    $respuestas = collect();
    $respuestas->put('porcentaje', ($count * 100) / count($aux));
    $estadisticas->put('porcentaje_si_pregunta10_correctamente', $respuestas);

    //----------------------------------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron incorrectamente ABAE

    $count = 0;
    $aux = json_decode(respuestas::select('opcion', 'respuesta', 'id_encuestado')->where([
        ['id_preguntas', 'pregunta10'],
        ['respuesta', 1],
        ['id_control_encuesta', $id_encuesta_abierta]
    ])->get());

    foreach($aux as $i) {
        $aux2 = json_decode(respuestas::select('opcion', 'respuesta', 'id_encuestado')->where([
            ['id_preguntas', 'pregunta10-1'],
            ['respuesta', '!=', 'abae'],
            ['id_encuestado', $i->id_encuestado],
            ['id_control_encuesta', $id_encuesta_abierta]
        ])->get());
        if(count($aux2) > 0) {
            $count++;
        }
    }
                        
    $respuestas = collect();
    $respuestas->put('porcentaje', ($count * 100) / count($aux));
    $estadisticas->put('porcentaje_si_pregunta10_incorrectamente', $respuestas);

    //----------------------------------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por género

    $respuestas = collect();
    $generos = collect(['M', 'F']);
    foreach($generos as $j) {
        $aux = json_decode(respuestas::select('opcion', 'respuesta', 'id_encuestado')
            ->join('encuestados', 'encuestados.id', '=', 'respuestas.id_encuestado')
            ->where([
                ['id_preguntas', 'pregunta10'],
                ['respuesta', 1],
                ['genero', $j],
                ['id_control_encuesta', $id_encuesta_abierta]
            ])->get());

        foreach($aux as $i) {
            $aux2 = json_decode(respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado')
                ->join('encuestados', 'encuestados.id', '=', 'respuestas.id_encuestado')
                ->where([
                    ['id_preguntas', 'pregunta10-1'],
                    ['respuesta', 'abae'],
                    ['respuestas.id_encuestado', $i->id_encuestado],
                    ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                ])->get());
        }
        $respuestas->put($j, (count($aux2) * 100) / count($aux));
    }
    $estadisticas->put('porcentaje_si_pregunta10_correctamente_genero', $respuestas);
    
    //----------------------------------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron incorrectamente ABAE por género

    $respuestas = collect();
    $generos = collect(['M', 'F']);
    foreach($generos as $j) {
        $aux = json_decode(respuestas::select('opcion', 'respuesta', 'id_encuestado')
            ->join('encuestados', 'encuestados.id', '=', 'respuestas.id_encuestado')
            ->where([
                ['id_preguntas', 'pregunta10'],
                ['respuesta', 1],
                ['genero', $j],
                ['id_control_encuesta', $id_encuesta_abierta]
            ])->get());

        foreach($aux as $i) {
            $aux2 = json_decode(respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado')
                ->join('encuestados', 'encuestados.id', '=', 'respuestas.id_encuestado')
                ->where([
                    ['id_preguntas', 'pregunta10-1'],
                    ['respuesta', '!=', 'abae'],
                    ['respuestas.id_encuestado', $i->id_encuestado],
                    ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                ])->get());
        }
        $respuestas->put($j, (count($aux2) * 100) / count($aux));
    }
    $estadisticas->put('porcentaje_si_pregunta10_incorrectamente_genero', $respuestas);

    //----------------------------------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por rango de edad

    $respuestas = collect();
    $rango_edad  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'rango_edad')->get());
    foreach($rango_edad as $j) {
        $aux = json_decode(respuestas::select('opcion', 'respuesta', 'respuestas.id_encuestado')
            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
            ->where([
                ['id_preguntas', 'pregunta10'],
                ['respuesta', 1],
                ['rango_edad', $j->numero_opcion],
                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
            ])->get());

        if(count($aux) == 0) {
            $respuestas->put($j->opcion, 0);
        }
        else {
            foreach($aux as $i) {
                $aux2 = json_decode(respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado')
                    ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                    ->where([
                        ['id_preguntas', 'pregunta10-1'],
                        ['respuesta', 'abae'],
                        ['respuestas.id_encuestado', $i->id_encuestado],
                        ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                    ])->get());
                    
                if(count($aux2) > 0) {
                    $respuestas->put($j->opcion, (count($aux2) * 100) / count($aux));
                }
            }
        }
    }
    $estadisticas->put('porcentaje_si_pregunta10_correctamente_rango_edad', $respuestas);

    //----------------------------------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron incorrectamente ABAE por rango de edad

    $respuestas = collect();
    $rango_edad  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'rango_edad')->get());
    foreach($rango_edad as $j) {
        $aux = json_decode(respuestas::select('opcion', 'respuesta', 'respuestas.id_encuestado')
            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
            ->where([
                ['id_preguntas', 'pregunta10'],
                ['respuesta', 1],
                ['rango_edad', $j->numero_opcion],
                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
            ])->get());

        if(count($aux) == 0) {
            $respuestas->put($j->opcion, 0);
        }
        else {
            foreach($aux as $i) {
                $aux2 = json_decode(respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado')
                    ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                    ->where([
                        ['id_preguntas', 'pregunta10-1'],
                        ['respuesta', '!=', 'abae'],
                        ['respuestas.id_encuestado', $i->id_encuestado],
                        ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                    ])->get());
                    
                if(count($aux2) > 0) {
                    $respuestas->put($j->opcion, (count($aux2) * 100) / count($aux));
                }
            }
        }
    }
    $estadisticas->put('porcentaje_si_pregunta10_incorrectamente_rango_edad', $respuestas);

    //----------------------------------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por nivel de instruccion

    $respuestas = collect();
    $nivel_instruccion  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'nivel_instruccion')->get());
    foreach($nivel_instruccion as $j) {
        $aux = json_decode(respuestas::select('opcion', 'respuesta', 'respuestas.id_encuestado')
            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
            ->where([
                ['id_preguntas', 'pregunta10'],
                ['respuesta', 1],
                ['nivel_instruccion', $j->numero_opcion],
                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
            ])->get());

        if(count($aux) == 0) {
            $respuestas->put($j->opcion, 0);
        }
        else {
            foreach($aux as $i) {
                $aux2 = json_decode(respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado')
                    ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                    ->where([
                        ['id_preguntas', 'pregunta10-1'],
                        ['respuesta', 'abae'],
                        ['respuestas.id_encuestado', $i->id_encuestado],
                        ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                    ])->get());
                    
                if(count($aux2) > 0) {
                    $respuestas->put($j->opcion, (count($aux2) * 100) / count($aux));
                }
            }
        }
    }
    $estadisticas->put('porcentaje_si_pregunta10_correctamente_nivel_instruccion', $respuestas);
    
    //----------------------------------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron incorrectamente ABAE por nivel de instruccion

    $respuestas = collect();
    $nivel_instruccion  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'nivel_instruccion')->get());
    foreach($nivel_instruccion as $j) {
        $aux = json_decode(respuestas::select('opcion', 'respuesta', 'respuestas.id_encuestado')
            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
            ->where([
                ['id_preguntas', 'pregunta10'],
                ['respuesta', 1],
                ['nivel_instruccion', $j->numero_opcion],
                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
            ])->get());

        if(count($aux) == 0) {
            $respuestas->put($j->opcion, 0);
        }
        else {
            foreach($aux as $i) {
                $aux2 = json_decode(respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado')
                    ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                    ->where([
                        ['id_preguntas', 'pregunta10-1'],
                        ['respuesta', '!=', 'abae'],
                        ['respuestas.id_encuestado', $i->id_encuestado],
                        ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                    ])->get());
                    
                if(count($aux2) > 0) {
                    $respuestas->put($j->opcion, (count($aux2) * 100) / count($aux));
                }
            }
        }
    }
    $estadisticas->put('porcentaje_si_pregunta10_incorrectamente_nivel_instruccion', $respuestas);

    //----------------------------------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por región

    $respuestas = collect();
    $region  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'region')->get());
    foreach($region as $j) {
        $aux = json_decode(respuestas::select('opcion', 'respuesta', 'respuestas.id_encuestado')
            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
            ->where([
                ['id_preguntas', 'pregunta10'],
                ['respuesta', 1],
                ['region', $j->numero_opcion],
                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
            ])->get());

        if(count($aux) == 0) {
            $respuestas->put($j->opcion, 0);
        }
        else {
            foreach($aux as $i) {
                $aux2 = json_decode(respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado')
                    ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                    ->where([
                        ['id_preguntas', 'pregunta10-1'],
                        ['respuesta', 'abae'],
                        ['respuestas.id_encuestado', $i->id_encuestado],
                        ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                    ])->get());
                    
                if(count($aux2) > 0) {
                    $respuestas->put($j->opcion, (count($aux2) * 100) / count($aux));
                }
            }
        }
    }
    $estadisticas->put('porcentaje_si_pregunta10_correctamente_region', $respuestas);

    //----------------------------------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron incorrectamente ABAE por región

    $respuestas = collect();
    $region  = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')->where('id_preguntas', 'region')->get());
    foreach($region as $j) {
        $aux = json_decode(respuestas::select('opcion', 'respuesta', 'respuestas.id_encuestado')
            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
            ->where([
                ['id_preguntas', 'pregunta10'],
                ['respuesta', 1],
                ['region', $j->numero_opcion],
                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
            ])->get());

        if(count($aux) == 0) {
            $respuestas->put($j->opcion, 0);
        }
        else {
            foreach($aux as $i) {
                $aux2 = json_decode(respuestas::select('respuestas.opcion', 'respuestas.respuesta', 'respuestas.id_encuestado')
                    ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
                    ->where([
                        ['id_preguntas', 'pregunta10-1'],
                        ['respuesta', '!=', 'abae'],
                        ['respuestas.id_encuestado', $i->id_encuestado],
                        ['respuestas.id_control_encuesta', $id_encuesta_abierta]
                    ])->get());
                    
                if(count($aux2) > 0) {
                    $respuestas->put($j->opcion, (count($aux2) * 100) / count($aux));
                }
            }
        }
    }
    $estadisticas->put('porcentaje_si_pregunta10_incorrectamente_region', $respuestas);
    
    //return view('admin.stats')->with('estadisticas', $estadisticas);
    return $estadisticas;
    //$numero = 333;
    //return $numero;
}

function draw_stats_by_questions_by_condition($estadisticas, $condition, $id1, $id2) {
    ?>
    <div class="row">
        <div class="col">                        
            <div class="card">
                <h5> Preguntas de selección simple </h5>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- ### % Distribución de respuestas por preguntas de selección simple ###  -->

        <?php
            $stats  = $estadisticas[$condition]->get('respuestas_seleccion_simple');
            $keys   = $stats->keys();

            $count = 0;
            foreach($keys as $i) {
                $count++;
                $id = $id1.$count;

                $pregunta = $i;
                
                $aux   = $stats->get($i);
                $keys2 = $aux->keys();
                
                $options = collect();
                foreach(json_decode($aux)->options as $j) {
                    $options->push($j);
                }

                $data = collect();
                foreach($aux->get('a_by_rule')->keys() as $j) {
                    $tmp = collect();
                    $tmp->put('key', $j);
                    $tmp->put('value', $aux->get('a_by_rule')->get($j));
                    $data->push($tmp);
                }
                ?>

                <div class="col">
                    <div class="card">
                        <script>
                            var options  = <?php echo json_encode($options); ?>;
                            var data     = <?php echo json_encode($data); ?>;
                            var pregunta = <?php echo json_encode($i); ?>;

                            var datasets = new Array();
                            for(var i=0; i<=data.length-1; i++) {
                                var tmp = {
                                    label          : data[i]['key'],
                                    data           : data[i]['value'],
                                    backgroundColor: random_rgb_color()
                                }
                                datasets.push(tmp);
                            }

                            var data = {
                                labels  : options,
                                datasets: datasets
                            };

                            var options = {
                                title: {
                                    display: true,
                                    text: pregunta
                                }
                            };
                        </script>
                      
                        <canvas id="<?php echo $id ?>"></canvas>

                        <script>
                            var type = "bar";
                            var id   = document.getElementById('<?php echo $id; ?>');
                            new_chart(id, type, data, options);
                        </script>
                    </div>
                </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col">                        
            <div class="card">
                <h5> Preguntas de selección múltiple </h5>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- ### % Distribución de respuestas por preguntas de selección múltiple ###  -->

        <?php
            $stats = $estadisticas[$condition]->get('respuestas_seleccion_multiple');
            $keys  = $stats->keys();

            $count = 0;
            foreach($keys as $i) {
                $count++;

                $pregunta = $i;

                $id = $id2.$pregunta.$count;

                $aux   = $stats->get($i);
                $keys2 = collect([$aux->keys()[0]]);

                if($pregunta == 'pregunta1' || $pregunta == 'pregunta11') {
                    $count2 = 0;
                    foreach($keys2 as $j) {
                        $aux2 = $aux->get($j);
                        
                        $other_options = collect();
                        foreach(json_decode($aux)->other_options as $j) {
                            $other_options->push($j);
                        }

                        $opcion   = '';
                        $last_key = '';
                        
                        foreach($aux2 as $k) {
                            $opcion = $k->get('key');
                            
                            if($opcion != $last_key) {
                                $last_key = $opcion;
                                $data     = collect();
                            
                                    foreach($k->get('value') as $l) {
                                        $tmp = collect();
                                        $tmp->put('key', $l->get('key'));
                                        $tmp->put('value', json_decode($l->get('value')));
                                        $data->push($tmp);
                                    }
                        
                                $count2++;
                                $id2 = $id.$count2;
                                ?>
                                <div class="col">
                                    <div class="card">
                                        <script>
                                            var data          = <?php echo json_encode($data); ?>;
                                            var pregunta      = <?php echo json_encode($pregunta); ?>;
                                            var other_options = <?php echo json_encode($other_options); ?>;
                                            <?php $title      = $pregunta . '. ' . 'Opción: ' . $opcion; ?>;
                                            var title         = <?php echo json_encode($title); ?>;

                                            var datasets = new Array();
                                            for(var i=0; i<=data.length-1; i++) {
                                                var tmp = {
                                                    label          : data[i]['key'],
                                                    data           : data[i]['value'],
                                                    backgroundColor: random_rgb_color()
                                                }
                                                datasets.push(tmp);
                                            }

                                            var data = {
                                                labels  : other_options,
                                                datasets: datasets
                                            };

                                            var options = {
                                                title: {
                                                    display: true,
                                                    text: title
                                                }
                                            };
                                        </script>
                                        
                                        <canvas id="<?php echo $id2 ?>"></canvas>

                                        <script>
                                            var type = "bar";
                                            var id   = document.getElementById('<?php echo $id2; ?>');
                                            new_chart(id, type, data, options);
                                        </script>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                }
                else {
                    $options = collect();
                    foreach(json_decode($aux)->options as $j) {
                        $options->push($j);
                    }

                    $data = collect();
                    
                    foreach($keys2 as $j) {                                    
                        $aux2 = $aux->get($j);

                        foreach($aux2 as $k) {
                            $tmp = collect();
                            $tmp->put('key', $k->get('key'));
                            $tmp->put('value', json_decode($k->get('value')));
                            $data->push($tmp);
                        }
                    }
                    
                    $data_keys = array();
                    foreach($data as $j) {
                        $aux = $j->get('key');
                        if(in_array($aux, $data_keys) == false) {
                            array_push($data_keys, $aux);
                        }
                    }

                    $new_data = collect();

                    $count = 0;
                    foreach($data_keys as $j) {
                        $tmp = collect();
                        $tmp->put('index', $count);
                        $tmp->put('key', $j);
                        $tmp->put('value', collect());
                        $new_data->put($j, $tmp);
                        $count++;
                    }

                    for($j=0; $j<=$data->count()-1; $j++) {
                        $new_data->get($data[$j]->get('key'))
                            ->get('value')->push($data[$j]
                                ->get('value')[$new_data->get($data[$j]
                                    ->get('key'))
                                        ->get('index')]);
                    }
                    
                    $count2++;
                    $id2 = $id.$count2;
                    ?>
                    <div class="col">
                        <div class="card">
                            <script>
                                var data      = <?php echo json_encode($new_data); ?>;
                                var data_keys = <?php echo json_encode($data_keys); ?>;
                                var pregunta  = <?php echo json_encode($pregunta); ?>;
                                var options   = <?php echo json_encode($options); ?>;
                                var title     = <?php echo json_encode($pregunta); ?>;

                                    var datasets = new Array();
                                    for(var i=0; i<=data_keys.length-1; i++) {
                                        var tmp = {
                                            label          : data[data_keys[i]]['key'],
                                            data           : data[data_keys[i]]['value'],
                                            backgroundColor: random_rgb_color()
                                        }
                                        datasets.push(tmp);
                                    }

                                    var data = {
                                        labels  : options,
                                        datasets: datasets
                                    };

                                    var options = {
                                        title: {
                                            display: true,
                                            text: title
                                        }
                                    };
                            </script>
                            
                            <canvas id="<?php echo $id2 ?>"></canvas>

                            <script>
                                var type = "bar";
                                var id   = document.getElementById('<?php echo $id2; ?>');
                                new_chart(id, type, data, options);
                            </script>
                        </div>
                    </div>
                <?php
                }
            }
        ?>
    </div>
    <?php
}
