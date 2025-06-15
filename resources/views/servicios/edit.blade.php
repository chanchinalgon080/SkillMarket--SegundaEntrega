<x-app-layout>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="max-w-2xl mx-auto p-8 rounded">
                    <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Editar Servicio</h1>

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('servicios.update', $servicio->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="titulo" class="block text-sm font-medium text-gray-700">Título:</label>
                            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $servicio->titulo) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" rows="4"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('descripcion', $servicio->descripcion) }}</textarea>
                        </div>

                        <div>
                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio:</label>
                            <input type="number" step="0.01" name="precio" id="precio" value="{{ old('precio', $servicio->precio) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Categorías:</label>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($categorias as $categoria)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="categorias_ids[]" id="categoria_{{ $categoria->id }}" value="{{ $categoria->id }}"
                                               {{ in_array($categoria->id, old('categorias_ids', $servicio->categorias->pluck('id')->toArray())) ? 'checked' : '' }}
                                               class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="categoria_{{ $categoria->id }}" class="ml-2 text-sm text-gray-700">{{ $categoria->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('categorias_ids')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center">
                            <input type="hidden" name="activo" value="0">
                            <input type="checkbox" name="activo" id="activo" value="1" {{ old('activo', $servicio->activo) ? 'checked' : '' }}
                                   class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="activo" class="ml-2 block text-sm text-gray-700">Activo</label>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 font-semibold">Actualizar Servicio</button>
                        </div>
                    </form>

                    <div class="mt-6 text-center">
                        <a href="{{ route('servicios.index') }}" class="text-indigo-600 hover:underline">← Volver a la lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
