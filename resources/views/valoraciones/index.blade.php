@extends('layouts.app')

@section('title', 'Valoraciones')

@section('content')
<h1>Valoraciones</h1>

@if(session('success'))
    <div style="color:green;">{{ session('success') }}</div>
@endif

@if($valoraciones->count())
    <ul>
        @foreach($valoraciones as $valoracion)
            <li>
                Servicio: {{ $valoracion->servicio_id }}, Puntuación: {{ $valoracion->puntuacion }}
                <a href="{{ route('valoraciones.show', $valoracion->id) }}">Ver</a> |
                <a href="{{ route('valoraciones.edit', $valoracion->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
@else
    <p>No hay valoraciones registradas.</p>
@endif
<a href="{{ route('valoraciones.create') }}">Crear valoración</a>
@endsection
