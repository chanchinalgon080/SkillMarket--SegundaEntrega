<x-app-layout>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="max-w-3xl mx-auto p-8 rounded-lg shadow-md border border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $servicio->titulo }}</h1>

                    <p class="text-gray-700 text-lg leading-relaxed mb-6">{{ $servicio->descripcion }}</p>

                    <div class="mb-4">
                        <span class="font-semibold text-gray-800">Precio:</span>
                        <span class="text-gray-600">${{ number_format($servicio->precio, 2) }}</span>
                    </div>

                    <div class="mb-4">
                        <span class="font-semibold text-gray-800">Categorías:</span>
                        <span class="text-gray-600">
                            @forelse ($servicio->categorias as $categoria)
                                {{ $categoria->name }}{{ !$loop->last ? ', ' : '' }}
                            @empty
                                Sin categoría
                            @endforelse
                        </span>
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
                           class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded transition">
                            ← Volver a Servicios
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
