<div>
    <!-- Content Header -->
    <div class="flex items-center justify-between mb-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Modelos</h1>
            <p class="text-gray-600 dark:text-gray-300">Administra los modelos de productos</p>
        </div>
        <x-w-button label="Nueva Categoría" x-on:click="$openModal('cardModal')" primary />
    </div>

    <!-- Table Component -->
    <div>
        @forelse ($models as $model)
            <article
                class="group flex rounded-sm max-w-sm flex-col overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                <div class="h-44 md:h-64 overflow-hidden">
                    <img src="https://penguinui.s3.amazonaws.com/component-assets/card-img-2.webp"
                        class="object-cover transition duration-700 ease-out group-hover:scale-105"
                        alt="view of a coastal Mediterranean village on a hillside, with small boats in the water." />
                </div>
                <div class="flex flex-col gap-4 p-6">
                    <div class="flex items-center gap-1 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        <span>Europe</span>
                    </div>
                    <h3 class="text-balance text-xl lg:text-2xl font-bold text-neutral-900 dark:text-white"
                        aria-describedby="tripDescription">Mediterranean Escape</h3>
                    <p id="tripDescription" class="text-pretty text-sm mb-2">
                        Relax under the sun, savor delicious cuisine, and create
                        memories that last a lifetime. Book your getaway now.
                    </p>
                    <button type="button"
                        class="whitespace-nowrap bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white rounded-sm">Book
                        Now</button>
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
            <x-w-input label="Nombre de la categoría" placeholder="Juego de baño, toalla, ..." wire:model="name" />

            <x-slot name="footer" class="flex justify-end gap-x-4">
                <x-w-button flat label="Cancel" x-on:click="close" />
                <x-w-button primary label="Guardar" wire:click="save" />
            </x-slot>
        </form>
    </x-w-modal-card>
</div>
