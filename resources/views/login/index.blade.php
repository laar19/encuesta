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
            <form method="post" action="{{ route('checklogin') }}">

                {!! csrf_field() !!}
                
                <!-- SECTION 1 -->
                <section>
                    <div class="inner" id="fondo">
                        <div class="image-holder">
                            <img src="{{ asset('/assets/img/abae-logo.jpg') }}">
                        </div>
                        
                        <div class="form-content" >
                            <div class="form-header">
                                <h3>Iniciar Sesión</h3>
                            </div>
                    
                            <p>Ingresar al sistema</p>

                            <div class="form-row">

                                @if(isset(Auth::user()->email))
                                    {{ route('checklogin') }}
                                @endif

                                @if($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <div class="form-holder" id="email">
                                    <input name="email" type="email" id="email" class="form-control input-sm chat-input" placeholder="Correo electrónico" required />

                                    <input name="password" type="password" id="password" class="form-control input-sm chat-input" placeholder="Contraseña" required />
                                </div>

                                <span class="group-btn">
                                    <input name="login" type="submit" value="Ingresar" class="btn btn-primary">
                                </span>
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
