@extends('layouts.app')

@section('title', 'Editar Contratación')

@section('content')
<h1>Editar Contratación ID: {{ $contratacion->id }}</h1>

<form action="{{ route('contrataciones.update', $contratacion->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="estado">Estado:</label>
    <input type="text" name="estado" id="estado" value="{{ old('estado', $contratacion->estado) }}" required>
    @error('estado')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">Guardar cambios</button>
</form>

<a href="{{ route('contrataciones.index') }}">Volver a Contrataciones</a>
@endsection
