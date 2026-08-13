<?php

namespace App\Livewire\Modules\Catalogs\Seasons;

use App\Models\Season;
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
        $category = Season::findOrFail($id);
        $this->name = $category->name;
        $this->showCardModal = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:seasons,name,'.$this->id.',id',
        ]);
        try {

            Season::updateOrCreate([
                'id' => $this->id,
            ], [
                'name' => $this->name,
            ]);
            $this->notification('success', 'Éxito', 'Temporada guardada correctamente');
            $this->dispatch('pg:eventRefresh-seasonTable');
            $this->showCardModal = false;
            $this->reset(['name', 'id']);
        } catch (\Exception $e) {
            $this->notification('danger', 'Error', 'Temporada no creada');
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
        return view('livewire.modules.catalogs.seasons.index');
    }
}
