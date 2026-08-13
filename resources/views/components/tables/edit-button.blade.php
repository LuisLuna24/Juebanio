<x-w-button xs icon="pencil" primary label="Editar" wire:click="$dispatch('edit', { id: {{ $row->id }} })" />
