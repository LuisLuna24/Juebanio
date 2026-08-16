<?php

namespace App\Livewire\Home;

use App\Models\Category;
use App\Models\ProductModel;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCatalog extends Component
{
    use WithPagination;

    public string $search = '';

    public ?int $categoryId = null;

    public ?float $minPrice = null;

    public ?float $maxPrice = null;

    public array $selectedMaterials = [];

    public bool $onlyAvailable = false;

    public string $sort = 'newest';

    public int $perPage = 24;

    public function selectCategory(?int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategoryId()
    {
        $this->resetPage();
    }

    public function updatedMinPrice()
    {
        $this->resetPage();
    }

    public function updatedMaxPrice()
    {
        $this->resetPage();
    }

    public function updatedSelectedMaterials()
    {
        $this->resetPage();
    }

    public function updatedOnlyAvailable()
    {
        $this->resetPage();
    }

    public function updatedSort()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset([
            'search',
            'categoryId',
            'minPrice',
            'maxPrice',
            'selectedMaterials',
            'onlyAvailable',
        ]);

        $this->sort = 'newest';

        $this->resetPage();
    }

    public function render()
    {
        $query = ProductModel::query()
            ->with([
                'category',
                'colors'
            ])
            ->where('status', 1)
            ->whereHas('season', fn($sq) => $sq->where('status', 1))
            ->withCount('variants');

        $query->when(
            $this->search,
            fn($q) =>
            $q->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                    ->orWhere('material', 'like', "%{$this->search}%");
            })
        );

        $query->when(
            $this->categoryId,
            fn($q) =>
            $q->where('category_id', $this->categoryId)
        );

        $query->when(
            $this->minPrice,
            fn($q) =>
            $q->where('price_bace', '>=', $this->minPrice)
        );

        $query->when(
            $this->maxPrice,
            fn($q) =>
            $q->where('price_bace', '<=', $this->maxPrice)
        );

        $query->when(
            count($this->selectedMaterials),
            fn($q) =>
            $q->whereIn('material', $this->selectedMaterials)
        );

        $query->when(
            $this->onlyAvailable,
            fn($q) =>
            $q->whereHas('variants', fn($vq) => $vq->where('stock', '>', 0))
        );

        $query->when(
            $this->sort === 'price_asc',
            fn($q) =>
            $q->orderBy('price_bace')
        );

        $query->when(
            $this->sort === 'price_desc',
            fn($q) =>
            $q->orderByDesc('price_bace')
        );

        $query->when(
            $this->sort === 'name',
            fn($q) =>
            $q->orderBy('name')
        );

        if ($this->sort === 'newest') {
            $query->latest();
        }

        $products = $query->paginate($this->perPage);

        $categories = Category::withCount([
            'productModels' => function ($q) {
                $q->where('status', 1)
                    ->whereHas('season', fn($sq) => $sq->where('status', 1));
            }
        ])
            ->whereHas('productModels', function ($q) {
                $q->where('status', 1)
                    ->whereHas('season', fn($sq) => $sq->where('status', 1));
            })
            ->orderBy('name')
            ->get();

        $materials = ProductModel::where('status', 1)
            ->whereHas('season', fn($sq) => $sq->where('status', 1))
            ->whereNotNull('material')
            ->where('material', '!=', '')
            ->distinct()
            ->pluck('material');

        $totalProducts = ProductModel::where('status', 1)
            ->whereHas('season', fn($sq) => $sq->where('status', 1))
            ->count();

        return view('livewire.home.product-catalog', [
            'products' => $products,
            'categories' => $categories,
            'materials' => $materials,
            'totalProducts' => $totalProducts,
        ]);
    }
}
