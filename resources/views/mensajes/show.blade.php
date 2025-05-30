@extends('layouts.app')

@section('title', 'Detalle de Mensaje')

@section('content')
<h1>Mensaje</h1>
<p><strong>Emisor:</strong> {{ $mensaje->emisor->name ?? 'N/A' }}</p>
<p><strong>Receptor:</strong> {{ $mensaje->receptor->name ?? 'N/A' }}</p>
<p><strong>Contenido:</strong> {{ $mensaje->contenido }}</p>
<p><strong>Estado:</strong> {{ $mensaje->leido ? 'Leído' : 'No leído' }}</p>
<a href="{{ route('mensajes.index') }}">Volver a Mensajes</a>
@endsection
