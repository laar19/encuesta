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
  <link href="{{ asset('/assets/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/bootstrap-4.4.1-dist/css/bootstrap-datepicker.css.css') }}" rel="stylesheet">

  <script type="text/javascript">
    $('fecha').on('changeDate', function(ev){
      $(this).datepicker('hide');
    });
  </script>
  
  <!-- STYLE CSS -->
    <link href="{{ asset('/assets/index/style.css') }}" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <form id="register_form" method="post" action="{{ route('registro') }}">

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
              <h3>Registro</h3>
            </div>
            <p>Ingresa tus datos</p>
            <div class="form-row" id="nombre">
              <div class="form-holder">
                <input type="text" placeholder="Primer nombre" class="form-control" name="primer_nombre">
                <input type="text" placeholder="Segundo nombre" class="form-control" name="segundo_nombre">
              </div>
              <div class="form-holder">
                <input type="text" placeholder="Primer apellido" class="form-control" name="primer_apellido">
                <input type="text" placeholder="Segundo apellido" class="form-control" name="segundo_apellido">
              </div>
            </div>
            <div class="form-row">
              <div class="form-holder">
                <input type="text" placeholder="Número de cédula" class="form-control" name="cedula">
              </div>

            </div>
            <div class="form-row">
              <!--div class="form-holder">
                <input type="text" placeholder="Fecha de nacimiento" class="form-control" name="fecha_nacimiento">
              </div-->
              <div class="form-holder" style="align-self: flex-end; transform: translateY(4px);">
                <div class="checkbox-tick">
                  <label class="male">
                    <input type="radio" name="genero" value="M" checked> Masculino<br>
                    <span class="checkmark"></span>
                  </label>
                  <label class="female">
                    <input type="radio" name="genero" value="F"> Femenino<br>
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
            </div>

            <div class="col-2">
              <div class="input-group">                 
                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar">
                <div class="input-group-icon">
                  <input class="form-control" autocomplete="off" id="fecha" name="fecha_nacimiento" data-provide="datepicker" data-date-format="dd-mm-yyyy" required="required" placeholder="Fecha de nacimiento"/>
                  
                </div>
                </i>
              </div>
            </div>
            <div class="checkbox-circle">
              <div class="col-12">
                <button class="btn btn-primary" id="boton" type="submit">Continuar</button>
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
  <script src="{{ asset('/assets/js/bootstrap-datepicker.min.js') }}"></script>
  <!-- Template created and distributed by Colorlib -->
</body>
</html>



