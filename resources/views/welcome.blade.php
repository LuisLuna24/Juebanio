<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')

    
</head>

<body
    class="bg-gradient-to-b from-pink-50 via-rose-50 to-white dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen flex flex-col">

    <header class="w-full sticky top-0 z-40 bg-white/80 backdrop-blur-md border-b border-pink-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

            <a href="{{ url('/') }}"
                class="flex items-center gap-2.5 font-extrabold text-pink-600 text-lg tracking-tight">
                <img src="{{ asset('images/logo.webp') }}" alt="El Taller"
                    class="h-9 w-9 object-contain rounded-full ring-2 ring-pink-200" />
                El Taller
            </a>

            <nav class="flex items-center gap-2 text-sm">
                <a href="#catalogo"
                    class="hidden sm:inline-block px-4 py-1.5 text-pink-500 hover:text-pink-600 rounded-full transition-colors leading-normal">
                    Catálogo
                </a>
                <a href="#contacto"
                    class="inline-block px-5 py-1.5 bg-pink-500 hover:bg-pink-600 text-white rounded-full transition-colors leading-normal shadow-sm shadow-pink-200">
                    Contáctanos
                </a>
            </nav>
        </div>
    </header>

    <main id="catalogo" class="flex-1 w-full">
        @livewire('home.product-catalog')
    </main>

    <footer id="contacto" class="w-full border-t border-pink-100 bg-white/60 mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col items-center gap-3 text-center">
            <img src="{{ asset('images/logo.webp') }}" alt="El Taller"
                class="h-10 w-10 object-contain rounded-full ring-2 ring-pink-200" />
            <p class="text-sm font-semibold text-pink-600">El Taller</p>
            <p class="text-xs text-rose-300">&copy; {{ date('Y') }} El Taller. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
