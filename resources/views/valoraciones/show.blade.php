@extends('layouts.app')

@section('title', 'Detalle de Valoración')

@section('content')
<h1>Valoración ID: {{ $valoracion->id }}</h1>
<p><strong>Servicio:</strong> {{ $valoracion->servicio_id }}</p>
<p><strong>Puntuación:</strong> {{ $valoracion->puntuacion }}</p>
<p><strong>Comentario:</strong> {{ $valoracion->comentario }}</p>
<a href="{{ route('valoraciones.index') }}">Volver a Valoraciones</a>
@endsection
