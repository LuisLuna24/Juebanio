<x-layouts::app :title="__('Temporadas')">
    <div class="px-6 py-3 flex items-center justify-between border-b-2 border-gray-600">
        <h1 class="text-2xl font-bold">Temporadas</h1>
    </div>
    <div class="py-3">
        @livewire('modules.catalogs.seasons.index')
    </div>
</x-layouts::app>
