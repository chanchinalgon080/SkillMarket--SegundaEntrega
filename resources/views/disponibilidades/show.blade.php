@extends('layouts.app')

@section('title', 'Detalle de Disponibilidad')

@section('content')
<h1>Disponibilidad</h1>
<p>Día: {{ $disponibilidad->dia }}</p>
<p>Hora Inicio: {{ $disponibilidad->hora_inicio }}</p>
<p>Hora Fin: {{ $disponibilidad->hora_fin }}</p>
<a href="{{ route('disponibilidades.index') }}">Volver a Disponibilidades</a>
@endsection
