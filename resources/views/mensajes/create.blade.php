@extends('layouts.app')

@section('title', 'Enviar Mensaje')

@section('content')
<h1>Enviar Mensaje</h1>

<form action="{{ route('mensajes.store') }}" method="POST">
    @csrf

    <label for="receptor_id">Receptor ID:</label>
    <input type="number" name="receptor_id" id="receptor_id" value="{{ old('receptor_id') }}" required>
    @error('receptor_id')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <label for="contenido">Contenido:</label>
    <textarea name="contenido" id="contenido" required>{{ old('contenido') }}</textarea>
    @error('contenido')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">Enviar</button>
</form>

<a href="{{ route('mensajes.index') }}">Volver a Mensajes</a>
@endsection
