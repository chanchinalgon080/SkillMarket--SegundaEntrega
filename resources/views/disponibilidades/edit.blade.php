@extends('layouts.app')

@section('title', 'Editar Disponibilidad')

@section('content')
<h1>Editar Disponibilidad</h1>

<form action="{{ route('disponibilidades.update', $disponibilidad->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="dia">Día:</label>
    <input type="text" name="dia" id="dia" value="{{ old('dia', $disponibilidad->dia) }}" required>
    @error('dia')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <label for="hora_inicio">Hora Inicio:</label>
    <input type="time" name="hora_inicio" id="hora_inicio" value="{{ old('hora_inicio', $disponibilidad->hora_inicio) }}" required>
    @error('hora_inicio')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <label for="hora_fin">Hora Fin:</label>
    <input type="time" name="hora_fin" id="hora_fin" value="{{ old('hora_fin', $disponibilidad->hora_fin) }}" required>
    @error('hora_fin')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">Guardar cambios</button>
</form>

<a href="{{ route('disponibilidades.index') }}">Volver a Disponibilidades</a>
@endsection
