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
            <center><h2>Administrar usuarios</h2></center>

            <div class="form-group">
                <form action="">
                    <table>
                        <tr>
                            <th>
                                <input type="text" name="q" placeholder="Buscar..." class="form-control">
                            </th>
                            <th>
                                <input type="submit" class="btn btn-primary" value="Buscar">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                {{ $users->links() }}
                            </th>
                        </tr>
                    </table>
                </form>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">         
                    <h3 class="panel-title">Lista de usuarios</h3>
                    <div id="loader" class="text-center"></div>
                </div>
                
                <br>
                
                <div class="outer_div">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                            </tr>
                        </thead>

                        <tbody class="buscar">
                            @foreach($users as $i)

                                <tr>
                                    <td>
                                        {{ $i->name }}
                                    </td>

                                    <td>
                                        {{ $i->email }}
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('user.edit', $i->id) }}" class="btn btn-info btn-xs">
                                            Editar
                                        </a>

                                        <form style="display:inline" method="post" action="{{ route('user.destroy', $i->id) }}">
                                            {!! method_field('DELETE') !!}
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div>
                {{ $users->links() }}
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

@endsection
