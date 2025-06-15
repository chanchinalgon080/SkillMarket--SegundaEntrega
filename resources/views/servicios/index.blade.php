<x-app-layout>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6 text-gray-900 border-b pb-2 text-center">Servicios</h1>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded border border-green-300 text-center font-semibold">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- FORMULARIO DE BÚSQUEDA --}}
                <form action="{{ route('servicios.index') }}" method="GET" class="mb-6 p-4 bg-gray-50 rounded-lg shadow-sm grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
                    <div>
                        <label for="global_search" class="block text-sm font-medium text-gray-700">Búsqueda Global (título, descripción, categoría, usuario):</label>
                        <input type="text" name="global_search" id="global_search" placeholder="Buscar en todo..." value="{{ request('global_search') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Búsqueda por título o descripción (específico):</label>
                        <input type="text" name="search" id="search" placeholder="Título o descripción..." value="{{ request('search') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="md:col-span-2 flex justify-end gap-2">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 transition ease-in-out duration-150">
                            Aplicar Búsqueda
                        </button>
                        @if(request('search') || request('global_search'))
                            <a href="{{ route('servicios.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-400 focus:ring ring-gray-300 transition ease-in-out duration-150">
                                Limpiar Búsqueda
                            </a>
                        @endif
                    </div>
                </form>
                {{-- FIN DEL FORMULARIO DE BÚSQUEDA --}}

                <div class="flex justify-end mb-6">
                    <a href="{{ route('servicios.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        + Crear Nuevo Servicio
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse ($servicios as $servicio)
                    <div class="bg-gray-50 rounded-lg shadow-md border border-gray-200 p-6 flex flex-col justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $servicio->titulo }}</h2>
                            <p class="text-gray-700 text-sm mb-3">{{ Str::limit($servicio->descripcion, 100) }}</p>

                            <p class="text-gray-800 font-semibold text-sm">
                                Precio: <span class="font-normal">${{ number_format($servicio->precio, 2) }}</span>
                            </p>
                            <p class="text-gray-800 font-semibold text-sm">
                                Categorías:
                                <span class="font-normal">
                                    @forelse ($servicio->categorias as $categoria)
                                        {{ $categoria->name }}{{ !$loop->last ? ', ' : '' }}
                                    @empty
                                        Sin categoría
                                    @endforelse
                                </span>
                            </p>
                            <p class="text-gray-800 font-semibold text-sm">
                                Activo:
                                @if ($servicio->activo)
                                    <span class="text-green-600 font-semibold">Sí</span>
                                @else
                                    <span class="text-red-600 font-semibold">No</span>
                                @endif
                            </p>
                        </div>

                        <div class="mt-4 flex justify-between items-center space-x-2">
                            <a href="{{ route('servicios.show', $servicio->id) }}"
                               class="text-indigo-600 hover:text-indigo-900 font-semibold text-sm px-2 py-1 rounded">
                                Ver
                            </a>
                            <a href="{{ route('servicios.edit', $servicio->id) }}"
                               class="text-yellow-600 hover:text-yellow-900 font-semibold text-sm px-2 py-1 rounded">
                                Editar
                            </a>

                            <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST"
                                  x-data="{ showDeleteModal: false }"
                                  @submit.prevent="showDeleteModal = true"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-semibold text-sm px-2 py-1 rounded">
                                    Eliminar
                                </button>

                                <div x-show="showDeleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4">
                                    <div @click.away="showDeleteModal = false" class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full">
                                        <h3 class="text-lg font-bold text-gray-900 mb-4">Confirmar Eliminación</h3>
                                        <p class="text-gray-700 mb-6">¿Estás seguro que deseas eliminar este servicio permanentemente?</p>
                                        <div class="flex justify-end space-x-4">
                                            <button type="button" @click="showDeleteModal = false" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                                                Cancelar
                                            </button>
                                            <button type="button" @click="$el.closest('form').submit()" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                                Eliminar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @empty
                    <p class="col-span-full text-center text-gray-500 text-lg mt-4">No hay servicios disponibles.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
