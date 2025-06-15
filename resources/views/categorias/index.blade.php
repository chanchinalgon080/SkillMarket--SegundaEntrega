<x-app-layout>

    <div class="py-8"> {{-- O py-12, dependiendo de tu espaciado preferido --}}
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow-md"> 
                <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-2">Categorías</h1>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded border border-green-300">
                        {{ session('success') }}
                    </div>
                @endif

                @if($categorias->count())
                    <ul class="space-y-4">
                        @foreach($categorias as $categoria)
                            <li class="p-4 bg-gray-50 rounded border border-gray-200 hover:shadow-md transition-shadow">
                                <h2 class="text-xl font-semibold text-gray-900">{{ $categoria->name }}</h2>
                                <p class="text-gray-600 mt-1">{{ $categoria->descripcion }}</p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500 italic">No hay categorías registradas.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
