<?php

namespace App\Livewire\Modules\Products\Models;

use App\Models\ProductModel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $models = ProductModel::with('category', 'season')->where('status', 1)->paginate(10);

        return view('livewire.modules.products.models.index', compact('models'));
    }
}
