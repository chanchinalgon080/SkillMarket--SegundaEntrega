@extends('layouts.app')

@section('title', 'Contrataciones')

@section('content')
<h1>Contrataciones</h1>

@if(session('success'))
    <div style="color:green;">{{ session('success') }}</div>
@endif

@if($contrataciones->count())
    <ul>
        @foreach($contrataciones as $contratacion)
            <li>
                Servicio: {{ $contratacion->servicio_id }}, Usuario: {{ $contratacion->usuario_id }}, Estado: {{ $contratacion->estado }}
                <a href="{{ route('contrataciones.show', $contratacion->id) }}">Ver</a> |
                <a href="{{ route('contrataciones.edit', $contratacion->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
@else
    <p>No hay contrataciones registradas.</p>
@endif
@endsection
