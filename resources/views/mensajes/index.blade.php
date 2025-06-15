<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mensajes') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6 text-gray-900 border-b pb-2">Mensajes</h1>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded border border-green-300">
                        {{ session('success') }}
                    </div>
                @endif

                @if($mensajes->count())
                    <ul class="space-y-4">
                        @foreach($mensajes as $mensaje)
                            <li class="p-4 bg-gray-50 shadow-md rounded-lg border border-gray-200">
                                <p class="text-sm text-gray-600">
                                    <strong>De:</strong> {{ $mensaje->emisor->name ?? 'N/A' }}
                                    <strong class="ml-4">Para:</strong> {{ $mensaje->receptor->name ?? 'N/A' }}
                                </p>
                                <p class="mt-2 text-gray-800">{{ $mensaje->contenido }}</p>
                                <p class="mt-2 text-sm text-gray-500 italic">
                                    {{ $mensaje->leido ? 'Leído' : 'No leído' }}
                                </p>
                                <a href="{{ route('mensajes.show', $mensaje->id) }}" class="inline-block mt-3 text-blue-600 hover:underline font-semibold text-sm">
                                    Ver mensaje
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600 italic">No hay mensajes.</p>
                @endif

                <div class="mt-6 text-right">
                    <a href="{{ route('mensajes.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Enviar mensaje
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
