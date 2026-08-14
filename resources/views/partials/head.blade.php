<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>El Taller | Catálogo de Productos Personalizados</title>
<meta name="description"
    content="El Taller — juegos de baño, fundas, sublimables, stickers y calcomanías personalizadas. Descubre nuestra colección de temporada." />
<meta name="keywords"
    content="El Taller, juegos de baño, fundas personalizadas, sublimables, stickers, calcomanías, regalos personalizados" />
<meta name="author" content="El Taller" />
<link rel="canonical" href="{{ url()->current() }}" />

{{-- Open Graph / redes sociales --}}
<meta property="og:type" content="website" />
<meta property="og:site_name" content="El Taller" />
<meta property="og:title" content="El Taller | Catálogo de Productos Personalizados" />
<meta property="og:description"
    content="Juegos de baño, fundas, sublimables, stickers y calcomanías personalizadas. Descubre nuestra colección de temporada." />
<meta property="og:image" content="{{ asset('images/og-cover.webp') }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:locale" content="es_MX" />

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="El Taller | Catálogo de Productos Personalizados" />
<meta name="twitter:description"
    content="Juegos de baño, fundas, sublimables, stickers y calcomanías personalizadas." />
<meta name="twitter:image" content="{{ asset('images/og-cover.webp') }}" />

{{-- Favicon / logo --}}
<link rel="icon" type="image/webp" href="{{ asset('images/logo.webp') }}" />
<link rel="apple-touch-icon" href="{{ asset('images/logo.webp') }}" />

{{-- Datos estructurados (SEO) --}}
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'El Taller',
    'url' => url('/'),
    'logo' => asset('images/logo.webp'),
]) !!}
</script>
@fonts

<wireui:scripts />

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
