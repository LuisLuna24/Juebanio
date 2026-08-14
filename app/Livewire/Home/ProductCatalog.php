<?php

namespace App\Livewire\Home;

use App\Models\Category;
use App\Models\ProductModel;
use Livewire\Component;


class ProductCatalog extends Component
{
    public ?int $categoryId = null;

    public function selectCategory(?int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function render()
    {
        $products = ProductModel::query()
            ->whereHas('season', fn($q) => $q->where('status', 1))
            ->where('status', 1)
            ->when($this->categoryId, fn($q) => $q->where('category_id', $this->categoryId))
            ->withCount('variants')
            ->with(['category', 'colors.variants'])
            ->latest()
            ->get();

        $categories = Category::whereHas('productModels', function ($q) {
            $q->whereHas('season', fn($sq) => $sq->where('status', 1))
                ->where('status', 1);
        })->get();

        return view('livewire.home.product-catalog', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
