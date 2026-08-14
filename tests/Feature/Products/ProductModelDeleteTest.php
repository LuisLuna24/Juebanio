<?php

use App\Livewire\Modules\Products\Models\Index as ProductModelsIndex;
use App\Models\Category;
use App\Models\ProductModel;
use App\Models\Season;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

it('opens the delete modal with the selected product id and deletes the product', function () {
    $category = Category::create([
        'name' => 'Ropa',
        'slug' => 'ropa',
        'status' => true,
    ]);

    $season = Season::create([
        'name' => 'Verano',
        'status' => true,
    ]);

    $product = ProductModel::create([
        'name' => 'Toalla de playa',
        'slug' => 'toalla-de-playa',
        'sku' => 'TOA-001',
        'description' => 'Toalla de algodón',
        'category_id' => $category->id,
        'season_id' => $season->id,
        'status' => true,
    ]);

    Livewire::test(ProductModelsIndex::class)
        ->call('openDeleteModal', $product->id)
        ->assertSet('selectedModelId', $product->id)
        ->assertSet('showDeleteModal', true)
        ->call('delete')
        ->assertHasNoErrors();

    expect(ProductModel::find($product->id))->toBeNull();
});

it('stores the product image in the productos folder and exposes a public url', function () {
    Storage::fake('public');

    $category = Category::create([
        'name' => 'Ropa',
        'slug' => 'ropa',
        'status' => true,
    ]);

    $season = Season::create([
        'name' => 'Verano',
        'status' => true,
    ]);

    Livewire::test(ProductModelsIndex::class)
        ->set('name', 'Toalla de playa')
        ->set('sku', 'TOA-002')
        ->set('description', 'Toalla de algodón')
        ->set('category_id', $category->id)
        ->set('season_id', $season->id)
        ->set('image', UploadedFile::fake()->image('toalla.jpg', 600, 600))
        ->call('save')
        ->assertHasNoErrors();

    $product = ProductModel::latest()->first();

    expect($product)->not->toBeNull()
        ->and($product->cover_image)->toStartWith('productos/')
        ->and(Storage::disk('public')->exists($product->cover_image))->toBeTrue()
        ->and($product->image_url)->toStartWith('/storage/productos/');
});
