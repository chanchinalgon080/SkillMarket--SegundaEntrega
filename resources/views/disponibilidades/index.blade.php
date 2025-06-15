<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Disponibilidades') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6 text-gray-900 border-b pb-2">Disponibilidades</h1>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded border border-green-300">
                        {{ session('success') }}
                    </div>
                @endif

                @if($disponibilidades->count())
                    <ul class="space-y-4">
                        @foreach($disponibilidades as $disp)
                            <li class="p-4 bg-gray-50 rounded border border-gray-200 shadow-sm flex justify-between items-center">
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ $disp->dia }}: {{ \Carbon\Carbon::parse($disp->hora_inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($disp->hora_fin)->format('H:i') }}
                                </p>
                                <div class="flex space-x-4">
                                    <a href="{{ route('disponibilidades.show', $disp->id) }}" class="text-blue-600 hover:text-blue-900 font-semibold">Ver</a>
                                    <a href="{{ route('disponibilidades.edit', $disp->id) }}" class="text-yellow-600 hover:text-yellow-900 font-semibold">Editar</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500 italic">No hay disponibilidades registradas.</p>
                @endif

                <div class="mt-6 text-right">
                    <a href="{{ route('disponibilidades.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Agregar nueva disponibilidad
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
