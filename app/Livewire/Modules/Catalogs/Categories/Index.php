<?php

namespace App\Livewire\Modules\Catalogs\Categories;

use App\Models\Category;
use Illuminate\Support\Str;
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
        $category = Category::findOrFail($id);
        $this->name = $category->name;
        $this->showCardModal = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:categories,name,'.$this->id.',id',
        ]);
        try {
            $slug = Str::slug($this->name);

            Category::updateOrCreate([
                'id' => $this->id,
            ], [
                'name' => $this->name,
                'slug' => $slug,
            ]);
            $this->notification('success', 'Éxito', 'Categoría guardada correctamente');
            $this->dispatch('pg:eventRefresh-categoryTable');
            $this->showCardModal = false;
            $this->reset(['name', 'id']);
        } catch (\Exception $e) {
            $this->notification('danger', 'Error', 'Categoria no creada');
        }
    }

    public function notification($type, $title, $message)
    {
        $this->dispatch(
            'notify',
            variant: $type,
            sender: [
                'name' => 'Jack Ellis',
                'avatar' => 'https://penguinui.s3.amazonaws.com/component-assets/avatar-2.webp',
            ],
            title: $title,
            message: $message
        );
    }

    public function render()
    {
        return view('livewire.modules.catalogs.categories.index');
    }
}
