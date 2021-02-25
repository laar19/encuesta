<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
</head>

<body>
    <div>
        <h1>
            <?php
                $aux2 = stats();
                $aux = $aux2['porcentaje_rango_edades'];
                $keys = $aux->keys();
                for($i=0; $i<=(count($keys)-1); $i++) {
            ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>
        </h1>
        
        <h1>LISTO</h1>
        
        <h3>- Número de encuestados: {{ $estadisticas['numero_encuestados'] }}</h3>
        <h4>Masculinos: {{ $estadisticas['numero_encuestados_masculinos'] }} {{ $estadisticas['porcentaje_encuestados_masculinos'] }} %</h4>
        
        <h4>Masculinos: {{ $estadisticas['numero_encuestados_femeninos'] }} {{ $estadisticas['porcentaje_encuestados_femeninos'] }} %</h4>

        <h3>- % De distribucón por rango de edades</h3>
        <?php
            $aux = $estadisticas['porcentaje_rango_edades'];
            $keys = $aux->keys();
            for($i=0; $i<=(count($keys)-1); $i++) {
        ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>

        <h3>- % De distribucón por nivel de instrucción</h3>
        <?php
            $aux = $estadisticas['porcentaje_nivel_instruccion'];
            $keys = $aux->keys();
            for($i=0; $i<=(count($keys)-1); $i++) {
        ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>

        <h3>- % De distribucón por región</h3>
        <?php
            $aux = $estadisticas['porcentaje_region'];
            $keys = $aux->keys();
            for($i=0; $i<=(count($keys)-1); $i++) {
        ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>

        <h3>- % Districbución de respuestas por preguntas</h3>

        <h4>Preguntas de selección simple</h4>
        <?php
            foreach($estadisticas['porcentaje_respuestas']->get('respuestas_seleccion_simple') as $i) {
                print_r('pregunta: ' . json_decode($i)->pregunta . ' - ');
                print_r('opcion: ' . json_decode($i)->opcion . ' - ');
                print_r('numero opcion: ' . json_decode($i)->numero_opcion . ' - ');
                print_r('total: ' . json_decode($i)->total . ' - ');
                print_r('porcentaje: ' . json_decode($i)->porcentaje . '% - ');
                echo '<br>';
            }
        ?>

        <h4>Preguntas de selección múltiple</h4>
        <?php
            foreach($estadisticas['porcentaje_respuestas']->get('respuestas_seleccion_multiple') as $i) {
                print_r('pregunta: ' . json_decode($i)->pregunta . ' - ');
                print_r('opcion: ' . json_decode($i)->opcion . ' - ');
                print_r('respuesta: ' . json_decode($i)->respuesta . ' - ');
                //print_r('numero opcion: ' . json_decode($i)->numero_opcion . ' - ');
                print_r('total: ' . json_decode($i)->total . ' - ');
                print_r('porcentaje: ' . json_decode($i)->porcentaje . '% - ');
                echo '<br>';
            }
        ?>
        
        <h4>Preguntas de redacción</h4>
        <?php
            foreach($estadisticas['porcentaje_respuestas']->get('respuestas_redaccion') as $i) {
                print_r('pregunta: ' . json_decode($i)->pregunta . ' - ');
                //print_r('opcion: ' . json_decode($i)->opcion . ' - ');
                print_r('respuesta: ' . json_decode($i)->respuesta . ' - ');
                //print_r('total: ' . json_decode($i)->total . ' - ');
                //print_r('porcentaje: ' . json_decode($i)->porcentaje . '% - ');
                echo '<br>';
            }
        ?>

        <h3>- % Districbución de respuestas por preguntas por género</h3>

        <h4>Preguntas de selección simple por género</h4>
        <?php
            foreach($estadisticas['porcentaje_respuestas_genero']->get('respuestas_seleccion_simple') as $i) {
                print_r('pregunta: ' . json_decode($i)->pregunta . ' - ');
                print_r('opcion: ' . json_decode($i)->opcion . ' - ');
                print_r('numero opcion: ' . json_decode($i)->numero_opcion . ' - ');
                print_r('genero: ' . json_decode($i)->genero . ' - ');
                print_r('total: ' . json_decode($i)->total . ' - ');
                print_r('porcentaje: ' . json_decode($i)->porcentaje . '% - ');
                echo '<br>';
            }
        ?>

        <h4>Preguntas de selección múltiple por género</h4>
        <?php
            foreach($estadisticas['porcentaje_respuestas_genero']->get('respuestas_seleccion_multiple') as $i) {
                print_r('pregunta: ' . json_decode($i)->pregunta . ' - ');
                print_r('opcion: ' . json_decode($i)->opcion . ' - ');
                print_r('respuesta: ' . json_decode($i)->respuesta . ' - ');
                //print_r('numero opcion: ' . json_decode($i)->numero_opcion . ' - ');
                print_r('genero: ' . json_decode($i)->genero . ' - ');
                print_r('total: ' . json_decode($i)->total . ' - ');
                print_r('porcentaje: ' . json_decode($i)->porcentaje . '% - ');
                echo '<br>';
            }
        ?>

        <h3>- % Districbución de respuestas por preguntas por rango de edad</h3>

        <h4>Preguntas de selección simple por rango de edad</h4>
        <?php
            foreach($estadisticas['porcentaje_respuestas_rango_edad']->get('respuestas_seleccion_simple') as $i) {
                print_r('pregunta: ' . json_decode($i)->pregunta . ' - ');
                print_r('opcion: ' . json_decode($i)->opcion . ' - ');
                print_r('numero opcion: ' . json_decode($i)->numero_opcion . ' - ');
                print_r('rango_edad: ' . json_decode($i)->rango_edad . ' - ');
                print_r('total: ' . json_decode($i)->total . ' - ');
                print_r('porcentaje: ' . json_decode($i)->porcentaje . '% - ');
                echo '<br>';
            }
        ?>

        <h4>Preguntas de selección múltiple por rango de edad</h4>
        <?php
            foreach($estadisticas['porcentaje_respuestas_rango_edad']->get('respuestas_seleccion_multiple') as $i) {
                print_r('pregunta: ' . json_decode($i)->pregunta . ' - ');
                print_r('opcion: ' . json_decode($i)->opcion . ' - ');
                print_r('respuesta: ' . json_decode($i)->respuesta . ' - ');
                //print_r('numero opcion: ' . json_decode($i)->numero_opcion . ' - ');
                print_r('rango_edad: ' . json_decode($i)->rango_edad . ' - ');
                print_r('total: ' . json_decode($i)->total . ' - ');
                print_r('porcentaje: ' . json_decode($i)->porcentaje . '% - ');
                echo '<br>';
            }
        ?>

        <h3>- % Districbución de respuestas por preguntas por nivel de instrucción</h3>

        <h4>Preguntas de selección simple por nivel de instrucción</h4>
        <?php
            foreach($estadisticas['porcentaje_respuestas_nivel_instruccion']->get('respuestas_seleccion_simple') as $i) {
                print_r('pregunta: ' . json_decode($i)->pregunta . ' - ');
                print_r('opcion: ' . json_decode($i)->opcion . ' - ');
                print_r('numero opcion: ' . json_decode($i)->numero_opcion . ' - ');
                print_r('nivel_instruccion: ' . json_decode($i)->nivel_instruccion . ' - ');
                print_r('total: ' . json_decode($i)->total . ' - ');
                print_r('porcentaje: ' . json_decode($i)->porcentaje . '% - ');
                echo '<br>';
            }
        ?>

        <h4>Preguntas de selección múltiple por nivel de instrucción</h4>
        <?php
            foreach($estadisticas['porcentaje_respuestas_nivel_instruccion']->get('respuestas_seleccion_multiple') as $i) {
                print_r('pregunta: ' . json_decode($i)->pregunta . ' - ');
                print_r('opcion: ' . json_decode($i)->opcion . ' - ');
                print_r('respuesta: ' . json_decode($i)->respuesta . ' - ');
                //print_r('numero opcion: ' . json_decode($i)->numero_opcion . ' - ');
                print_r('nivel_instruccion: ' . json_decode($i)->nivel_instruccion . ' - ');
                print_r('total: ' . json_decode($i)->total . ' - ');
                print_r('porcentaje: ' . json_decode($i)->porcentaje . '% - ');
                echo '<br>';
            }
        ?>

        <h3>- % Districbución de respuestas por preguntas por región</h3>

        <h4>Preguntas de selección simple por región</h4>
        <?php
            foreach($estadisticas['porcentaje_respuestas_region']->get('respuestas_seleccion_simple') as $i) {
                print_r('pregunta: ' . json_decode($i)->pregunta . ' - ');
                print_r('opcion: ' . json_decode($i)->opcion . ' - ');
                print_r('numero opcion: ' . json_decode($i)->numero_opcion . ' - ');
                print_r('region: ' . json_decode($i)->region . ' - ');
                print_r('total: ' . json_decode($i)->total . ' - ');
                print_r('porcentaje: ' . json_decode($i)->porcentaje . '% - ');
                echo '<br>';
            }
        ?>

        <h4>Preguntas de selección múltiple por región</h4>
        <?php
            foreach($estadisticas['porcentaje_respuestas_region']->get('respuestas_seleccion_multiple') as $i) {
                print_r('pregunta: ' . json_decode($i)->pregunta . ' - ');
                print_r('opcion: ' . json_decode($i)->opcion . ' - ');
                print_r('respuesta: ' . json_decode($i)->respuesta . ' - ');
                //print_r('numero opcion: ' . json_decode($i)->numero_opcion . ' - ');
                print_r('region: ' . json_decode($i)->region . ' - ');
                print_r('total: ' . json_decode($i)->total . ' - ');
                print_r('porcentaje: ' . json_decode($i)->porcentaje . '% - ');
                echo '<br>';
            }
        ?>

        <h3>- % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE</h3>
        <?php
            foreach($estadisticas['porcentaje_si_pregunta10_correctamente'] as $i) {
                print_r($i . ' %');
                echo '<br>';
            }
        ?>
        
        <h3>- % De encuestados que respondieron SI en la pregunta 10 e indicaron incorrectamente ABAE</h3>
        <?php
            foreach($estadisticas['porcentaje_si_pregunta10_incorrectamente'] as $i) {
                print_r($i . ' %');
                echo '<br>';
            }
        ?>
        
        <h3>- % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por género</h3>
        <?php
            $aux = $estadisticas['porcentaje_si_pregunta10_correctamente_genero'];
            $keys = $aux->keys();
            for($i=0; $i<=(count($keys)-1); $i++) {
        ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>

        <h3>- % De encuestados que respondieron SI en la pregunta 10 e indicaron incorrectamente ABAE por género</h3>
        <?php
            $aux = $estadisticas['porcentaje_si_pregunta10_incorrectamente_genero'];
            $keys = $aux->keys();
            for($i=0; $i<=(count($keys)-1); $i++) {
        ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>
        
        <h3>- % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por rango de edad</h3>
        <?php
            $aux = $estadisticas['porcentaje_si_pregunta10_correctamente_rango_edad'];
            $keys = $aux->keys();
            for($i=0; $i<=(count($keys)-1); $i++) {
        ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>
        
        <h3>- % De encuestados que respondieron SI en la pregunta 10 e indicaron incorrectamente ABAE por rango de edad</h3>
        <?php
            $aux = $estadisticas['porcentaje_si_pregunta10_incorrectamente_rango_edad'];
            $keys = $aux->keys();
            for($i=0; $i<=(count($keys)-1); $i++) {
        ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>

        <h3>- % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por nivel de instrucción</h3>
        <?php
            $aux = $estadisticas['porcentaje_si_pregunta10_correctamente_nivel_instruccion'];
            $keys = $aux->keys();
            for($i=0; $i<=(count($keys)-1); $i++) {
        ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>

        <h3>- % De encuestados que respondieron SI en la pregunta 10 e indicaron incorrectamente ABAE por nivel de instrucción</h3>
        <?php
            $aux = $estadisticas['porcentaje_si_pregunta10_incorrectamente_nivel_instruccion'];
            $keys = $aux->keys();
            for($i=0; $i<=(count($keys)-1); $i++) {
        ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>

        <h3>- % De encuestados que respondieron SI en la pregunta 10 e indicaron correctamente ABAE por región</h3>
        <?php
            $aux = $estadisticas['porcentaje_si_pregunta10_correctamente_region'];
            $keys = $aux->keys();
            for($i=0; $i<=(count($keys)-1); $i++) {
        ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>

        <h3>- % De encuestados que respondieron SI en la pregunta 10 e indicaron incorrectamente ABAE por región</h3>
        <?php
            $aux = $estadisticas['porcentaje_si_pregunta10_incorrectamente_region'];
            $keys = $aux->keys();
            for($i=0; $i<=(count($keys)-1); $i++) {
        ?>
                <h4>{{ $keys[$i] }} : {{ $aux->get($keys[$i]) }} %</h4>
        <?php } ?>
    </div>
    
    <script src=""></script>
</body>
</html>
