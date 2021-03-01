<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Encuesta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="colorlib.com">

  <!-- MATERIAL DESIGN ICONIC FONT -->
    <link href="{{ asset('/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/bootstrap-4.4.1-dist/css/bootstrap.min.css') }}" rel="stylesheet">
  

  <!-- STYLE CSS -->
  <link href="{{ asset('/assets/index/style.css') }}" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <form id="register_form" method="post" action="{{ route('verificacion') }}">

        {!! csrf_field() !!}
        
      <!-- SECTION 1 -->
      <h2></h2>
      <section>
        <div class="inner" id="fondo">
          <div class="image-holder">
            <img src="{{ asset('/assets/img/abae-logo.jpg') }}">
          </div>
          <div class="form-content" >
            <div class="form-header">
              <h3>Inicio</h3>
            </div>
            <p>Ingresar</p>

            <div class="form-row">
              <div class="form-holder" id="cedula">
                <input type="text" placeholder="Número de cédula" class="form-control" name="cedula">
              </div>

            </div>
                    
            <div class="checkbox-circle">
              <div class="col-12">
                <button class="btn btn-primary" id="boton" type="submit">Enviar</button>
              </div>

            </div>
          </div>
        </div>
      </section>                

    </form>
  </div>

  <!-- JQUERY -->
  <script src="{{ asset('/assets/js/jquery/jquery-3.3.1.min.js') }}"></script>

  <!-- JQUERY STEP -->
  <script src="{{ asset('/assets/js/jquery/jquery.steps.js') }}"></script>

  <!-- JQUERY BOOTSTRAP -->
  <script src="{{ asset('/assets/bootstrap-4.4.1-dist/js/bootstrap.min.js') }}"></script>

  <!-- Template created and distributed by Colorlib -->
</body>
</html>



