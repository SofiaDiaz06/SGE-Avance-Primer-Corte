<nav x-data="{ open: false }" class="bg-blue-950 border-b border-blue-900 text-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" style="color: #c83232;" class="flex items-center gap-2 font-bold text-lg">
                        <i class="fas fa-boxes text-xl"></i>
                        <span class="text-white hidden md:inline">Paraíso Distribuciones</span>
                    </a>
                </div>

                <!-- Navigation Links (Escritorio) -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-200 hover:text-white">
                        <i class="fas fa-chart-pie mr-2"></i> {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('productos.index')" :active="request()->routeIs('productos.*')" class="text-gray-200 hover:text-white">
                        <i style="color: #c83232;" class="fas fa-box-open mr-2"></i> {{ __('Productos') }}
                    </x-nav-link>

                    <x-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.*')" class="text-gray-200 hover:text-white">
                        <i style="color: #c83232;" class="fas fa-tags mr-2"></i> {{ __('Categorías') }}
                    </x-nav-link>

                    <x-nav-link :href="route('clientes.index')" :active="request()->routeIs('clientes.*')" class="text-gray-200 hover:text-white">
                        <i style="color: #c83232;" class="fas fa-users mr-2"></i> {{ __('Clientes') }}
                    </x-nav-link>

                    <x-nav-link :href="route('ventas.index')" :active="request()->routeIs('ventas.*')" class="text-gray-200 hover:text-white">
                        <i style="color: #c83232;" class="fas fa-shopping-cart mr-2"></i> {{ __('Ventas') }}
                    </x-nav-link>

                    <x-nav-link :href="route('proveedores.index')" :active="request()->routeIs('proveedores.*')" class="text-gray-200 hover:text-white">
                        <i style="color: #c83232;" class="fas fa-truck mr-2"></i> {{ __('Proveedores') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-200 bg-blue-900 hover:text-white focus:outline-none transition ease-in-out duration-150">
                            <i style="color: #c83232;" class="fas fa-user-circle text-lg mr-2"></i>
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
                            <i class="fas fa-id-card mr-2"></i> {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-2 text-red-600"></i> {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Móvil) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-blue-900 focus:outline-none focus:bg-blue-900 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Móvil) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fas fa-chart-pie mr-2"></i> {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('productos.index')" :active="request()->routeIs('productos.*')">
                <i class="fas fa-box-open mr-2"></i> {{ __('Productos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.*')">
                <i class="fas fa-tags mr-2"></i> {{ __('Categorías') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('clientes.index')" :active="request()->routeIs('clientes.*')">
                <i class="fas fa-users mr-2"></i> {{ __('Clientes') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('ventas.index')" :active="request()->routeIs('ventas.*')">
                <i class="fas fa-shopping-cart mr-2"></i> {{ __('Ventas') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('proveedores.index')" :active="request()->routeIs('proveedores.*')">
                <i class="fas fa-truck mr-2"></i> {{ __('Proveedores') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-blue-900">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    <i class="fas fa-id-card mr-2"></i> {{ __('Perfil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>