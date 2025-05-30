@extends('layouts.app')

@section('title', 'Detalle del Servicio')

@section('content')
<div class="max-w-3xl mx-auto mt-16 p-8 bg-white rounded-lg shadow-md border border-gray-200">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-6">{{ $servicio->titulo }}</h1>
    
    <p class="text-gray-700 text-lg leading-relaxed mb-6">{{ $servicio->descripcion }}</p>

    <div class="mb-4">
        <span class="font-semibold text-gray-800">Precio:</span>
        <span class="text-gray-600">${{ number_format($servicio->precio, 2) }}</span>
    </div>

    <div class="mb-4">
        <span class="font-semibold text-gray-800">Categoría:</span>
        <span class="text-gray-600">{{ $servicio->categoria->name }}</span>
    </div>

    <div class="mb-8">
        <span class="font-semibold text-gray-800">Activo:</span>
        @if($servicio->activo)
            <span class="text-green-600 font-semibold">Sí</span>
        @else
            <span class="text-red-600 font-semibold">No</span>
        @endif
    </div>

    <div class="text-center">
        <a href="{{ route('servicios.index') }}" 
           class="inline-block bg-indigo-600 hover:bg-indigo-700 text-black font-semibold px-6 py-3 rounded transition">
            ← Volver a Servicios
        </a>
    </div>
</div>
@endsection
