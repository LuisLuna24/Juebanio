<?php

namespace App\Livewire\Modules\Products\Models;

use App\Models\ProductModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{

    use WithPagination, WithFileUploads;

    public $showCardModal = false;
    public string $name;
    public $sku;
    public string $description;
    public int $category_id;
    public int $season_id;
    public int $id;
    public $image;
    public $existingImage;

    public function edit($id)
    {
        $this->id = $id;
        $model = ProductModel::findOrFail($id);
        
        $this->name = $model->name;
        // Agregué el sku que estaba en tu método save pero faltaba aquí
        $this->sku = $model->sku; 
        $this->description = $model->description;
        $this->category_id = $model->category_id;
        $this->season_id = $model->season_id;
        
        $this->existingImage = $model->cover_image; 
        
        $this->reset('image'); 
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'season_id' => 'required|exists:seasons,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,webp|max:1024', // 1MB Max y restringido a formatos específicos
        ]);

        DB::beginTransaction();

        try {
            $rutaImagen = null;
            $isUpdate = !empty($this->id);

            if ($this->image) {
                $extension = $this->image->getClientOriginalExtension();

                $nombreSeguro = Str::slug($this->name) . '-' . Str::random(6) . '.' . $extension;

                $rutaImagen = $this->image->storeAs('productos', $nombreSeguro, 'public');
            }

            if ($isUpdate) {
                $model = ProductModel::findOrFail($this->id);

                // Si se subió una nueva imagen, eliminar la antigua
                if ($rutaImagen && $model->cover_image) {
                    if (Storage::disk('public')->exists($model->cover_image)) {
                        Storage::disk('public')->delete($model->cover_image);
                    }
                }

                $model->update([
                    'name' => $this->name,
                    'slug' => Str::slug($this->name),
                    'sku' => $this->sku,
                    'description' => $this->description,
                    'category_id' => $this->category_id,
                    'season_id' => $this->season_id,
                    'cover_image' => $rutaImagen ?? $model->cover_image,
                ]);

                $message = 'Producto actualizado correctamente';
            } else {
                $model = ProductModel::create([
                    'name' => $this->name,
                    'slug' => Str::slug($this->name),
                    'sku' => $this->sku,
                    'description' => $this->description,
                    'category_id' => $this->category_id,
                    'season_id' => $this->season_id,
                    'status' => 1,
                    'cover_image' => $rutaImagen,
                ]);

                $message = 'Producto creado correctamente';
            }

            DB::commit();
            $this->reset(['name', 'sku', 'description', 'category_id', 'season_id', 'image', 'existingImage', 'id']);
            $this->showCardModal = false;
            $this->notification('success', 'Éxito', $message);
        } catch (\Exception $e) {
            DB::rollBack();
            $this->notification('error', 'Error', 'Ocurrió un error al guardar el producto.');
        }
    }

    public function toggleStatus($modelId)
    {
        $model = ProductModel::findOrFail($modelId);
        $model->status = !$model->status;
        $model->save();

        $this->notification('success', 'Éxito', 'Estado del producto actualizado correctamente.');
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
        $models = ProductModel::with('category', 'season')->paginate(10);

        return view('livewire.modules.products.models.index', compact('models'));
    }
}
