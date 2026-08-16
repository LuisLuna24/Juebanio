<div x-data="{
    filtersOpen: false,
    productOpen: null
}" class="min-h-screen bg-gray-50">
    {{-- HEADER --}}
    <header class="sticky top-0 z-30 border-b border-gray-200 bg-white/95 backdrop-blur">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center gap-4 py-4">

                {{-- Título --}}
                <div class="min-w-0 flex-1">
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-900">
                        Catálogo
                    </h1>

                    <p class="hidden sm:block text-sm text-gray-500 mt-1">
                        Descubre nuestra colección de temporada
                    </p>
                </div>

                {{-- Buscador --}}
                <div class="hidden sm:block w-full max-w-sm">
                    <div class="relative">

                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m21 21-4.35-4.35m2.1-5.4a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0Z" />
                        </svg>

                        <input type="search" wire:model.live.debounce.400ms="search" placeholder="Buscar productos..."
                            class="w-full rounded-xl border border-gray-200 bg-gray-50 pl-10 pr-4 py-2.5 text-sm
                                   focus:border-pink-400 focus:ring-2 focus:ring-pink-100">
                    </div>
                </div>

                {{-- Mobile filters --}}
                <button @click="filtersOpen = true"
                    class="lg:hidden inline-flex items-center gap-2 px-3 py-2 rounded-xl
                           border border-gray-200 bg-white text-sm font-medium text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4h18M6 12h12M10 20h4" />
                    </svg>

                    Filtros
                </button>

            </div>

            {{-- Search mobile --}}
            <div class="sm:hidden pb-4">
                <input type="search" wire:model.live.debounce.400ms="search" placeholder="Buscar productos..."
                    class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm
                           focus:border-pink-400 focus:ring-2 focus:ring-pink-100">
            </div>

        </div>
    </header>


    {{-- CONTENT --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <div class="lg:grid lg:grid-cols-[240px_minmax(0,1fr)] lg:gap-8">

            {{-- SIDEBAR --}}
            <aside class="hidden lg:block">

                <div class="sticky top-24 space-y-6">

                    {{-- Categorías --}}
                    <section>

                        <div class="flex items-center justify-between mb-3">
                            <h2 class="text-sm font-semibold text-gray-900">
                                Categoría
                            </h2>

                            @if ($categoryId || $search)
                                <button wire:click="clearFilters" class="text-xs text-pink-600 hover:text-pink-700">
                                    Limpiar
                                </button>
                            @endif
                        </div>

                        <div class="space-y-1">

                            <button wire:click="selectCategory(null)"
                                class="w-full flex items-center justify-between
                                       px-3 py-2 rounded-lg text-sm transition cursor-pointer
                                       {{ is_null($categoryId) ? 'bg-pink-50 text-pink-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }}">
                                <span>Todos</span>

                                <span class="text-xs text-gray-400">
                                    {{ $totalProducts ?? '' }}
                                </span>
                            </button>

                            @foreach ($categories as $category)
                                <button wire:click="selectCategory({{ $category->id }})"
                                    class="w-full flex items-center justify-between
                                           px-3 py-2 rounded-lg text-sm transition cursor-pointer
                                           {{ $categoryId === $category->id ? 'bg-pink-50 text-pink-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }}">
                                    <span>
                                        {{ $category->name }}
                                    </span>

                                    @if (isset($category->products_count))
                                        <span class="text-xs text-gray-400">
                                            {{ $category->products_count }}
                                        </span>
                                    @endif

                                </button>
                            @endforeach

                        </div>

                    </section>


                    {{-- Precio
                    <section class="border-t border-gray-100 pt-6">

                        <h2 class="text-sm font-semibold text-gray-900 mb-3">
                            Precio
                        </h2>

                        <div class="grid grid-cols-2 gap-2">

                            <input type="number" wire:model.live.debounce.500ms="minPrice" placeholder="Mín."
                                class="w-full rounded-lg border-gray-200 text-sm">

                            <input type="number" wire:model.live.debounce.500ms="maxPrice" placeholder="Máx."
                                class="w-full rounded-lg border-gray-200 text-sm">

                        </div>

                    </section>
                    --}}
                </div>

            </aside>


            {{-- PRODUCTOS --}}
            <main>

                {{-- Toolbar --}}
                <div class="flex flex-wrap items-center justify-between gap-3 mb-5">

                    <div>

                        <p class="text-sm text-gray-500">

                            <span class="font-medium text-gray-900">
                                {{ $products->total() ?? $products->count() }}
                            </span>

                            productos

                        </p>

                    </div>


                    {{-- Ordenamiento --}}
                    <div class="flex items-center gap-2">

                        <span class="hidden sm:block text-sm text-gray-500">
                            Ordenar:
                        </span>

                        <select wire:model.live="sort" class="rounded-lg border-gray-200 bg-white text-sm">
                            <option value="newest">
                                Más recientes
                            </option>

                            <option value="price_asc">
                                Precio: menor a mayor
                            </option>

                            <option value="price_desc">
                                Precio: mayor a menor
                            </option>

                            <option value="name">
                                Nombre
                            </option>
                        </select>

                    </div>

                </div>


                {{-- Loading --}}
                <div wire:loading.flex class="mb-4 items-center gap-2 text-sm text-gray-500">

                    <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4" />

                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
                    </svg>

                    Actualizando catálogo...

                </div>


                {{-- Grid --}}
                <div wire:loading.class="opacity-50"
                    wire:target="selectCategory,search,minPrice,maxPrice,selectedMaterials,onlyAvailable,sort"
                    class="transition-opacity duration-200">

                    @if ($products->isEmpty())

                        <div class="rounded-2xl border border-dashed border-gray-200 bg-white p-12 text-center">

                            <div
                                class="mx-auto w-14 h-14 rounded-full bg-pink-50 flex items-center justify-center mb-4">

                                <svg class="w-7 h-7 text-pink-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M21 21l-4.35-4.35m2.1-5.4a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0Z" />
                                </svg>

                            </div>

                            <h3 class="font-semibold text-gray-900">
                                No encontramos productos
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Prueba cambiando los filtros o la búsqueda.
                            </p>

                            <button wire:click="clearFilters"
                                class="mt-4 text-sm font-medium text-pink-600 hover:text-pink-700">
                                Limpiar filtros
                            </button>

                        </div>
                    @else
                        <div class="grid grid-cols-2 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4 sm:gap-6">

                            @foreach ($products as $product)
                                <article wire:key="product-{{ $product->id }}"
                                    class="group overflow-hidden rounded-2xl border border-gray-100 bg-white
                                           shadow-sm hover:shadow-lg hover:-translate-y-0.5
                                           transition-all duration-200">

                                    {{-- Image --}}
                                    <button type="button" @click="productOpen = {{ $product->id }}"
                                        class="relative block w-full aspect-square overflow-hidden bg-gray-100">

                                        @if ($product->image_url)
                                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                                loading="lazy"
                                                class="w-full h-full object-cover transition-transform duration-500
                                                       group-hover:scale-105">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-300">

                                                <svg class="w-14 h-14" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 8h.01M4 4h16a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V5a1 1 0 011-1z" />
                                                </svg>

                                            </div>
                                        @endif

                                        {{-- Category --}}
                                        @if ($product->category)
                                            <span
                                                class="absolute top-3 left-3 rounded-full
                                                       bg-white/90 backdrop-blur px-2.5 py-1
                                                       text-[11px] font-medium text-gray-700 shadow-sm">
                                                {{ $product->category->name }}
                                            </span>
                                        @endif

                                    </button>


                                    {{-- Info --}}
                                    <div class="p-4">

                                        <h3 class="font-semibold text-gray-900 truncate">
                                            {{ $product->name }}
                                        </h3>

                                        @if ($product->material)
                                            <p class="mt-1 text-xs text-gray-400">
                                                {{ $product->material }}
                                            </p>
                                        @endif


                                        <div class="flex items-end justify-between gap-3 mt-4">

                                            <div>

                                                <p class="text-lg font-bold text-gray-900">
                                                    ${{ number_format($product->price_bace, 2) }}
                                                </p>

                                                @if ($product->variants_count > 0)
                                                    <p class="text-[11px] text-gray-400 mt-0.5">
                                                        {{ $product->variants_count }}
                                                        {{ Str::plural('variante', $product->variants_count) }}
                                                    </p>
                                                @endif

                                            </div>


                                            <button type="button" @click="productOpen = {{ $product->id }}"
                                                class="shrink-0 inline-flex items-center justify-center
                                                       rounded-lg bg-gray-900 px-3 py-2
                                                       text-xs font-semibold text-white
                                                       hover:bg-pink-600 transition-colors">
                                                Ver
                                            </button>

                                        </div>

                                    </div>

                                </article>
                            @endforeach

                        </div>


                        {{-- Pagination --}}
                        <div class="mt-8">
                            {{ $products->links() }}
                        </div>

                    @endif

                </div>

            </main>

        </div>

    </div>


    {{-- MOBILE FILTER DRAWER --}}
    <div x-show="filtersOpen" x-cloak class="fixed inset-0 z-50 lg:hidden">

        <div x-show="filtersOpen" x-transition.opacity @click="filtersOpen = false"
            class="absolute inset-0 bg-black/30"></div>


        <aside x-show="filtersOpen" x-transition:enter="transition transform duration-300"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="absolute right-0 top-0 h-full w-full max-w-sm bg-white shadow-xl p-6 overflow-y-auto">

            <div class="flex items-center justify-between mb-6">

                <h2 class="text-lg font-bold text-gray-900">
                    Filtros
                </h2>

                <button @click="filtersOpen = false" class="p-2 rounded-lg hover:bg-gray-100">
                    ✕
                </button>

            </div>

            {{-- Aquí puedes reutilizar los mismos filtros del sidebar --}}
            <div class="space-y-6">

                <div>

                    <h3 class="text-sm font-semibold mb-3">
                        Categoría
                    </h3>

                    <div class="space-y-1">

                        <button wire:click="selectCategory(null); filtersOpen = false"
                            class="w-full text-left px-3 py-2 rounded-lg text-sm">
                            Todos
                        </button>

                        @foreach ($categories as $category)
                            <button wire:click="selectCategory({{ $category->id }}); filtersOpen = false"
                                class="w-full text-left px-3 py-2 rounded-lg text-sm">
                                {{ $category->name }}
                            </button>
                        @endforeach

                    </div>

                </div>

            </div>

        </aside>

    </div>


    {{-- PRODUCT DETAIL MODAL --}}
    @foreach ($products as $product)
        <div x-show="productOpen === {{ $product->id }}" x-cloak
            class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-6">

            <div x-show="productOpen === {{ $product->id }}" x-transition.opacity @click="productOpen = null"
                class="absolute inset-0 bg-black/40"></div>


            <div x-show="productOpen === {{ $product->id }}" x-transition:enter="transition duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                class="relative w-full sm:max-w-2xl bg-white sm:rounded-2xl
                       rounded-t-3xl shadow-2xl overflow-hidden">

                <div class="grid sm:grid-cols-2">

                    {{-- Image --}}
                    <div class="aspect-square bg-gray-100">

                        @if ($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover">
                        @endif

                    </div>


                    {{-- Content --}}
                    <div class="p-6">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                @if ($product->category)
                                    <p class="text-xs font-medium text-pink-500 mb-2">
                                        {{ $product->category->name }}
                                    </p>
                                @endif

                                <h2 class="text-xl font-bold text-gray-900">
                                    {{ $product->name }}
                                </h2>

                            </div>

                            <button @click="productOpen = null" class="text-gray-400 hover:text-gray-700">
                                ✕
                            </button>

                        </div>


                        <p class="text-2xl font-bold text-gray-900 mt-5">
                            ${{ number_format($product->price_bace, 2) }}
                        </p>


                        @if ($product->material)
                            <p class="text-sm text-gray-500 mt-3">
                                Material:
                                <span class="font-medium text-gray-700">
                                    {{ $product->material }}
                                </span>
                            </p>
                        @endif


                        @if ($product->variants_count > 0)
                            <div class="mt-6">

                                <h3 class="text-sm font-semibold text-gray-900 mb-3">
                                    Colores disponibles
                                </h3>

                                <div class="flex flex-wrap gap-2">

                                    @foreach ($product->colors as $color)
                                        <span
                                            class="inline-flex items-center gap-2 rounded-full
                                                   border border-gray-200 bg-gray-50
                                                   px-3 py-1.5 text-xs text-gray-700">
                                            <span class="w-3.5 h-3.5 rounded-full border border-gray-300"
                                                style="background-color: {{ $color->hex_code ?? '#f9a8d4' }}"></span>

                                            {{ $color->name }}

                                        </span>
                                    @endforeach

                                </div>

                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>
    @endforeach

</div>
