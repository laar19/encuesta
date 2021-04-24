@extends('template.layout')

@section('topmenu')
    @include('template.topmenu')
@endsection

@section('sidebar')
    @include('template.sidebar')
@endsection

@section('content')

<link href="{{ asset('/assets/bootstrap-4.4.1-dist/css/bootstrap.min.css') }}" rel="stylesheet">

<script src="{{ asset('/assets/chartjs/dist/Chart.js') }}"></script>
<script src="{{ asset('/assets/js/stats/functions.js') }}"></script>

<div class="container">
    <div class="row">
        <div class="col">
            <?php
                if(count($data) > 0) {
                    print_r('Existe una encuesta abierta');
                    echo '<br>';
                    print_r('Fecha de apertura: ' . $data[0]->fecha_apertura);
                    echo '<br>';
                    print_r('Fecha de cierre: ' . $data[0]->fecha_apertura);
                    ?>
                    <form id="" method="post" action="{{ route('close_quest') }}">
                        {!! csrf_field() !!}
                        <input type="submit" name="submit" class="submit btn btn-outline-danger" value="Cerrar encuesta" />
                    </form>
                    <?php
                }
                else {
                    ?>
                    <form id="" method="post" action="{{ route('store_quest') }}">

                        {!! csrf_field() !!}
                        
                        <label for="fecha_apertura">Fecha de apertura</label>
                        <input type="date" name="fecha_apertura">
                        
                        <br>
                        
                        <label for="fecha_cierre">Fecha de cierre</label>        
                        <input type="date" name="fecha_cierre">
                        
                        <br>
                        
                        <input type="submit" name="submit" class="submit btn btn-success" value="Aperturar encuesta" />
                    </form>
                    <?php
                    exit;
                }
            ?>
        </div>
    </div>

    <?php
        $estadisticas = stats();
        $numero_encuestados = $estadisticas['numero_encuestados'];
    ?>
    
    <div class="row">

        <!-- ### % De distribucón por género ###  -->

        <?php
            $id          = 'porcentaje_genero';
            $stat = $estadisticas[$id];
            $title       = 'género';
            $type_chart  = 'doughnut';
            draw_stats_by_condition($id, $stat, $title, $numero_encuestados, $type_chart);
        ?>
        
        <!-- ### % De distribucón por rango de edades ###  -->

        <?php
            $id          = 'porcentaje_rango_edad';
            $stat = $estadisticas[$id];
            $title       = 'rango de edades';
            $type_chart  = 'doughnut';
            draw_stats_by_condition($id, $stat, $title, $numero_encuestados, $type_chart);
        ?>
        
        <!-- ### % De distribucón por nivel de instrucción ###  -->

        <?php
            $id          = 'porcentaje_nivel_instruccion';
            $stat = $estadisticas[$id];
            $title       = 'nivel de instrucción';
            $type_chart  = 'doughnut';
            draw_stats_by_condition($id, $stat, $title, $numero_encuestados, $type_chart);
        ?>
        
        <!-- ### % De distribucón por región ###  -->

        <?php
            $id          = 'porcentaje_region';
            $stat = $estadisticas[$id];
            $title       = 'región';
            $type_chart  = 'doughnut';
            draw_stats_by_condition($id, $stat, $title, $numero_encuestados, $type_chart);
        ?>
    </div>
    <div class="row">
        <div class="col">                        
            <div class="card">
                <h2>AQUÍ PUEDE IR OTRA COSA</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">                        
            <div class="card">
                <h2> Distribución de respuestas por preguntas </h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">                        
            <div class="card">
                <h5> Preguntas de selección simple </h5>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
            $stats  = $estadisticas['porcentaje_respuestas']->get('respuestas_seleccion_simple');
            $keys   = $stats->keys();

            $count = 0;
            foreach($keys as $i) {
                $count++;
                $id = 'porcentaje_respuestas_seleccion_simple'.$count;
                $aux = json_decode($stats->get($i));

                $data     = collect();
                $labels   = collect();
                $pregunta = collect();
                    
                foreach($aux as $j) {
                    $data->push($j->porcentaje);
                    $labels->push($j->opcion . ' ' . $j->total);
                    $pregunta->push($j->pregunta);
                }
                ?>

                <div class="col-6">
                    <div class="card">
                        <script>
                            var data   = <?php echo json_encode($data); ?>;
                            var labels = <?php echo json_encode($labels); ?>;

                            var colors               = fill_background_hover_color(data.length);
                            var backgroundColor      = colors[0];
                            var hoverBackgroundColor = colors[1];

                            var data = {
                                labels: labels,
                                datasets: [{
                                    label: "Porcentaje",
                                    data: data,
                                    backgroundColor: backgroundColor,
                                    hoverBackgroundColor: hoverBackgroundColor
                                }]
                            };

                            var options = {
                                responsive: true,
                                title: {
                                    display: true,
                                    text: '<?php echo $pregunta[0]; ?>'
                                }
                            };
                        </script>
                      
                        <canvas id="<?php echo $id; ?>"></canvas>

                        <script>
                            var type = "pie";
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
        <?php
            $stats = $estadisticas['porcentaje_respuestas']->get('respuestas_seleccion_multiple');
            $keys  = $stats->keys();

            $count = 0;
            foreach($keys as $i) {
                $count++;
                $aux = json_decode($stats->get($i));

                $count2 = 0;
                foreach($aux as $j) {
                    
                    $count2++;
                    $id = 'porcentaje_respuestas_seleccion_multiple'.$count.$count2;

                    $data     = $j->value[0]->porcentajes;
                    $labels   = $j->value[0]->labels;
                    $pregunta = $j->key;
                    ?>
                    <div class="col">
                        <div class="card">
                            <script>
                                var data   = <?php echo json_encode($data); ?>;
                                var labels = <?php echo json_encode($labels); ?>;

                                var colors               = fill_background_hover_color(data.length);
                                var backgroundColor      = colors[0];
                                var hoverBackgroundColor = colors[1];

                                var data = {
                                    labels: labels,
                                    datasets: [{
                                        label: "Porcentaje",
                                        data: data,
                                        backgroundColor: backgroundColor,
                                        hoverBackgroundColor: hoverBackgroundColor
                                    }]
                                };

                                var options = {
                                    responsive: true,
                                    title: {
                                        display: true,
                                        text: '<?php echo $pregunta; ?>'
                                    }
                                };
                            </script>
                          
                            <canvas id="<?php echo $id; ?>"></canvas>

                            <script>
                                var type = "pie";
                                var id   = document.getElementById('<?php echo $id; ?>');
                                new_chart(id, type, data, options);
                            </script>
                        </div>
                    </div>
                <?php
                }
            }
        ?>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <h2> Distribución de respuestas por preguntas por género </h2>
            </div>
        </div>
    </div>
    <?php
        $condition = 'porcentaje_respuestas_genero';
        $id1 = 'porcentaje_respuestas_genero_seleccion_simple';
        $id2 = 'porcentaje_respuestas_genero_seleccion_multiple';
        draw_stats_by_questions_by_condition($estadisticas, $condition, $id1, $id2);
    ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <h2> Distribución de respuestas por preguntas por rango de edad </h2>
            </div>
        </div>
    </div>
    <?php
        $condition = 'porcentaje_respuestas_rango_edad';
        $id1 = 'porcentaje_respuestas_rango_edad_seleccion_simple';
        $id2 = 'porcentaje_respuestas_rango_edad_seleccion_multiple';
        draw_stats_by_questions_by_condition($estadisticas, $condition, $id1, $id2);
    ?>
    <div class="row">
        <div class="col">                        
            <div class="card">
                <h2> Distribución de respuestas por preguntas por nivel de instrucción </h2>
            </div>
        </div>
    </div>
    <?php
        $condition = 'porcentaje_respuestas_nivel_instruccion';
        $id1 = 'porcentaje_respuestas_nivel_instruccion_seleccion_simple';
        $id2 = 'porcentaje_respuestas_nivel_instruccion_seleccion_multiple';
        draw_stats_by_questions_by_condition($estadisticas, $condition, $id1, $id2);
    ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <h2> Distribución de respuestas por preguntas por region </h2>
            </div>
        </div>
    </div>
    <?php
        $condition = 'porcentaje_respuestas_region';
        $id1 = 'porcentaje_respuestas_region_seleccion_simple';
        $id2 = 'porcentaje_respuestas_region_seleccion_multiple';
        draw_stats_by_questions_by_condition($estadisticas, $condition, $id1, $id2);
    ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <h2> % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE </h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <?php
                    $id = 'porcentaje_si_pregunta10_correctamente';
                    $correctamente   = $estadisticas->get('porcentaje_si_pregunta10_correctamente')->get('porcentaje');
                    $incorrectamente = $estadisticas->get('porcentaje_si_pregunta10_incorrectamente')->get('porcentaje');
                ?>
                <script>
                    var correctamente   = <?php echo json_encode($correctamente); ?>;
                    var incorrectamente = <?php echo json_encode($incorrectamente); ?>;

                    var labels = [
                        'Correctamente',
                        'Incorrectamente'
                    ];

                    var data = [correctamente, incorrectamente];

                    var colors               = fill_background_hover_color(data.length);
                    var backgroundColor      = colors[0];
                    var hoverBackgroundColor = colors[1];

                    var data = {
                        labels: labels,
                        datasets: [{
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
                        }
                    };
                </script>
              
                <canvas id="<?php echo $id; ?>"></canvas>

                <script>
                    var type = "pie";
                    var id   = document.getElementById('<?php echo $id; ?>');
                    new_chart(id, type, data, options);
                </script>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <h2> % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por genero</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <?php
                    $id = 'porcentaje_si_pregunta10_correctamente_genero';
                    $aux = $estadisticas->get('porcentaje_si_pregunta10_correctamente_genero');
                    draw_stats_by_answers_by_condition($id, $aux, $numero_encuestados);
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <h2> % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por rango de edad</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <?php
                    $id = 'porcentaje_si_pregunta10_correctamente_rango_edad';
                    $aux = $estadisticas->get('porcentaje_si_pregunta10_correctamente_rango_edad');
                    draw_stats_by_answers_by_condition($id, $aux, $numero_encuestados);
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <h2> % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por nivel de instruccion</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <?php
                    $id = 'porcentaje_si_pregunta10_correctamente_nivel_instruccion';
                    $aux = $estadisticas->get('porcentaje_si_pregunta10_correctamente_nivel_instruccion');
                    draw_stats_by_answers_by_condition($id, $aux, $numero_encuestados);
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <h2> % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por region</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <?php
                    $id = 'porcentaje_si_pregunta10_correctamente_region';
                    $aux = $estadisticas->get('porcentaje_si_pregunta10_correctamente_region');
                    draw_stats_by_answers_by_condition($id, $aux, $numero_encuestados);
                ?>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/assets/js/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/assets/bootstrap-4.4.1-dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('/assets/js/stats/main.js') }}"></script>
        
@endsection
