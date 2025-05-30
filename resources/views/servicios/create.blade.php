@extends('layouts.app')

@section('title', 'Crear Servicio')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-10 rounded-2xl shadow-lg border border-gray-200">
    <h1 class="text-3xl font-extrabold text-center mb-8 text-gray-800">Crear Nuevo Servicio</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('servicios.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-black" required>
        </div>

        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-black" required>{{ old('descripcion') }}</textarea>
        </div>

        <div>
            <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" value="{{ old('precio') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-black" required>
        </div>

        <div>
            <label for="categoria_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
            <select name="categoria_id" id="categoria_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-black">
                <option value="">Selecciona una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center">
            <input type="hidden" name="activo" value="0">
            <input type="checkbox" name="activo" id="activo" value="1" {{ old('activo') ? 'checked' : '' }}
                   class="h-4 w-4 text-black focus:ring-black border-gray-300 rounded">
            <label for="activo" class="ml-2 block text-sm text-gray-700">Activo</label>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-black text-black px-6 py-2 rounded-lg font-semibold hover:bg-gray-800 transition duration-200">
                Crear Servicio
            </button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <a href="{{ route('servicios.index') }}" class="text-black underline hover:text-gray-700">← Volver a la lista</a>
    </div>
</div>
@endsection
