@extends('template.layout')

@section('topmenu')
    @include('template.topmenu')
@endsection

@section('sidebar')
    @include('template.sidebar')
@endsection

@section('content')

<link href="{{ asset('/assets/bootstrap-4.4.1-dist/css/bootstrap.min.css') }}" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col">
            <form method="post" action="{{ route('user.store') }}">
                
                {!! csrf_field() !!}
                
                <table>
                    <div class="form-group">
                        <tr>
                            <td>
                                <label>Nombre</label>
                            </td>
                            <td>
                                <input type="text" name="name" required/>
                            </td>
                        </tr>
                    </div>
                    
                    <div class="form-group">
                        <tr>
                            <td>
                                <label>Correo</label>
                            </td>
                            <td>
                                <input type="email" name="email" required/>
                            </td>
                        </tr>
                    </div>

                    <div class="form-group">
                        <tr>
                            <td>
                                <label>Contraseña</label>
                            </td>
                            <td>
                                <input type="password" id="password" name="password" required/>
                            </td>
                        </tr>
                    </div>

                    <div class="form-group">
                        <tr>
                            <td>
                                <label>Confirme la contraseña</label>
                            </td>
                            <td>
                                <input type="password" id="repetir_password" required/>

                                <span id="resultado_password" class="help-block"></span>
                            </td>
                        </tr>
                    </div>
                </table>

                <br>
                
                <input class="btn btn-info btn-md" id="crear_usuario" type="submit" value="Aceptar"/>
            </form>

            <br>

            @if(session()->has('message'))
                <div class="alert {{session('alert') ?? 'alert-info'}}">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
</div>

<script src="{{ asset('/assets/js/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/assets/bootstrap-4.4.1-dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('/assets/users/js/jquery/verify_password.js') }}"></script>

@endsection
