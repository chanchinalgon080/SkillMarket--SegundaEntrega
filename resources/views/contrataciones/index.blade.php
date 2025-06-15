<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contrataciones') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6 text-gray-900 border-b pb-2">Contrataciones</h1>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded border border-green-300">
                        {{ session('success') }}
                    </div>
                @endif

                @if($contrataciones->count())
                    <ul class="space-y-4">
                        @foreach($contrataciones as $contratacion)
                            <li class="p-4 bg-gray-50 rounded border border-gray-200 shadow-sm flex justify-between items-center">
                                <div>
                                    <p class="text-lg font-semibold text-gray-900">Servicio: {{ $contratacion->servicio_id }}</p>
                                    <p class="text-gray-700">Usuario: {{ $contratacion->usuario_id }}</p>
                                    <p class="text-gray-700">Estado: <span class="font-bold">{{ $contratacion->estado }}</span></p>
                                </div>
                                <div class="flex space-x-4">
                                    <a href="{{ route('contrataciones.show', $contratacion->id) }}" class="text-blue-600 hover:text-blue-900 font-semibold">Ver</a>
                                    <a href="{{ route('contrataciones.edit', $contratacion->id) }}" class="text-yellow-600 hover:text-yellow-900 font-semibold">Editar</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500 italic">No hay contrataciones registradas.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>