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

    try {
        // Obtiene la encuesta abierta
        $id_encuesta_abierta = json_decode(control_encuesta::latest('id')
        ->first())->id;
    }
    catch (Exception $e) {
        //echo 'Caught exception: ',  $e->getMessage(), "\n";
        exit;
    }

    //----------------------------------------------------------------//
    
    // Número de encuestados en la última encuesta
    
    if($id_encuesta_abierta != NULL) {
        $numero_encuestados = count(control_encuestado::select('id')
        ->where('id_control_encuesta', $id_encuesta_abierta)->get());
        $estadisticas->put('numero_encuestados', $numero_encuestados);
    }
    else {
        return 'NO HAY NADA';
    }

    //----------------------------------------------------------------//

    // Número de encuestados masculinos
    
    $numero_encuestados_masculinos = count(control_encuestado::select('control_encuestados.id')
        ->where([
            ['control_encuestados.id_control_encuesta', '=', $id_encuesta_abierta],
            ['control_encuestados.genero', '=', 1]
        ])->get());

    if($numero_encuestados_masculinos == 0) {
        $estadisticas->put('numero_encuestados_masculinos', $numero_encuestados_masculinos);
        $estadisticas->put('porcentaje_encuestados_masculinos', 0);
    }
    else {
        $estadisticas->put('numero_encuestados_masculinos', $numero_encuestados_masculinos);
        $estadisticas->put('porcentaje_encuestados_masculinos', ($numero_encuestados_masculinos * 100) / $estadisticas['numero_encuestados']);
    }

    //----------------------------------------------------------------//

    // Número de encuestados femeninos
    
    $numero_encuestados_femeninos = count(control_encuestado::select('control_encuestados.id')
        ->where([
            ['control_encuestados.id_control_encuesta', '=', $id_encuesta_abierta],
            ['control_encuestados.genero', '=', 2]
        ])->get());

    if($numero_encuestados_femeninos == 0) {
        $estadisticas->put('numero_encuestados_femeninos', $numero_encuestados_femeninos);
        $estadisticas->put('porcentaje_encuestados_femeninos', 0);
    }
    else {
        $estadisticas->put('numero_encuestados_femeninos', $numero_encuestados_femeninos);
        $estadisticas->put('porcentaje_encuestados_femeninos', ($numero_encuestados_femeninos * 100) / $estadisticas['numero_encuestados']);
    }

    //----------------------------------------------------------------//
    
    // % Distribución por rango de edad
    
    $aux = opciones_preguntas::select('opcion', 'numero_opcion')
        ->where('id_preguntas', 'rango_edad')->get();
        
    $aux2 = collect();
    foreach($aux as $i) {
        $aux = control_encuestado::select('id')
            ->where([
                ['rango_edad', $i->numero_opcion],
                ['id_control_encuesta', $id_encuesta_abierta]
            ])->get();
        $aux2->put($i->opcion, count($aux));
    }

    $aux = collect();
    foreach($aux2->keys() as $i) {
        try {
            $aux->put($i, ($aux2[$i] * 100) / $numero_encuestados);
        }
        catch (Exception $e) {
            $aux->put($i, 0);
        }
    }
    $estadisticas->put('porcentaje_rango_edades', $aux);

    //----------------------------------------------------------------//

    // % Distribución por nivel de instrucción
    
    $aux = opciones_preguntas::select('opcion', 'numero_opcion')
        ->where('id_preguntas', 'nivel_instruccion')->get();
    
    $aux2 = collect();
    foreach($aux as $i) {
        $aux = control_encuestado::select('id')
            ->where([
                ['nivel_instruccion', $i->numero_opcion],
                ['id_control_encuesta', $id_encuesta_abierta]
            ])->get();
        $aux2->put($i->opcion, count($aux));
    }

    $aux = collect();
    foreach($aux2->keys() as $i) {
        try {
            $aux->put($i, ($aux2[$i] * 100) / $numero_encuestados);
        }
        catch (Exception $e) {
            $aux->put($i, 0);
        }
    }
    $estadisticas->put('porcentaje_nivel_instruccion', $aux);

    //----------------------------------------------------------------//

    // % Distribución por región
    
    $aux = opciones_preguntas::select('opcion', 'numero_opcion')
        ->where('id_preguntas', 'region')->get();
    
    $aux2 = collect();
    foreach($aux as $i) {
        $aux = control_encuestado::select('id')
            ->where([
                ['region', $i->numero_opcion],
                ['id_control_encuesta', $id_encuesta_abierta]
            ])->get();
        $aux2->put($i->opcion, count($aux));
    }

    $aux = collect();
    foreach($aux2->keys() as $i) {
        try {
            $aux->put($i, ($aux2[$i] * 100) / $numero_encuestados);
        }
        catch (Exception $e) {
            $aux->put($i, 0);
        }
    }
    $estadisticas->put('porcentaje_region', $aux);

    //----------------------------------------------------------------//

    // % Districbución de respuestas por preguntas
    
    $respuestas = collect();

    // Selecciona las preguntas de selección simple
    $preguntas_seleccion_simple  = json_decode(preguntas::select('id')
        ->where('tipo_pregunta', 1)->get());
        
    $respuestas_seleccion_simple = collect();
    foreach($preguntas_seleccion_simple as $i) {
        $tmp = collect();
        $id_pregunta = $i->id;

        // Selecciona las opciones
        $opciones = opciones_preguntas::select('opcion', 'numero_opcion')
            ->where('id_preguntas', $id_pregunta)->get();
        
        for($j=0; $j<=$opciones->count()-1; $j++) {
            // Obtiene las respuestas
            $aux = respuestas::select('id')
                ->where([
                    ['id_preguntas', $id_pregunta],
                    ['respuesta', $opciones[$j]['numero_opcion']],
                    ['id_control_encuesta', $id_encuesta_abierta]
                ])->get();

            $aux2 = collect();
            $aux2->put('pregunta', $id_pregunta);
            $aux2->put('opcion', $opciones[$j]['opcion']);
            $aux2->put('total', $aux->count());
            try {
                $aux2->put('porcentaje', ($aux->count() * 100) / $numero_encuestados);
            }
            catch (Exception $e) {
                $aux2->put('porcentaje', 0);
            }
            $tmp->push($aux2);
        }
        $respuestas_seleccion_simple->put($id_pregunta, $tmp);
    }
    $respuestas->put('respuestas_seleccion_simple', $respuestas_seleccion_simple);

    // Selecciona las preguntas de selección múltiple
    $preguntas_seleccion_multiple   = json_decode(preguntas::select('id')
        ->where('tipo_pregunta', 2)->get());
        
    $respuestas_seleccion_multiple  = collect();
    foreach($preguntas_seleccion_multiple as $i) {
        $id_pregunta = $i->id;
        
        // Selecciona las opciones
        $opciones = json_decode(opciones_preguntas::select('id', 'opcion', 'numero_opcion')
            ->where('id_preguntas', $id_pregunta)->get());
        
        // Selecciona las sub opciones
        $otras_opciones = json_decode(otras_opciones_preguntas::select('id', 'opcion', 'numero_opcion')
            ->where('id_preguntas', $id_pregunta)->get());

        $a_by_option = collect();

        $porcentajes_else = collect();
        $labels_else      = collect();

        $flag = 0;
        foreach($opciones as $j) {
            $cien_porciento = respuestas::select('id')
            ->where('id_preguntas', $id_pregunta)->get();
            
            $tmp2 = collect();
            
            $porcentajes = collect();
            $labels      = collect();
            
            if(count($otras_opciones) > 0) {
                $flag = 1;
                
                foreach($otras_opciones as $k) {
                    // Obtiene las respuestas
                    $aux = respuestas::select('id')
                        ->where([
                            ['id_preguntas', $id_pregunta],
                            ['opcion', $j->id],
                            ['respuesta', $k->numero_opcion],
                            ['id_control_encuesta', $id_encuesta_abierta]
                        ])->get();
                        
                    try {
                        $porcentaje = (count($aux) * 100) / $numero_encuestados;
                        $porcentajes->push($porcentaje);
                        $labels->push($k->opcion);
                    }
                    catch (Exception $e) {
                        $porcentaje = 0;
                        $porcentajes->push($porcentaje);
                        $labels->push($k->opcion);
                    }
                }
                $tmp = collect();
                $tmp->put('porcentajes', $porcentajes);
                $tmp->put('labels', $labels);
                $tmp2->push($tmp);
            }
            else {
                // Obtiene las respuestas
                $aux = respuestas::select('id')
                    ->where([
                        ['id_preguntas', $id_pregunta],
                        ['opcion', $j->id],
                        ['respuesta', $j->numero_opcion],
                        ['id_control_encuesta', $id_encuesta_abierta]
                    ])->get();
                    
                try {
                    $porcentaje = (count($aux) * 100) / count($cien_porciento);
                    $porcentajes_else->push($porcentaje);
                    $labels_else->push($j->opcion);
                }
                catch (Exception $e) {
                    $porcentaje = 0;
                    $porcentajes_else->push($porcentaje);
                    $labels_else->push($j->opcion);
                }
            }
            if($flag == 1) {
                $tmp = collect();
                $tmp->put('key', $j->opcion);
                $tmp->put('value', $tmp2);
                $a_by_option->push($tmp);
            }
        }
        $tmp2 = collect();
        $tmp2->put('porcentajes', $porcentajes_else);
        $tmp2->put('labels', $labels_else);
        $tmp3 = collect();
        $tmp3->push($tmp2);
        
        $tmp = collect();
        $tmp->put('key', $id_pregunta);
        $tmp->put('value', $tmp3);
        $a_by_option->push($tmp);
        $respuestas_seleccion_multiple->put($id_pregunta, $a_by_option);
    }
    $respuestas->put('respuestas_seleccion_multiple', $respuestas_seleccion_multiple);

    // Selecciona las preguntas de redacción
    $preguntas_redaccion   = json_decode(preguntas::select('id')
        ->where('tipo_pregunta', 3)->get());
    
    // Selecciona las respuestas
    $respuestas_redaccion  = collect();
    foreach($preguntas_redaccion as $i) {
        $id_pregunta = $i->id;
        $aux = respuestas::select('opcion', 'respuesta')
            ->where([
                ['id_preguntas', $id_pregunta],
                ['id_control_encuesta', $id_encuesta_abierta]
            ])->get();

        $aux2 = collect();
        $aux2->put('pregunta', $id_pregunta);
        $aux2->put('total', count($aux));
        try {
            $aux2->put('porcentaje', (count($aux) * 100) / $numero_encuestados);
        }
        catch (Exception $e) {
            $aux2->put('porcentaje', 0);
        }
        $respuestas_redaccion->push($aux2);
    }
    $respuestas->put('respuestas_redaccion', $respuestas_redaccion);
    $estadisticas->put('porcentaje_respuestas', $respuestas);

    //----------------------------------------------------------------//

    // % Districbución de respuestas por preguntas por genero

    $rule = 'genero';

    $conditions = json_decode(opciones_preguntas::select('numero_opcion')
        ->where([
            ['id_preguntas', $rule]
        ])->get());

    $population = collect();
    foreach($conditions as $i) {
        $aux = control_encuestado::select('id')
            ->where([
                [$rule, $i->numero_opcion]
            ])->get();

        $population->put($i->numero_opcion, count($aux));
    }

    $condition = collect();
    $condition->put('condition', $rule);
    $condition->put('population', $population);
    
    $join = [
        'control_encuestados',
        'control_encuestados.id_encuestado',
        'respuestas.id_encuestado'
    ];

    $where = [
        'control_encuestados.genero',
        'respuestas.id_control_encuesta'
    ];
    
    $respuestas = stats_by_question_by_condition($condition, $join, $where, $id_encuesta_abierta, $numero_encuestados);

    $estadisticas->put('porcentaje_respuestas_genero', $respuestas);

    //----------------------------------------------------------------//

    // % Districbución de respuestas por preguntas por rango de edad
    $rule = 'rango_edad';

    $conditions = json_decode(opciones_preguntas::select('numero_opcion')
        ->where([
            ['id_preguntas', $rule]
        ])->get());

    $population = collect();
    foreach($conditions as $i) {
        $aux = control_encuestado::select('id')
            ->where([
                [$rule, $i->numero_opcion]
            ])->get();

        $population->put($i->numero_opcion, count($aux));
    }

    $condition = collect();
    $condition->put('condition', $rule);
    $condition->put('population', $population);
    
    $join = [
        'control_encuestados',
        'control_encuestados.id_encuestado',
        'respuestas.id_encuestado'
    ];

    $where = [
        'control_encuestados.rango_edad',
        'respuestas.id_control_encuesta'
    ];
    
    $respuestas = stats_by_question_by_condition($condition, $join, $where, $id_encuesta_abierta, $numero_encuestados);

    $estadisticas->put('porcentaje_respuestas_rango_edad', $respuestas);
    
    //----------------------------------------------------------------//

    // % Districbución de respuestas por preguntas por nivel de instrucción

    $rule = 'nivel_instruccion';

    $conditions = json_decode(opciones_preguntas::select('numero_opcion')
        ->where([
            ['id_preguntas', $rule]
        ])->get());

    $population = collect();
    foreach($conditions as $i) {
        $aux = control_encuestado::select('id')
            ->where([
                [$rule, $i->numero_opcion]
            ])->get();

        $population->put($i->numero_opcion, count($aux));
    }

    $condition = collect();
    $condition->put('condition', $rule);
    $condition->put('population', $population);
    
    $join = [
        'control_encuestados',
        'control_encuestados.id_encuestado',
        'respuestas.id_encuestado'
    ];

    $where = [
        'control_encuestados.nivel_instruccion',
        'respuestas.id_control_encuesta'
    ];
    
    $respuestas = stats_by_question_by_condition($condition, $join, $where, $id_encuesta_abierta, $numero_encuestados);

    $estadisticas->put('porcentaje_respuestas_nivel_instruccion', $respuestas);
    
    //----------------------------------------------------------------//

    // % Districbución de respuestas por preguntas por región

    $rule = 'region';

    $conditions = json_decode(opciones_preguntas::select('numero_opcion')
        ->where([
            ['id_preguntas', $rule]
        ])->get());

    $population = collect();
    foreach($conditions as $i) {
        $aux = control_encuestado::select('id')
            ->where([
                [$rule, $i->numero_opcion]
            ])->get();

        $population->put($i->numero_opcion, count($aux));
    }

    $condition = collect();
    $condition->put('condition', $rule);
    $condition->put('population', $population);
    
    $join = [
        'control_encuestados',
        'control_encuestados.id_encuestado',
        'respuestas.id_encuestado'
    ];

    $where = [
        'control_encuestados.region',
        'respuestas.id_control_encuesta'
    ];
    
    $respuestas = stats_by_question_by_condition($condition, $join, $where, $id_encuesta_abierta, $numero_encuestados);

    $estadisticas->put('porcentaje_respuestas_region', $respuestas);
    
    //----------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE

    $aux = json_decode(respuestas::select('opcion', 'respuesta', 'id_encuestado')
        ->where([
            ['id_preguntas', 'pregunta10'],
            ['respuesta', 1],
            ['id_control_encuesta', $id_encuesta_abierta]
        ])->get());

    $count = 0;
    foreach($aux as $i) {
        $aux2 = json_decode(respuestas::select('opcion', 'respuesta', 'id_encuestado')
            ->where([
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
    try {
        $respuestas->put('porcentaje', ($count * 100) / count($aux));
    }
    catch (Exception $e) {
        $respuestas->put('porcentaje', 0);
    }
    $estadisticas->put('porcentaje_si_pregunta10_correctamente', $respuestas);

    //----------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron incorrectamente ABAE

    $aux = json_decode(respuestas::select('id_encuestado')
        ->where([
            ['id_preguntas', 'pregunta10'],
            ['respuesta', 1],
            ['id_control_encuesta', $id_encuesta_abierta]
        ])->get());

    $count = 0;
    foreach($aux as $i) {
        $aux2 = json_decode(respuestas::select('id_encuestado')
            ->where([
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
    try {
        $respuestas->put('porcentaje', ($count * 100) / count($aux));
    }
    catch (Exception $e) {
        $respuestas->put('porcentaje', 0);
    }
    $estadisticas->put('porcentaje_si_pregunta10_incorrectamente', $respuestas);

    //----------------------------------------------------------------//

    $question    = 'pregunta10';
    $condition2  = 'pregunta10-1';
    $answer      = 'abae';
    $comparison  = '=';

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por genero

    $condition   = 'genero';

    $respuestas = stats_by_answers_by_condition($condition, $question, $condition2, $answer, $comparison, $id_encuesta_abierta);

    $estadisticas->put('porcentaje_si_pregunta10_correctamente_genero', $respuestas);

    //----------------------------------------------------------------//

    // % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por rango de edad

    $condition   = 'rango_edad';

    $respuestas = stats_by_answers_by_condition($condition, $question, $condition2, $answer, $comparison, $id_encuesta_abierta);

    $estadisticas->put('porcentaje_si_pregunta10_correctamente_rango_edad', $respuestas);

    //----------------------------------------------------------------//
    
    // % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por nivel de instrucción

    $condition   = 'nivel_instruccion';

    $respuestas = stats_by_answers_by_condition($condition, $question, $condition2, $answer, $comparison, $id_encuesta_abierta);

    $estadisticas->put('porcentaje_si_pregunta10_correctamente_nivel_instruccion', $respuestas);
    
    //----------------------------------------------------------------//
    
    // % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por region

    $condition   = 'region';

    $respuestas = stats_by_answers_by_condition($condition, $question, $condition2, $answer, $comparison, $id_encuesta_abierta);

    $estadisticas->put('porcentaje_si_pregunta10_correctamente_region', $respuestas);
    
    //----------------------------------------------------------------//
    
    return $estadisticas;
}

//--------------------------- Functions ------------------------------//

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
                                responsive: true,
                                title: {
                                    display: true,
                                    text: pregunta
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            max: 100
                                        }
                                    }],
                                    xAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            max: 100
                                        }
                                    }]
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
        <?php
            }
        ?>
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
                                
                                $data = collect();
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
                                                responsive: true,
                                                title: {
                                                    display: true,
                                                    text: title
                                                },
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true,
                                                            max: 100
                                                        }
                                                    }],
                                                    xAxes: [{
                                                        ticks: {
                                                            beginAtZero: true,
                                                            max: 100
                                                        }
                                                    }]
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
                                        responsive: true,
                                        title: {
                                            display: true,
                                            text: title
                                        },
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true,
                                                    max: 100
                                                }
                                            }],
                                            xAxes: [{
                                                ticks: {
                                                    beginAtZero: true,
                                                    max: 100
                                                }
                                            }]
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

// -------------------------------------------------------------------//

function stats_by_question_by_condition($condition, $join, $where, $id_encuesta_abierta, $numero_encuestados) {
    $rules = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')
        ->where('id_preguntas', $condition->get('condition'))->get());
    
    $rule   = collect();
    $labels = collect();        
    foreach($rules as $i) {
        $rule->push($i->numero_opcion);
        $labels->push($i->opcion);
    }
    
    $respuestas = collect();

    // Selecciona las preguntas de selección simple
    $preguntas_seleccion_simple  = json_decode(preguntas::select('id')
        ->where('tipo_pregunta', 1)->get());
    
    $respuestas_seleccion_simple = collect();
    foreach($preguntas_seleccion_simple as $i) {
        $id_pregunta = $i->id;

        // Selecciona las opciones
        $opciones = opciones_preguntas::select('opcion', 'numero_opcion')
            ->where('id_preguntas', $id_pregunta)->get();

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
                    ->join($join[0], $join[1], '=', $join[2])
                    ->where([
                        ['id_preguntas', $id_pregunta],
                        ['respuesta', $j->numero_opcion],
                        [$where[0], '=', $k],
                        [$where[1], $id_encuesta_abierta]
                    ])->get();

                try {
                    $porcentaje = (count($aux) * 100) / $condition->get('population')->get($k);
                }
                catch (Exception $e) {
                    $porcentaje = 0;
                }
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
    $preguntas_seleccion_multiple  = json_decode(preguntas::select('id')
        ->where('tipo_pregunta', 2)->get());
        
    $respuestas_seleccion_multiple = collect();
    foreach($preguntas_seleccion_multiple as $i) {
        $id_pregunta  = $i->id;
        
        // Selecciona las opciones
        $opciones = json_decode(opciones_preguntas::select('id', 'opcion', 'numero_opcion')
            ->where('id_preguntas', $id_pregunta)->get());

        $options = collect();
        foreach($opciones as $j) {
            $options->push($j->opcion);
        }
        
        // Selecciona las sub opciones
        $otras_opciones = json_decode(otras_opciones_preguntas::select('id', 'opcion', 'numero_opcion', 'id_preguntas')
            ->where('id_preguntas', $id_pregunta)->get());

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
                            ->join($join[0], $join[1], '=', $join[2])
                            ->where([
                                ['id_preguntas', $id_pregunta],
                                ['opcion', $j->id],
                                ['respuesta', $k->numero_opcion],
                                [$where[0], '=', $m],
                                [$where[1], $id_encuesta_abierta]
                            ])->get();

                        $porcentaje = 0;
                        
                        try {
                            $porcentaje = (count($aux) * 100) / $condition->get('population')->get($m);
                        }
                        catch (Exception $e) {
                            $porcentaje = 0;
                        }
                        
                        $a_by_other_option->push($porcentaje);
                    }
                    $tmp = collect();
                    $tmp->put('key', $labels[$m-1]);
                    $tmp->put('value', $a_by_other_option);
                    $a_by_rule1->push($tmp);
                }
                else {
                    $flag = 0;

                    $cien_porciento = respuestas::select('respuestas.id')
                        ->join($join[0], $join[1], '=', $join[2])
                        ->where([
                            ['id_preguntas', $id_pregunta],
                            [$where[0], '=', $m],
                            [$where[1], $id_encuesta_abierta]
                        ])->get();
                    
                    // Obtiene las respuestas
                    $aux = respuestas::select('respuestas.id')
                        ->join($join[0], $join[1], '=', $join[2])
                        ->where([
                            ['id_preguntas', $id_pregunta],
                            ['opcion', $j->id],
                            ['respuesta', $j->numero_opcion],
                            [$where[0], '=', $m],
                            [$where[1], $id_encuesta_abierta]
                        ])->get();

                    try {
                        $porcentaje = (count($aux) * 100) / count($cien_porciento);
                    }
                    catch (Exception $e) {
                        $porcentaje = 0;
                    }
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

    return $respuestas;
}

// -------------------------------------------------------------------//

function stats_by_answers_by_condition($condition, $question, $condition2, $answer, $comparison, $id_encuesta_abierta) {
    $respuestas = collect();
    
    $condition_result = json_decode(opciones_preguntas::select('opcion', 'numero_opcion')
        ->where('id_preguntas', $condition)->get());

    foreach($condition_result as $j) {
        $aux = json_decode(respuestas::select('respuestas.id_encuestado')
            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
            ->where([
                ['id_preguntas', $condition2],
                ['respuesta', $comparison, $answer],
                [$condition, $j->numero_opcion],
                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
            ])->get());

        $cien_porciento = respuestas::select('respuestas.id_encuestado')
            ->join('control_encuestados', 'control_encuestados.id_encuestado', '=', 'respuestas.id_encuestado')
            ->where([
                ['id_preguntas', $question],
                ['respuesta', 1],
                [$condition, $j->numero_opcion],
                ['respuestas.id_control_encuesta', $id_encuesta_abierta]
            ])->get();

        try {
            $respuestas->put($j->opcion, (count($aux) * 100) / count($cien_porciento));
        }
        catch (Exception $e) {
            $respuestas->put($j->opcion, 0);
        }
    }

    return $respuestas;
}

// -------------------------------------------------------------------//

function draw_stats_by_answers_by_condition($id, $aux, $numero_encuestados) {
    $keys = $aux->keys();

    $data   = array();
    $labels = array();
    foreach($keys as $i) {
        array_push($data, $aux->get($i));
        array_push($labels, $i);
    }
    ?>
    <script>
        var data   = <?php echo json_encode($data); ?>;
        var labels = <?php echo json_encode($labels); ?>;

        var colors               = fill_background_hover_color(data.length);
        var backgroundColor      = colors[0];
        var hoverBackgroundColor = colors[1];

        var data = {
            labels: labels,
            datasets: [{
                label: 'porcentaje',
                data: data,
                backgroundColor: backgroundColor,
                hoverBackgroundColor: hoverBackgroundColor
            }]
        };

        var options = {
            responsive: true,
            title: {
                display: true,
                text: 'Encuestados: ' + <?php echo json_encode($numero_encuestados); ?>
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        max: 100
                    }
                }],
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        max: 100
                    }
                }]
            }
        };
    </script>

    <canvas id="<?php echo $id ?>"></canvas>

    <script>
        var type = "bar";
        var id   = document.getElementById('<?php echo $id; ?>');
        new_chart(id, type, data, options);
    </script>
    <?php
}
