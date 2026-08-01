<x-layouts::app :title="__('Componentes')">
    <div class="px-6 py-3 flex items-center justify-between border-b-2 border-gray-600">
        <h1 class="text-2xl font-bold">Componentes</h1>
    </div>
    <div class="py-3">
        @livewire('modules.catalogs.components.index')
    </div>
</x-layouts::app>
