<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')

    <style>
        [x-cloak] {
            display: none !important;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-[#fffdfd] text-slate-800 antialiased">

    <!-- =========================================================
         HEADER
    ========================================================== -->

    <x-home.nav />


    <main>

        <!-- =====================================================
             HERO
        ====================================================== -->

        <section class="relative overflow-hidden">

            <!-- Background decoration -->
            <div class="pointer-events-none absolute -left-32 top-10 h-72 w-72 rounded-full bg-pink-100/70 blur-3xl">
            </div>
            <div class="pointer-events-none absolute -right-32 bottom-0 h-96 w-96 rounded-full bg-sky-100/70 blur-3xl">
            </div>

            <div class="relative mx-auto max-w-7xl px-4 pb-16 pt-12 sm:px-6 sm:pb-20 sm:pt-16 lg:px-8 lg:pb-24 lg:pt-20">

                <div class="grid items-center gap-12 lg:grid-cols-[1.05fr_.95fr]">

                    <!-- Hero text -->
                    <div class="max-w-2xl">

                        <div
                            class="mb-5 inline-flex items-center gap-2 rounded-full
                                   border border-pink-100 bg-white px-3.5 py-1.5
                                   shadow-sm">
                            <span class="h-2 w-2 rounded-full bg-pink-500"></span>

                            <span class="text-xs font-semibold text-pink-600">
                                Hecho con cariño ✨
                            </span>
                        </div>


                        <h1
                            class="text-4xl font-black leading-[1.05] tracking-tight
                                   text-slate-900 sm:text-5xl lg:text-6xl">
                            Tus ideas,
                            <span class="text-pink-500">
                                hechas realidad.
                            </span>
                        </h1>


                        <p class="mt-6 max-w-xl text-base leading-7 text-slate-500 sm:text-lg">
                            En <strong class="font-semibold text-slate-700">El Taller</strong>
                            creamos productos personalizados, detalles para tu hogar
                            y artículos para darle identidad a tu negocio.
                        </p>


                        <!-- Buttons -->
                        <div class="mt-8 flex flex-col gap-3 sm:flex-row">

                            <a href="{{ url('/catalogo') }}"
                                class="inline-flex items-center justify-center gap-2
                                       rounded-xl bg-slate-900 px-6 py-3.5
                                       text-sm font-bold text-white shadow-lg
                                       shadow-slate-900/10 transition
                                       hover:-translate-y-0.5 hover:bg-pink-600">
                                Ver productos

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0-5 5m5-5H6" />
                                </svg>
                            </a>


                            <a href="#personalizados"
                                class="inline-flex items-center justify-center
                                       rounded-xl border border-slate-200
                                       bg-white px-6 py-3.5 text-sm font-bold
                                       text-slate-700 transition
                                       hover:border-pink-200 hover:bg-pink-50
                                       hover:text-pink-600">
                                Quiero personalizar algo
                            </a>

                        </div>


                        <!-- Small trust indicators -->
                        <div class="mt-8 flex flex-wrap gap-x-6 gap-y-3 text-xs font-medium text-slate-400">

                            <div class="flex items-center gap-2">
                                <span
                                    class="flex h-6 w-6 items-center justify-center rounded-full bg-pink-100 text-pink-600">
                                    ✓
                                </span>
                                Productos personalizados
                            </div>

                            <div class="flex items-center gap-2">
                                <span
                                    class="flex h-6 w-6 items-center justify-center rounded-full bg-sky-100 text-sky-600">
                                    ✓
                                </span>
                                Diseños especiales
                            </div>

                        </div>

                    </div>


                    <!-- Hero visual -->
                    <div class="relative mx-auto w-full max-w-xl">

                        <div
                            class="absolute inset-8 rounded-[3rem] bg-gradient-to-br from-pink-200/60 via-white to-sky-200/60 blur-2xl">
                        </div>

                        <div
                            class="relative overflow-hidden rounded-[2.5rem]
                                   border border-white bg-white/80 p-5
                                   shadow-2xl shadow-pink-100">

                            <!-- Decorative top -->
                            <div class="flex items-center justify-between px-2 pb-4">

                                <div class="flex items-center gap-2">
                                    <span class="h-2.5 w-2.5 rounded-full bg-pink-400"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-sky-400"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-yellow-300"></span>
                                </div>

                                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-300">
                                    El Taller
                                </span>

                            </div>


                            <!-- Main visual -->
                            <div
                                class="relative flex min-h-[360px] items-center
                                       justify-center overflow-hidden rounded-[2rem]
                                       bg-gradient-to-br from-pink-50 via-white to-sky-50">

                                <div class="absolute -left-8 top-8 h-32 w-32 rounded-full bg-yellow-100/80 blur-2xl">
                                </div>
                                <div class="absolute -right-8 bottom-8 h-40 w-40 rounded-full bg-pink-200/70 blur-2xl">
                                </div>

                                <div class="relative text-center">

                                    <div
                                        class="mx-auto flex h-44 w-44 items-center justify-center
                                               rounded-full bg-white shadow-xl shadow-pink-100
                                               ring-8 ring-white/60">
                                        <img src="{{ asset('logo.webp') }}" alt="El Taller"
                                            class="h-36 w-36 rounded-full object-contain">
                                    </div>

                                    <div
                                        class="mx-auto mt-5 inline-flex items-center gap-2
                                               rounded-full border border-pink-100
                                               bg-white px-4 py-2 shadow-sm">
                                        <span class="text-sm">✨</span>

                                        <span class="text-xs font-bold text-slate-600">
                                            Hecho para ti
                                        </span>
                                    </div>

                                </div>


                                <!-- Floating cards -->

                                <div
                                    class="absolute left-4 top-10 rounded-2xl border border-white
                                           bg-white/95 px-3 py-2.5 shadow-lg">
                                    <div class="text-lg">🎨</div>
                                    <div class="mt-1 text-[10px] font-bold text-slate-600">
                                        Sublimación
                                    </div>
                                </div>


                                <div
                                    class="absolute bottom-8 right-4 rounded-2xl border border-white
                                           bg-white/95 px-3 py-2.5 shadow-lg">
                                    <div class="text-lg">🎁</div>
                                    <div class="mt-1 text-[10px] font-bold text-slate-600">
                                        Personalizados
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             CATEGORIES
        ====================================================== -->

        <section id="categorias" class="border-y border-pink-100/70 bg-white">

            <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">

                <div class="mx-auto max-w-2xl text-center">

                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-pink-500">
                        Explora
                    </span>

                    <h2 class="mt-2 text-3xl font-black tracking-tight text-slate-900 sm:text-4xl">
                        ¿Qué estás buscando?
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-slate-500 sm:text-base">
                        Encuentra productos para tu hogar, regalos especiales
                        o todo lo que necesitas para darle identidad a tu negocio.
                    </p>

                </div>


                <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

                    <!-- Juego de baño -->
                    <a href="{{ url('/catalogo?categoria=juego-de-bano') }}"
                        class="group rounded-3xl border border-pink-100 bg-gradient-to-br
                               from-pink-50 to-white p-6 transition duration-300
                               hover:-translate-y-1 hover:border-pink-200 hover:shadow-xl
                               hover:shadow-pink-100">
                        <div
                            class="flex h-14 w-14 items-center justify-center
                                   rounded-2xl bg-white text-2xl shadow-sm">
                            🛁
                        </div>

                        <h3 class="mt-5 font-bold text-slate-800">
                            Juegos de baño
                        </h3>

                        <p class="mt-2 text-sm leading-5 text-slate-500">
                            Detalles para darle personalidad a tu hogar.
                        </p>

                        <span class="mt-5 inline-flex items-center gap-1 text-xs font-bold text-pink-500">
                            Explorar
                            <span class="transition group-hover:translate-x-1">→</span>
                        </span>
                    </a>


                    <!-- Sublimación -->
                    <a href="{{ url('/catalogo?categoria=sublimacion') }}"
                        class="group rounded-3xl border border-sky-100 bg-gradient-to-br
                               from-sky-50 to-white p-6 transition duration-300
                               hover:-translate-y-1 hover:border-sky-200 hover:shadow-xl
                               hover:shadow-sky-100">
                        <div
                            class="flex h-14 w-14 items-center justify-center
                                   rounded-2xl bg-white text-2xl shadow-sm">
                            🎨
                        </div>

                        <h3 class="mt-5 font-bold text-slate-800">
                            Sublimación
                        </h3>

                        <p class="mt-2 text-sm leading-5 text-slate-500">
                            Personaliza productos con tus diseños favoritos.
                        </p>

                        <span class="mt-5 inline-flex items-center gap-1 text-xs font-bold text-sky-500">
                            Explorar
                            <span class="transition group-hover:translate-x-1">→</span>
                        </span>
                    </a>


                    <!-- Playeras -->
                    <a href="{{ url('/catalogo?categoria=playeras') }}"
                        class="group rounded-3xl border border-yellow-100 bg-gradient-to-br
                               from-yellow-50 to-white p-6 transition duration-300
                               hover:-translate-y-1 hover:border-yellow-200 hover:shadow-xl
                               hover:shadow-yellow-100">
                        <div
                            class="flex h-14 w-14 items-center justify-center
                                   rounded-2xl bg-white text-2xl shadow-sm">
                            👕
                        </div>

                        <h3 class="mt-5 font-bold text-slate-800">
                            Playeras
                        </h3>

                        <p class="mt-2 text-sm leading-5 text-slate-500">
                            Diseños para vestir tus ideas.
                        </p>

                        <span class="mt-5 inline-flex items-center gap-1 text-xs font-bold text-yellow-600">
                            Explorar
                            <span class="transition group-hover:translate-x-1">→</span>
                        </span>
                    </a>


                    <!-- Stickers -->
                    <a href="{{ url('/catalogo?categoria=stickers') }}"
                        class="group rounded-3xl border border-violet-100 bg-gradient-to-br
                               from-violet-50 to-white p-6 transition duration-300
                               hover:-translate-y-1 hover:border-violet-200 hover:shadow-xl
                               hover:shadow-violet-100">
                        <div
                            class="flex h-14 w-14 items-center justify-center
                                   rounded-2xl bg-white text-2xl shadow-sm">
                            ✨
                        </div>

                        <h3 class="mt-5 font-bold text-slate-800">
                            Stickers y calcomanías
                        </h3>

                        <p class="mt-2 text-sm leading-5 text-slate-500">
                            Dale identidad a tus productos y proyectos.
                        </p>

                        <span class="mt-5 inline-flex items-center gap-1 text-xs font-bold text-violet-500">
                            Explorar
                            <span class="transition group-hover:translate-x-1">→</span>
                        </span>
                    </a>


                    <!-- Fundas -->
                    <a href="{{ url('/catalogo?categoria=fundas') }}"
                        class="group rounded-3xl border border-emerald-100 bg-gradient-to-br
                               from-emerald-50 to-white p-6 transition duration-300
                               hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl
                               hover:shadow-emerald-100">
                        <div
                            class="flex h-14 w-14 items-center justify-center
                                   rounded-2xl bg-white text-2xl shadow-sm">
                            👜
                        </div>

                        <h3 class="mt-5 font-bold text-slate-800">
                            Fundas
                        </h3>

                        <p class="mt-2 text-sm leading-5 text-slate-500">
                            Diseños personalizados para llevar contigo.
                        </p>

                        <span class="mt-5 inline-flex items-center gap-1 text-xs font-bold text-emerald-600">
                            Explorar
                            <span class="transition group-hover:translate-x-1">→</span>
                        </span>
                    </a>


                    <!-- Toalleros -->
                    <a href="{{ url('/catalogo?categoria=toalleros') }}"
                        class="group rounded-3xl border border-orange-100 bg-gradient-to-br
                               from-orange-50 to-white p-6 transition duration-300
                               hover:-translate-y-1 hover:border-orange-200 hover:shadow-xl
                               hover:shadow-orange-100">
                        <div
                            class="flex h-14 w-14 items-center justify-center
                                   rounded-2xl bg-white text-2xl shadow-sm">
                            🧺
                        </div>

                        <h3 class="mt-5 font-bold text-slate-800">
                            Toalleros
                        </h3>

                        <p class="mt-2 text-sm leading-5 text-slate-500">
                            Complementos para decorar tu baño.
                        </p>

                        <span class="mt-5 inline-flex items-center gap-1 text-xs font-bold text-orange-500">
                            Explorar
                            <span class="transition group-hover:translate-x-1">→</span>
                        </span>
                    </a>


                    <!-- Tarjetas -->
                    <a href="{{ url('/catalogo?categoria=tarjetas') }}"
                        class="group rounded-3xl border border-indigo-100 bg-gradient-to-br
                               from-indigo-50 to-white p-6 transition duration-300
                               hover:-translate-y-1 hover:border-indigo-200 hover:shadow-xl
                               hover:shadow-indigo-100">
                        <div
                            class="flex h-14 w-14 items-center justify-center
                                   rounded-2xl bg-white text-2xl shadow-sm">
                            💼
                        </div>

                        <h3 class="mt-5 font-bold text-slate-800">
                            Tarjetas de presentación
                        </h3>

                        <p class="mt-2 text-sm leading-5 text-slate-500">
                            Haz que tu negocio deje una buena impresión.
                        </p>

                        <span class="mt-5 inline-flex items-center gap-1 text-xs font-bold text-indigo-500">
                            Explorar
                            <span class="transition group-hover:translate-x-1">→</span>
                        </span>
                    </a>


                    <!-- Ver todo -->
                    <a href="{{ url('/catalogo') }}"
                        class="group rounded-3xl border border-slate-200
                               bg-slate-900 p-6 text-white transition duration-300
                               hover:-translate-y-1 hover:bg-pink-600 hover:shadow-xl">
                        <div
                            class="flex h-14 w-14 items-center justify-center
                                   rounded-2xl bg-white/10 text-2xl">
                            🛍️
                        </div>

                        <h3 class="mt-5 font-bold">
                            Ver todo
                        </h3>

                        <p class="mt-2 text-sm leading-5 text-white/60">
                            Descubre todos nuestros productos.
                        </p>

                        <span class="mt-5 inline-flex items-center gap-1 text-xs font-bold text-white">
                            Ver catálogo
                            <span class="transition group-hover:translate-x-1">→</span>
                        </span>
                    </a>

                </div>

            </div>

        </section>


        <!-- =====================================================
             FEATURED PRODUCTS
        ====================================================== -->

        <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>

                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-pink-500">
                        Descubre
                    </span>

                    <h2 class="mt-2 text-3xl font-black tracking-tight text-slate-900">
                        Algunos de nuestros productos
                    </h2>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-slate-500">
                        Una pequeña muestra de lo que puedes encontrar en El Taller.
                    </p>

                </div>


                <a href="{{ url('/catalogo') }}"
                    class="inline-flex items-center gap-2 text-sm font-bold text-pink-600 hover:text-pink-700">
                    Ver catálogo completo

                    <span class="transition hover:translate-x-1">
                        →
                    </span>
                </a>

            </div>


            <!--
                Aquí puedes sustituir estos productos por un componente
                Livewire de productos destacados cuando lo tengas.
            -->

            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                <!-- Product card -->
                <a href="{{ url('/catalogo') }}"
                    class="group overflow-hidden rounded-3xl border border-slate-100
                           bg-white shadow-sm transition duration-300
                           hover:-translate-y-1 hover:shadow-xl hover:shadow-pink-100">

                    <div class="relative aspect-square overflow-hidden bg-pink-50">

                        <div
                            class="absolute left-4 top-4 z-10 rounded-full bg-white/90 px-3 py-1 text-[10px] font-bold text-pink-600 shadow-sm">
                            Destacado
                        </div>

                        <div class="flex h-full items-center justify-center">

                            <div class="flex h-32 w-32 items-center justify-center rounded-full bg-white shadow-lg">
                                🛁
                            </div>

                        </div>

                    </div>

                    <div class="p-5">

                        <p class="text-xs font-semibold text-pink-500">
                            Juego de baño
                        </p>

                        <h3 class="mt-1 font-bold text-slate-800">
                            Diseños para tu hogar
                        </h3>

                        <div class="mt-4 flex items-center justify-between">

                            <span class="text-sm font-bold text-slate-900">
                                Ver productos
                            </span>

                            <span
                                class="flex h-8 w-8 items-center justify-center
                                       rounded-lg bg-slate-100 text-slate-600
                                       transition group-hover:bg-pink-500 group-hover:text-white">
                                →
                            </span>

                        </div>

                    </div>

                </a>


                <!-- Product card -->
                <a href="{{ url('/catalogo') }}"
                    class="group overflow-hidden rounded-3xl border border-slate-100
                           bg-white shadow-sm transition duration-300
                           hover:-translate-y-1 hover:shadow-xl hover:shadow-sky-100">

                    <div class="relative aspect-square overflow-hidden bg-sky-50">

                        <div class="flex h-full items-center justify-center">

                            <div
                                class="flex h-32 w-32 items-center justify-center rounded-full bg-white shadow-lg text-5xl">
                                🎨
                            </div>

                        </div>

                    </div>

                    <div class="p-5">

                        <p class="text-xs font-semibold text-sky-500">
                            Sublimación
                        </p>

                        <h3 class="mt-1 font-bold text-slate-800">
                            Diseños personalizados
                        </h3>

                        <div class="mt-4 flex items-center justify-between">

                            <span class="text-sm font-bold text-slate-900">
                                Ver productos
                            </span>

                            <span
                                class="flex h-8 w-8 items-center justify-center
                                       rounded-lg bg-slate-100 text-slate-600
                                       transition group-hover:bg-sky-500 group-hover:text-white">
                                →
                            </span>

                        </div>

                    </div>

                </a>


                <!-- Product card -->
                <a href="{{ url('/catalogo') }}"
                    class="group overflow-hidden rounded-3xl border border-slate-100
                           bg-white shadow-sm transition duration-300
                           hover:-translate-y-1 hover:shadow-xl hover:shadow-yellow-100">

                    <div class="relative aspect-square overflow-hidden bg-yellow-50">

                        <div class="flex h-full items-center justify-center">

                            <div
                                class="flex h-32 w-32 items-center justify-center rounded-full bg-white shadow-lg text-5xl">
                                👕
                            </div>

                        </div>

                    </div>

                    <div class="p-5">

                        <p class="text-xs font-semibold text-yellow-600">
                            Playeras
                        </p>

                        <h3 class="mt-1 font-bold text-slate-800">
                            Lleva tus diseños contigo
                        </h3>

                        <div class="mt-4 flex items-center justify-between">

                            <span class="text-sm font-bold text-slate-900">
                                Ver productos
                            </span>

                            <span
                                class="flex h-8 w-8 items-center justify-center
                                       rounded-lg bg-slate-100 text-slate-600
                                       transition group-hover:bg-yellow-400 group-hover:text-white">
                                →
                            </span>

                        </div>

                    </div>

                </a>


                <!-- Product card -->
                <a href="{{ url('/catalogo') }}"
                    class="group overflow-hidden rounded-3xl border border-slate-100
                           bg-white shadow-sm transition duration-300
                           hover:-translate-y-1 hover:shadow-xl hover:shadow-violet-100">

                    <div class="relative aspect-square overflow-hidden bg-violet-50">

                        <div class="flex h-full items-center justify-center">

                            <div
                                class="flex h-32 w-32 items-center justify-center rounded-full bg-white shadow-lg text-5xl">
                                ✨
                            </div>

                        </div>

                    </div>

                    <div class="p-5">

                        <p class="text-xs font-semibold text-violet-500">
                            Stickers
                        </p>

                        <h3 class="mt-1 font-bold text-slate-800">
                            Haz único tu proyecto
                        </h3>

                        <div class="mt-4 flex items-center justify-between">

                            <span class="text-sm font-bold text-slate-900">
                                Ver productos
                            </span>

                            <span
                                class="flex h-8 w-8 items-center justify-center
                                       rounded-lg bg-slate-100 text-slate-600
                                       transition group-hover:bg-violet-500 group-hover:text-white">
                                →
                            </span>

                        </div>

                    </div>

                </a>

            </div>

        </section>


        <!-- =====================================================
             HOME / BUSINESS
        ====================================================== -->

        <section class="border-y border-slate-100 bg-slate-50/70">

            <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">

                <div class="mx-auto max-w-2xl text-center">

                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-pink-500">
                        Para todos
                    </span>

                    <h2 class="mt-2 text-3xl font-black tracking-tight text-slate-900">
                        Para tu hogar o para tu negocio
                    </h2>

                </div>


                <div class="mt-10 grid gap-6 lg:grid-cols-2">

                    <!-- Home -->
                    <div
                        class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br
                               from-pink-100 via-white to-rose-50 p-8 sm:p-10">

                        <div class="relative z-10 max-w-md">

                            <div
                                class="flex h-14 w-14 items-center justify-center
                                       rounded-2xl bg-white text-2xl shadow-sm">
                                🏠
                            </div>

                            <h3 class="mt-6 text-2xl font-black text-slate-900">
                                Detalles para tu hogar
                            </h3>

                            <p class="mt-3 text-sm leading-6 text-slate-500">
                                Juegos de baño, toalleros, fundas y otros
                                detalles para darle un toque especial a tus espacios.
                            </p>

                            <a href="{{ url('/catalogo') }}"
                                class="mt-6 inline-flex items-center gap-2 rounded-xl
                                       bg-white px-5 py-3 text-sm font-bold text-pink-600
                                       shadow-sm transition hover:bg-pink-600 hover:text-white">
                                Ver productos
                                <span>→</span>
                            </a>

                        </div>


                        <div class="pointer-events-none absolute -bottom-12 -right-8 text-[150px] opacity-20">
                            🛁
                        </div>

                    </div>


                    <!-- Business -->
                    <div
                        class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br
                               from-sky-100 via-white to-indigo-50 p-8 sm:p-10">

                        <div class="relative z-10 max-w-md">

                            <div
                                class="flex h-14 w-14 items-center justify-center
                                       rounded-2xl bg-white text-2xl shadow-sm">
                                🚀
                            </div>

                            <h3 class="mt-6 text-2xl font-black text-slate-900">
                                Dale identidad a tu negocio
                            </h3>

                            <p class="mt-3 text-sm leading-6 text-slate-500">
                                Playeras, stickers, calcomanías, tarjetas de presentación
                                y productos personalizados para tu emprendimiento.
                            </p>

                            <a href="#personalizados"
                                class="mt-6 inline-flex items-center gap-2 rounded-xl
                                       bg-slate-900 px-5 py-3 text-sm font-bold text-white
                                       shadow-sm transition hover:bg-pink-600">
                                Quiero personalizar
                                <span>→</span>
                            </a>

                        </div>


                        <div class="pointer-events-none absolute -bottom-12 -right-8 text-[150px] opacity-20">
                            💼
                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             PERSONALIZATION
        ====================================================== -->

        <section id="personalizados" class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">

            <div
                class="relative overflow-hidden rounded-[2.5rem]
                       bg-slate-900 px-7 py-12 sm:px-12 lg:px-16 lg:py-16">

                <!-- Decorative circles -->
                <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-pink-500/20 blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>

                <div class="relative grid items-center gap-10 lg:grid-cols-[1fr_auto]">

                    <div class="max-w-2xl">

                        <span
                            class="inline-flex items-center gap-2 rounded-full
                                     bg-white/10 px-3 py-1.5 text-xs font-bold text-pink-300">
                            ✨ Personalización
                        </span>

                        <h2 class="mt-5 text-3xl font-black tracking-tight text-white sm:text-4xl">
                            ¿Tienes una idea?
                            <span class="text-pink-400">
                                Hagámosla realidad.
                            </span>
                        </h2>

                        <p class="mt-4 max-w-xl text-sm leading-6 text-slate-300 sm:text-base">
                            Cuéntanos qué tienes en mente. Podemos ayudarte con
                            productos personalizados para ti, para regalar o para
                            darle identidad a tu negocio.
                        </p>

                    </div>


                    <a href="#contacto"
                        class="inline-flex items-center justify-center gap-2
                               rounded-xl bg-white px-6 py-3.5 text-sm font-bold
                               text-slate-900 transition hover:bg-pink-500 hover:text-white">
                        Solicitar cotización

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0-5 5m5-5H6" />
                        </svg>
                    </a>

                </div>

            </div>

        </section>


        <!-- =====================================================
             WHY US
        ====================================================== -->

        <section class="mx-auto max-w-7xl px-4 pb-16 sm:px-6 lg:px-8">

            <div class="grid gap-5 md:grid-cols-3">

                <div class="rounded-3xl border border-pink-100 bg-pink-50/60 p-6">
                    <div class="text-2xl">💖</div>

                    <h3 class="mt-4 font-bold text-slate-800">
                        Hecho con cariño
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Cada producto recibe atención en cada detalle.
                    </p>
                </div>


                <div class="rounded-3xl border border-sky-100 bg-sky-50/60 p-6">
                    <div class="text-2xl">🎨</div>

                    <h3 class="mt-4 font-bold text-slate-800">
                        Diseños personalizados
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Tu idea, tu estilo y tu personalidad.
                    </p>
                </div>


                <div class="rounded-3xl border border-yellow-100 bg-yellow-50/60 p-6">
                    <div class="text-2xl">🎁</div>

                    <h3 class="mt-4 font-bold text-slate-800">
                        Para regalar o emprender
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Detalles especiales para personas y negocios.
                    </p>
                </div>

            </div>

        </section>

    </main>


    <!-- =========================================================
         FOOTER
    ========================================================== -->
    <x-home.footer />
</body>

</html>
