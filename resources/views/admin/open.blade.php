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
            <form id="" method="post" action="{{ route('store_quest') }}">

                {!! csrf_field() !!}
                
                <label for="fecha_apertura">Fecha de apertura</label>
                <input type="date" name="fecha_apertura" required >
                
                <br>
                
                <label for="fecha_cierre">Fecha de cierre</label>        
                <input type="date" name="fecha_cierre" required >
                
                <br>
                
                <input type="submit" name="submit" class="submit btn btn-success" value="Aperturar encuesta" />
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

@endsection
