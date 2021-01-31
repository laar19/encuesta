<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
</head>

<body>
    <form id="register_form" method="post" action="{{ route('verificacion') }}">

        {!! csrf_field() !!}
        
        <input type="text" name="cedula" placeholder="cédula">
    </form>
    
    <script src=""></script>
</body>
</html>
