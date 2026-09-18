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

<body class="min-h-screen bg-[#fffdfd] text-slate-800 antialiased">

    {{-- HEADER --}}
    <x-home.nav />

    {{-- CATALOG --}}
    <main>
        @livewire('home.product-catalog')
    </main>

    {{-- FOOTER --}}
    <x-home.footer />
</body>

</html>
