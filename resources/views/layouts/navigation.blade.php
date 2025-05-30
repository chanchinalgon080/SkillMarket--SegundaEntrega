<nav x-data="{ open: false }" class="bg-white text-black shadow-md border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="text-xl font-bold hover:text-indigo-600 transition">
                SkillMarket
            </a>

            <!-- Navigation Links -->
            <div class="hidden sm:flex items-center space-x-8">
                <a href="{{ route('dashboard') }}" class="hover:text-indigo-600 {{ request()->routeIs('dashboard') ? 'underline font-semibold' : '' }}">
                    Inicio
                </a>
                <a href="{{ route('categorias.index') }}" class="hover:text-indigo-600 {{ request()->routeIs('categorias.*') ? 'underline font-semibold' : '' }}">
                    Categorías
                </a>
                <a href="{{ route('servicios.index') }}" class="hover:text-indigo-600 {{ request()->routeIs('servicios.*') ? 'underline font-semibold' : '' }}">
                    Servicios
                </a>
                <a href="{{ route('mensajes.index') }}" class="hover:text-indigo-600 {{ request()->routeIs('mensajes.*') ? 'underline font-semibold' : '' }}">
                    Mensajes
                </a>
                <a href="{{ route('disponibilidades.index') }}" class="hover:text-indigo-600 {{ request()->routeIs('disponibilidades.*') ? 'underline font-semibold' : '' }}">
                    Disponibilidades
                </a>
                <a href="{{ route('valoraciones.index') }}" class="hover:text-indigo-600 {{ request()->routeIs('valoraciones.*') ? 'underline font-semibold' : '' }}">
                    Valoraciones
                </a>
                <a href="{{ route('contrataciones.index') }}" class="hover:text-indigo-600 {{ request()->routeIs('contrataciones.*') ? 'underline font-semibold' : '' }}">
                    Contrataciones
                </a>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (mobile menu button) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.*')">
                {{ __('Categorías') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('servicios.index')" :active="request()->routeIs('servicios.*')">
                {{ __('Servicios') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('mensajes.index')" :active="request()->routeIs('mensajes.*')">
                {{ __('Mensajes') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('disponibilidades.index')" :active="request()->routeIs('disponibilidades.*')">
                {{ __('Disponibilidades') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('valoraciones.index')" :active="request()->routeIs('valoraciones.*')">
                {{ __('Valoraciones') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('contrataciones.index')" :active="request()->routeIs('contrataciones.*')">
                {{ __('Contrataciones') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
