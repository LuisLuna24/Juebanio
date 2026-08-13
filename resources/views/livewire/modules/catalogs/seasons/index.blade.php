<div>
    <!-- Content Header -->
    <div class="flex items-center justify-between mb-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Temporadas</h1>
            <p class="text-gray-600 dark:text-gray-300">Administra las temporadas de productos</p>
        </div>
        <x-w-button label="Nueva Temporada" x-on:click="$openModal('cardModal')" primary />
    </div>

    <!-- Table Component -->
    <div>
        @livewire('Tables.Catalogs.SeasonTable')
    </div>

    <!-- Edit Modal -->
    <x-w-modal-card title="Temporada" name="cardModal" wire:model="showCardModal">
        <form wire:submit.prevent="save">
            <x-w-input label="Nombre de la temporada" placeholder="Otoño-Invierno 2024, Primavera-Verano 2025, ..."
                wire:model="name" />

            <x-slot name="footer" class="flex justify-end gap-x-4">
                <x-w-button flat label="Cancelar" x-on:click="close" />
                <x-w-button primary label="Guardar" wire:click="save" />
            </x-slot>
        </form>
    </x-w-modal-card>
</div>
