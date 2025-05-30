@extends('layouts.app')

@section('title', 'Detalle de Contratación')

@section('content')
<h1>Contratación ID: {{ $contratacion->id }}</h1>
<p>Servicio: {{ $contratacion->servicio_id }}</p>
<p>Usuario: {{ $contratacion->usuario_id }}</p>
<p>Estado: {{ $contratacion->estado }}</p>
<a href="{{ route('contrataciones.index') }}">Volver a Contrataciones</a>
@endsection
