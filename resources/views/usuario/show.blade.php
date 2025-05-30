@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de usuario</h1>

    <p><strong>ID:</strong> {{ $usuario->id }}</p>
    <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
    <p><strong>Email:</strong> {{ $usuario->email }}</p>

    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
