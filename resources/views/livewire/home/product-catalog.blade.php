<div x-data="{ openProduct: null }" class="min-h-screen bg-gradient-to-b from-pink-50 via-rose-50 to-white py-10 px-4">

    <div class="max-w-7xl mx-auto">

        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-pink-600 tracking-tight">Catálogo de Productos</h1>
            <p class="text-rose-400 mt-2">Descubre nuestra colección de temporada ✨</p>
        </div>

        {{-- Filtros de categoría --}}
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            <button
                wire:click="selectCategory(null)"
                class="px-5 py-2 rounded-full font-medium text-sm transition-all duration-300 shadow-sm
                    {{ is_null($categoryId)
                        ? 'bg-pink-500 text-white shadow-pink-300 shadow-md scale-105'
                        : 'bg-white text-pink-500 border border-pink-200 hover:bg-pink-100' }}">
                Todos
            </button>

            @foreach ($categories as $category)
                <button
                    wire:click="selectCategory({{ $category->id }})"
                    class="px-5 py-2 rounded-full font-medium text-sm transition-all duration-300 shadow-sm
                        {{ $categoryId === $category->id
                            ? 'bg-pink-500 text-white shadow-pink-300 shadow-md scale-105'
                            : 'bg-white text-pink-500 border border-pink-200 hover:bg-pink-100' }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        {{-- Grid de productos --}}
        <div wire:loading.class="opacity-40" class="transition-opacity duration-300">
            @if ($products->isEmpty())
                <div class="text-center py-20">
                    <p class="text-rose-300 text-lg">No hay productos disponibles en esta categoría.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <div class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-xl hover:shadow-pink-200/60 transition-all duration-300 border border-pink-100 hover:-translate-y-1">

                            <div class="relative aspect-square bg-pink-50 overflow-hidden">
                                @if ($product->image_url)
                                    <img src="{{ $product->image_url }}"
                                         alt="{{ $product->name }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-pink-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 8h.01M4 4h16a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V5a1 1 0 011-1z" />
                                        </svg>
                                    </div>
                                @endif

                                @if ($product->category)
                                    <span class="absolute top-3 left-3 bg-white/90 backdrop-blur text-pink-500 text-xs font-semibold px-3 py-1 rounded-full shadow">
                                        {{ $product->category->name }}
                                    </span>
                                @endif
                            </div>

                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800 truncate">{{ $product->name }}</h3>

                                @if ($product->material)
                                    <p class="text-xs text-rose-300 mt-0.5">{{ $product->material }}</p>
                                @endif

                                <div class="flex items-center justify-between mt-3">
                                    <span class="text-lg font-bold text-pink-600">
                                        ${{ number_format($product->price_bace, 2) }}
                                    </span>

                                    @if ($product->variants_count > 0)
                                        <button
                                            @click="openProduct = openProduct === {{ $product->id }} ? null : {{ $product->id }}"
                                            class="text-xs font-semibold text-white bg-pink-500 hover:bg-pink-600 px-3 py-1.5 rounded-full transition-colors shadow-sm">
                                            Más detalles
                                        </button>
                                    @endif
                                </div>
                            </div>

                            {{-- Panel de colores / variantes --}}
                            @if ($product->variants_count > 0)
                                <div
                                    x-show="openProduct === {{ $product->id }}"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 -translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-cloak
                                    class="border-t border-pink-100 bg-pink-50/70 p-4">

                                    <p class="text-xs font-semibold text-pink-500 mb-2">Colores disponibles</p>

                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($product->colors as $color)
                                            <span class="flex items-center gap-1.5 bg-white border border-pink-200 rounded-full px-2.5 py-1 text-xs text-gray-600">
                                                <span class="w-3 h-3 rounded-full border border-pink-200"
                                                      style="background-color: {{ $color->hex_code ?? '#f9a8d4' }}"></span>
                                                {{ $color->name }}
                                                @if ($color->variants->count() > 1)
                                                    <span class="text-pink-400">({{ $color->variants->count() }})</span>
                                                @endif
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>