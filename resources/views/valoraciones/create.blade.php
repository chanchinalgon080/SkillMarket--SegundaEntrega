@extends('layouts.app')

@section('title', 'Crear Valoración')

@section('content')
<h1>Crear Valoración</h1>

<form action="{{ route('valoraciones.store') }}" method="POST">
    @csrf

    <label for="servicio_id">Servicio ID:</label>
    <input type="number" name="servicio_id" id="servicio_id" value="{{ old('servicio_id') }}" required>
    @error('servicio_id')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <label for="puntuacion">Puntuación (1-5):</label>
    <input type="number" name="puntuacion" id="puntuacion" min="1" max="5" value="{{ old('puntuacion') }}" required>
    @error('puntuacion')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <label for="comentario">Comentario:</label>
    <textarea name="comentario" id="comentario">{{ old('comentario') }}</textarea>
    @error('comentario')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">Crear</button>
</form>

<a href="{{ route('valoraciones.index') }}">Volver a Valoraciones</a>
@endsection
