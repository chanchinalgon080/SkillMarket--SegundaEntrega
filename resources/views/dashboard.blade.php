{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Bienvenido al Panel de SkillMarket
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                <!-- Tarjeta Categorías -->
                <a href="{{ route('categorias.index') }}" class="p-6 bg-white rounded-lg shadow hover:bg-indigo-100 transition duration-200">
                    <div class="text-center">
                        <div class="text-3xl mb-2">📂</div>
                        <div class="font-bold text-lg">Categorías</div>
                        <p class="text-sm text-gray-600">Gestiona las categorías disponibles.</p>
                    </div>
                </a>

                <!-- Tarjeta Servicios -->
                <a href="{{ route('servicios.index') }}" class="p-6 bg-white rounded-lg shadow hover:bg-indigo-100 transition duration-200">
                    <div class="text-center">
                        <div class="text-3xl mb-2">🛠️</div>
                        <div class="font-bold text-lg">Servicios</div>
                        <p class="text-sm text-gray-600">Consulta o administra los servicios.</p>
                    </div>
                </a>

                <!-- Tarjeta Contrataciones -->
                <a href="{{ route('contrataciones.index') }}" class="p-6 bg-white rounded-lg shadow hover:bg-indigo-100 transition duration-200">
                    <div class="text-center">
                        <div class="text-3xl mb-2">📄</div>
                        <div class="font-bold text-lg">Contrataciones</div>
                        <p class="text-sm text-gray-600">Gestiona las contrataciones realizadas.</p>
                    </div>
                </a>

                <!-- Tarjeta Disponibilidades -->
                <a href="{{ route('disponibilidades.index') }}" class="p-6 bg-white rounded-lg shadow hover:bg-indigo-100 transition duration-200">
                    <div class="text-center">
                        <div class="text-3xl mb-2">📅</div>
                        <div class="font-bold text-lg">Disponibilidades</div>
                        <p class="text-sm text-gray-600">Administra los horarios disponibles.</p>
                    </div>
                </a>

                <!-- Tarjeta Valoraciones -->
                <a href="{{ route('valoraciones.index') }}" class="p-6 bg-white rounded-lg shadow hover:bg-indigo-100 transition duration-200">
                    <div class="text-center">
                        <div class="text-3xl mb-2">⭐</div>
                        <div class="font-bold text-lg">Valoraciones</div>
                        <p class="text-sm text-gray-600">Revisa las opiniones de los usuarios.</p>
                    </div>
                </a>

                <!-- Tarjeta Mensajes -->
                <a href="{{ route('mensajes.index') }}" class="p-6 bg-white rounded-lg shadow hover:bg-indigo-100 transition duration-200">
                    <div class="text-center">
                        <div class="text-3xl mb-2">💬</div>
                        <div class="font-bold text-lg">Mensajes</div>
                        <p class="text-sm text-gray-600">Lee o responde a los mensajes.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
