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
            <div class="form-login">
                <form method="post" action="{{ route('user.update', $user->id) }}">
                    
                    {!! method_field('PUT') !!}

                    {!! csrf_field() !!}
                    
                    <table>
                        <div class="form-group">
                            <tr>
                                <td>
                                    <label>Nombre</label>
                                </td>
                                <td>
                                    <input type="text" name="name" value="{{ $user->name }}" required>
                                    {!! $errors->first('name', '<span class="error">:message</span>') !!}
                                </td>
                            </tr>
                        </div>
                        
                        <div class="form-group">
                            <tr>
                                <td>
                                    <label>Correo</label>
                                </td>
                                <td>
                                    <input type="email" name="email" value="{{ $user->email }}" required>
                                    {!! $errors->first('email', '<span class="error">:message</span>') !!}
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
                    </table><br>
                    <input class="btn btn-info btn-md" id="crear_usuario" type="submit" value="Aceptar"/>
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                </form>
            </div>
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
