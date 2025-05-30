@extends('layouts.app')

@section('title', 'Lista de Servicios')

@section('content')
<div class="max-w-5xl mx-auto mt-16 px-4">
    <h1 class="text-5xl font-extrabold text-center text-2xl text-gray-900 mb-10">Servicios</h1>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-md text-center font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-end mb-8">
        <a href="{{ route('servicios.create') }}" 
           class="bg-black text-black px-6 py-3 rounded-lg font-semibold hover:bg-gray-800 transition duration-200">
             + Crear Nuevo Servicio
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse ($servicios as $servicio)
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-6 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3">{{ $servicio->titulo }}</h2>
                <p class="text-gray-700 mb-4">{{ Str::limit($servicio->descripcion, 120) }}</p>

                <p class="text-gray-800 font-semibold">
                    Precio: <span class="font-normal">${{ number_format($servicio->precio, 2) }}</span>
                </p>
                <p class="text-gray-800 font-semibold">
                    Categoría: <span class="font-normal">{{ $servicio->categoria->name ?? 'Sin categoría' }}</span>
                </p>
                <p class="text-gray-800 font-semibold">
                    Activo: 
                    @if ($servicio->activo)
                        <span class="text-green-600 font-semibold">Sí</span>
                    @else
                        <span class="text-red-600 font-semibold">No</span>
                    @endif
                </p>
            </div>

            <div class="mt-6 flex justify-center space-x-6">
                <a href="{{ route('servicios.show', $servicio->id) }}" 
                   class="text-indigo-600 font-semibold hover:underline px-3 py-1 rounded">
                   Ver
                </a>
                <a href="{{ route('servicios.edit', $servicio->id) }}" 
                   class="text-yellow-600 font-semibold hover:underline px-3 py-1 rounded">
                   Editar
                </a>

                <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" 
                      onsubmit="return confirm('¿Seguro que deseas eliminar este servicio?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 font-semibold hover:underline px-3 py-1 rounded">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
        @empty
        <p class="col-span-full text-center text-gray-500 text-lg mt-10">No hay servicios disponibles.</p>
        @endforelse
    </div>
</div>
@endsection
