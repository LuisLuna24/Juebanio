<?php

namespace App\Livewire\Modules\Catalogs\Components;

use App\Models\Component as ModelsComponent;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public string $name = '';

    public ?int $id = null;

    public $showCardModal = false;

    #[On('edit')]
    public function edit($id)
    {
        $this->id = $id;
        $category = ModelsComponent::findOrFail($id);
        $this->name = $category->name;
        $this->showCardModal = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:components,name,'.$this->id.',id',
        ]);
        try {

            ModelsComponent::updateOrCreate([
                'id' => $this->id,
            ], [
                'name' => $this->name,
            ]);
            $this->notification('success', 'Éxito', 'Componente guardado correctamente');
            $this->dispatch('pg:eventRefresh-componentTable');
            $this->showCardModal = false;
            $this->reset(['name', 'id']);
        } catch (\Exception $e) {
            $this->notification('danger', 'Error', 'Componente no creado');
        }
    }

    public function notification($type, $title, $message)
    {
        $this->dispatch(
            'notify',
            variant: $type,
            title: $title,
            message: $message
        );
    }

    public function render()
    {
        return view('livewire.modules.catalogs.components.index');
    }
}
