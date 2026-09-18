<header x-data="{ mobileMenu: false }" class="sticky top-0 z-50 border-b border-pink-100/80 bg-white/90 backdrop-blur-xl">
    <div class="mx-auto flex h-18 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="group flex items-center gap-3">
            <div
                class="flex h-10 w-10 items-center justify-center rounded-full
                           bg-white ring-2 ring-pink-100 transition
                           group-hover:ring-pink-300">
                <img src="{{ asset('logo.webp') }}" alt="El Taller" class="h-9 w-9 rounded-full object-contain">
            </div>

            <div class="leading-tight">
                <span class="block text-lg font-extrabold tracking-tight text-pink-600">
                    El Taller
                </span>

                <span class="hidden text-[10px] font-medium uppercase tracking-[0.18em] text-slate-400 sm:block">
                    Detalles que inspiran
                </span>
            </div>
        </a>


        <!-- Desktop Navigation -->
        <nav class="hidden items-center gap-8 md:flex">

            <a href="{{ route('home') }}"
                class="text-sm font-semibold {{ Route::is('home') ? 'text-pink-600' : 'text-slate-500' }}">
                Inicio
            </a>
            <a href="{{ route('catalogo') }}"
                class="text-sm font-medium transition hover:text-pink-600 {{ Route::is('catalogo') ? 'text-pink-600' : 'text-slate-500' }}">
                Productos
            </a>
            <a href="#personalizados"
                class="text-sm font-medium transition hover:text-pink-600 {{ Route::is('personalizados') ? 'text-pink-600' : 'text-slate-500' }}">
                Personalizados
            </a>
            <a href="#contacto"
                class="text-sm font-medium transition hover:text-pink-600 {{ Route::is('contacto') ? 'text-pink-600' : 'text-slate-500' }}">
                Contacto
            </a>
        </nav>

        <!-- Desktop Actions -->
        <div class="hidden items-center gap-2 md:flex">

            <a href="{{ url('/catalogo') }}"
                class="flex h-10 items-center gap-2 rounded-xl px-3
                           text-slate-500 transition hover:bg-pink-50 hover:text-pink-600"
                title="Buscar productos">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z" />
                </svg>

                <span class="text-sm font-medium">
                    Buscar
                </span>
            </a>

            <a href="#contacto"
                class="flex h-10 items-center gap-2 rounded-xl bg-slate-900 px-4
                           text-sm font-semibold text-white transition
                           hover:bg-pink-600">
                Contáctanos
            </a>

        </div>


        <!-- Mobile button -->
        <button type="button" @click="mobileMenu = !mobileMenu"
            class="flex h-10 w-10 items-center justify-center rounded-xl
                       text-slate-600 hover:bg-pink-50 md:hidden"
            aria-label="Abrir menú">
            <svg x-show="!mobileMenu" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <svg x-cloak x-show="mobileMenu" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

    </div>


    <!-- Mobile Navigation -->
    <div x-cloak x-show="mobileMenu" x-transition @click.outside="mobileMenu = false"
        class="border-t border-pink-100 bg-white px-4 py-4 md:hidden">
        <nav class="flex flex-col gap-1">

            <a href="{{ url('/') }}" @click="mobileMenu = false"
                class="rounded-xl bg-pink-50 px-4 py-3 text-sm font-semibold text-pink-600">
                Inicio
            </a>

            <a href="{{ url('/catalogo') }}" @click="mobileMenu = false"
                class="rounded-xl px-4 py-3 text-sm font-medium text-slate-600 hover:bg-pink-50">
                Productos
            </a>

            <a href="#categorias" @click="mobileMenu = false"
                class="rounded-xl px-4 py-3 text-sm font-medium text-slate-600 hover:bg-pink-50">
                Categorías
            </a>

            <a href="#personalizados" @click="mobileMenu = false"
                class="rounded-xl px-4 py-3 text-sm font-medium text-slate-600 hover:bg-pink-50">
                Personalizados
            </a>

            <a href="#contacto" @click="mobileMenu = false"
                class="rounded-xl px-4 py-3 text-sm font-medium text-slate-600 hover:bg-pink-50">
                Contacto
            </a>

        </nav>
    </div>

</header>
