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
        <h3>- Número de encuestados: {{ $estadisticas['numero_encuestados'] }}</h3>
        <h4>Masculinos: {{ $estadisticas['numero_encuestados_masculinos'] }}</h4>
        <h4>Femeninos: {{ $estadisticas['numero_encuestados_femeninos'] }}</h4>

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
    </div>
    
    <script src=""></script>
</body>
</html>
