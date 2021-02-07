<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
</head>

<body>
    <form id="" method="post" action="{{ route('dashboard.store') }}">

        {!! csrf_field() !!}
        
        <label for="fecha_apertura">Fecha de apertura</label>
        <input type="date" name="fecha_apertura">
        
        <br>
        
        <label for="fecha_cierre">Fecha de cierre</label>        
        <input type="date" name="fecha_cierre">
        
        <br>
        
        <input type="submit" name="submit" class="submit btn btn-success" value="Aperturar encuesta" />
    </form>

    <form id="" method="post" action="{{ route('close') }}">
        {!! csrf_field() !!}
        <input type="submit" name="submit" class="submit btn btn-success" value="Cerrar encuesta" />
    </form>

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
