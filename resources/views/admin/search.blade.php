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
                                {{ $encuesta->links() }}
                            </th>
                        </tr>
                    </table>
                </form>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de encuestas</h3>
                    <div id="loader" class="text-center"></div>
                </div>
                
                <br>
                
                <div class="outer_div">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Fecha de apertura</th>
                                <th>Fecha de cierre</th>
                            </tr>
                        </thead>

                        <tbody class="buscar">
                            @foreach($encuesta as $i)

                                <tr>
                                    <td>
                                        {{ $i->fecha_apertura }}
                                    </td>

                                    <td>
                                        {{ $i->fecha_cierre }}
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('show_stats', $i->id) }}" class="btn btn-info btn-xs">
                                            Estadísticas
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div>
                {{ $encuesta->links() }}
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
