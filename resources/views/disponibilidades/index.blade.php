@extends('layouts.app')

@section('title', 'Disponibilidades')

@section('content')
<h1>Disponibilidades</h1>

@if(session('success'))
    <div style="color:green;">{{ session('success') }}</div>
@endif

@if($disponibilidades->count())
    <ul>
        @foreach($disponibilidades as $disp)
            <li>
                {{ $disp->dia }}: {{ $disp->hora_inicio }} - {{ $disp->hora_fin }}
                <a href="{{ route('disponibilidades.show', $disp->id) }}">Ver</a> |
                <a href="{{ route('disponibilidades.edit', $disp->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
@else
    <p>No hay disponibilidades registradas.</p>
@endif
<a href="{{ route('disponibilidades.create') }}">Agregar nueva disponibilidad</a>
@endsection
