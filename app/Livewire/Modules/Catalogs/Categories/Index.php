<?php

namespace App\Livewire\Modules\Catalogs\Categories;

use App\Models\Category;
use Livewire\Component;
use \Illuminate\Support\Str;

class Index extends Component
{

    public string $name;
    public ?int $id;
    public function create() {}

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:categories,name ' . $this->id . ',id',
        ]);
        try {
            $slug = Str::slug($this->name);

            Category::updateOrCreate([
                'id' => $this->id,
            ], [
                'name' => $this->name,
                'slug' => $slug,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.modules.catalogs.categories.index');
    }
}
