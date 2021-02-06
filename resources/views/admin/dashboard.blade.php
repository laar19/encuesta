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
        
        <input type="submit" name="submit" class="submit btn btn-success" value="Aceptar" />
    </form>
    
    <script src=""></script>
</body>
</html>
