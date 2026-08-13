<div>
    <!-- Content Header -->
    <div class="flex items-center justify-between mb-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Productos</h1>
            <p class="text-gray-600 dark:text-gray-300">Administra los productos</p>
        </div>
        <x-w-button label="Nuevo Producto" x-on:click="$openModal('cardModal')" primary />
    </div>

    <!-- Table Component -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($models as $model)
            <article
                class="group flex flex-col w-full max-w-sm rounded-xl overflow-hidden border border-neutral-200 bg-white shadow-sm hover:shadow-md transition-all duration-300 dark:border-neutral-700 dark:bg-neutral-900">

                <!-- Imagen del Producto -->
                <div class="relative h-48 w-full overflow-hidden bg-neutral-100 dark:bg-neutral-800">
                    <span
                        class="absolute top-3 right-3 z-10 inline-flex items-center gap-1 rounded-full bg-black/60 backdrop-blur-md px-2.5 py-1 text-xs font-semibold text-white shadow-sm">
                        <x-w-icon name="chart-pie" class="w-3.5 h-3.5" />
                        {{ $model->category->name }}
                    </span>

                    <img src="{{ $model->image_url ?? 'https://penguinui.s3.amazonaws.com/component-assets/card-img-2.webp' }}"
                        class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                        alt="Fotografía de {{ $model->name }}" />
                </div>

                <!-- Contenedor de Información -->
                <div class="flex flex-col flex-grow p-5">

                    <!-- Header del Contenido: SKU y Toggle de Status -->
                    <div class="flex items-center justify-between mb-3">
                        <div
                            class="flex items-center gap-1.5 text-xs font-mono font-medium text-neutral-500 dark:text-neutral-400">
                            <x-w-icon name="finger-print" class="w-4 h-4" />
                            <span>SKU: {{ $model->sku }}</span>
                        </div>

                        <!-- Toggle Alpine/Livewire -->
                        <div x-data="{ isActive: {{ $model->status ? 'true' : 'false' }} }" class="flex items-center gap-2">
                            <span class="text-xs font-medium"
                                :class="isActive ? 'text-green-600 dark:text-green-400' :
                                    'text-neutral-400 dark:text-neutral-500'"
                                x-text="isActive ? 'Activo' : 'Inactivo'">
                            </span>

                            <button type="button"
                                x-on:click="isActive = !isActive; $wire.toggleStatus({{ $model->id }})"
                                :class="isActive ? 'bg-green-500' : 'bg-neutral-300 dark:bg-neutral-600'"
                                class="relative inline-flex h-5 w-9 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900"
                                role="switch" :aria-checked="isActive.toString()">
                                <span aria-hidden="true" :class="isActive ? 'translate-x-4' : 'translate-x-0'"
                                    class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Título Principal -->
                    <h3 class="text-xl font-bold text-neutral-900 dark:text-white line-clamp-2 leading-tight mb-2"
                        title="{{ $model->name }}">
                        {{ $model->name }}
                    </h3>

                    <!-- Descripción -->
                    <p class="text-sm text-neutral-600 dark:text-neutral-400 line-clamp-3 mb-4">
                        {{ $model->description }}
                    </p>

                    <!-- Zona de Acciones -->
                    <div class="mt-auto pt-4 border-t border-neutral-100 dark:border-neutral-800">
                        <div class="grid grid-cols-2 gap-3">
                            <x-w-button icon="pencil" label="Editar" x-on:click="$openModal('cardModal')" primary
                                class="w-full justify-center" wire:click="edit({{ $model->id }})" />
                            <x-w-button icon="trash" label="Eliminar" negative class="w-full justify-center" />
                        </div>
                    </div>

                </div>
            </article>
        @empty
            <div class="flex flex-col items-center justify-center h-64">
                <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">No se encontraron modelos</h3>
                <p class="text-gray-600 dark:text-gray-300">No se han creado modelos todavía.</p>
            </div>
        @endforelse

    </div>

    <!-- Edit Modal -->
    <x-w-modal-card title="Categoría" name="cardModal" wire:model="showCardModal">
        <form wire:submit.prevent="save">
            <div class="space-y-4">
                <x-w-input label="Nombre del producto" placeholder="Eje: Juego de baño, toalla, ..."
                    wire:model="name" />
                <x-w-input label="SKU" placeholder="Eje: BAN-0001" wire:model="sku" />
                <x-w-textarea label="Descripción" placeholder="Eje: Juego de baño, toalla, ..."
                    wire:model="description" />
            </div>
            <div class="space-y-4 grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <x-w-select label="Categoría" placeholder="Selecciona una categoría" :async-data="route('api.category.index')" option-value="id"
                    option-label="name" wire:model="category_id" />
                <x-w-select label="Temporada" placeholder="Selecciona una temporada" :async-data="route('api.season.index')" option-value="id"
                    option-label="name" wire:model="season_id" />
            </div>
            <div class="w-full">
                <!-- Contenedor principal con soporte para modo claro y oscuro -->
                <label for="image-upload"
                    class="relative flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-700 transition-colors duration-200 overflow-hidden">

                    @if ($image)
                        <!-- Vista previa y nombre del archivo -->
                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center w-full h-full p-4 bg-gray-50 dark:bg-gray-800">
                            <img src="{{ $image->temporaryUrl() }}"
                                class="object-contain h-28 mb-3 rounded-lg shadow-sm" alt="Vista previa">
                            <span
                                class="text-sm font-medium text-gray-700 dark:text-gray-300 truncate w-full text-center px-4">
                                {{ $image->getClientOriginalName() }}
                            </span>
                        </div>
                    @elseif ($existingImage)
                        <!-- Mostrar imagen existente al editar -->
                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center w-full h-full p-4 bg-gray-50 dark:bg-gray-800">
                            <img src="{{ Storage::url($existingImage) }}"
                                class="object-contain h-28 mb-3 rounded-lg shadow-sm" alt="Imagen existente">
                            <span
                                class="text-sm font-medium text-gray-700 dark:text-gray-300 truncate w-full text-center px-4">
                                {{ basename($existingImage) }}
                            </span>
                        </div>
                    @else
                        <!-- Estado vacío (sin imagen) -->
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-10 h-10 mb-3 text-gray-400 dark:text-gray-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                <span class="font-semibold text-blue-600 dark:text-blue-400">Haz clic para subir</span>
                                o arrastra tu imagen
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Solo JPG, JPEG o WEBP</p>
                        </div>
                    @endif

                    <input id="image-upload" type="file" class="hidden" wire:model="image"
                        accept=".jpg, .jpeg, .webp, image/jpeg, image/webp" />
                </label>

                <!-- Indicador de carga (se muestra mientras Livewire sube la imagen al servidor) -->
                <div wire:loading wire:target="image"
                    class="mt-2 flex items-center gap-2 text-sm font-medium text-blue-600 dark:text-blue-400">
                    <svg class="animate-spin h-4 w-4 text-blue-600 dark:text-blue-400"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Procesando imagen...
                </div>
                <x-w-errors only="name|sku|description|category_id|season_id|image" />
            </div>

            <x-slot name="footer" class="flex justify-end gap-x-4">
                <x-w-button flat label="Cancel" x-on:click="close" />
                <x-w-button primary label="Guardar" wire:click="save" />
            </x-slot>
        </form>
    </x-w-modal-card>
</div>
