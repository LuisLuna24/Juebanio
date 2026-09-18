<?php

namespace App\Livewire\Home;

use App\Models\Category;
use App\Models\ProductModel;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCatalog extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url(as: 'categoria')]
    public ?string $category = null;

    #[Url(as: 'min_precio')]
    public ?float $minPrice = null;

    #[Url(as: 'max_precio')]
    public ?float $maxPrice = null;

    #[Url(as: 'materiales')]
    public array $selectedMaterials = [];

    #[Url(as: 'disponibles')]
    public bool $onlyAvailable = false;

    #[Url(as: 'ordenar')]
    public string $sort = 'newest';

    public int $perPage = 24;

    public function selectCategory(?string $categorySlug): void
    {
        $this->category = $categorySlug;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategory()
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
            'category',
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
                'colors',
            ])
            ->where('status', 1)
            ->whereHas('season', fn ($sq) => $sq->where('status', 1))
            ->withCount('variants');

        $query->when(
            $this->search,
            fn ($q) => $q->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                    ->orWhere('material', 'like', "%{$this->search}%");
            })
        );

        $query->when(
            $this->category,
            fn ($q) => $q->whereHas('category', fn ($cq) => $cq->where('slug', $this->category))
        );

        $query->when(
            $this->minPrice,
            fn ($q) => $q->where('price_bace', '>=', $this->minPrice)
        );

        $query->when(
            $this->maxPrice,
            fn ($q) => $q->where('price_bace', '<=', $this->maxPrice)
        );

        $query->when(
            count($this->selectedMaterials),
            fn ($q) => $q->whereIn('material', $this->selectedMaterials)
        );

        $query->when(
            $this->onlyAvailable,
            fn ($q) => $q->whereHas('variants', fn ($vq) => $vq->where('stock', '>', 0))
        );

        $query->when(
            $this->sort === 'price_asc',
            fn ($q) => $q->orderBy('price_bace')
        );

        $query->when(
            $this->sort === 'price_desc',
            fn ($q) => $q->orderByDesc('price_bace')
        );

        $query->when(
            $this->sort === 'name',
            fn ($q) => $q->orderBy('name')
        );

        if ($this->sort === 'newest') {
            $query->latest();
        }

        $products = $query->paginate($this->perPage);

        $categories = Category::withCount([
            'productModels' => function ($q) {
                $q->where('status', 1)
                    ->whereHas('season', fn ($sq) => $sq->where('status', 1));
            },
        ])
            ->whereHas('productModels', function ($q) {
                $q->where('status', 1)
                    ->whereHas('season', fn ($sq) => $sq->where('status', 1));
            })
            ->orderBy('name')
            ->get();

        $materials = ProductModel::where('status', 1)
            ->whereHas('season', fn ($sq) => $sq->where('status', 1))
            ->whereNotNull('material')
            ->where('material', '!=', '')
            ->distinct()
            ->pluck('material');

        $totalProducts = ProductModel::where('status', 1)
            ->whereHas('season', fn ($sq) => $sq->where('status', 1))
            ->count();

        return view('livewire.home.product-catalog', [
            'products' => $products,
            'categories' => $categories,
            'materials' => $materials,
            'totalProducts' => $totalProducts,
        ]);
    }
}
