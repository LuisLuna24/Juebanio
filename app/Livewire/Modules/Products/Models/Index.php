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
    public bool $showDeleteModal = false;
    public $selectedModelId = null;
    public string $name;
    public $sku;
    public $price_bace;
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
        $this->price_bace = $model->price_bace;
        $this->description = $model->description ?? '';
        $this->category_id = $model->category_id;
        $this->season_id = $model->season_id;

        $this->existingImage = $model->cover_image;

        $this->reset('image');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:product_models,sku' . (isset($this->id) ? ',' . $this->id . ',id' : null),
            'price_bace' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'season_id' => 'required|exists:seasons,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ]);

        $isUpdate = !empty($this->id);
        $model = $isUpdate ? ProductModel::findOrFail($this->id) : null;

        $rutaImagen = $this->storeImage($model?->cover_image);

        DB::beginTransaction();

        try {
            $data = [
                'name'        => $this->name,
                'slug'        => Str::slug($this->name),
                'sku'         => $this->sku,
                'description' => $this->description ?? null,
                'category_id' => $this->category_id,
                'season_id'   => $this->season_id,
                'cover_image' => $rutaImagen ?? $model?->cover_image,
                'price_bace'  => $this->price_bace,
            ];

            if ($isUpdate) {
                $model->update($data);
                $message = 'Producto actualizado correctamente';
            } else {
                $data['status'] = 1;
                $model = ProductModel::create($data);
                $message = 'Producto creado correctamente';
            }

            DB::commit();

            $this->resetForm();
            $this->showCardModal = false;
            $this->notification('success', 'Éxito', $message);
        } catch (\Exception $e) {
            DB::rollBack();

            // Si algo falla después de subir la imagen nueva, la eliminamos para no dejar huérfanos
            if ($rutaImagen && Storage::disk('public')->exists($rutaImagen)) {
                Storage::disk('public')->delete($rutaImagen);
            }

            report($e); // registra el error real en logs, útil para depurar
            $this->notification('error', 'Error', 'Ocurrió un error al guardar el producto.');
        }
    }

    private function storeImage(?string $oldImage): ?string
    {
        if (!$this->image) {
            return null;
        }

        $extension = $this->image->getClientOriginalExtension();
        $nombreSeguro = Str::slug($this->name) . '-' . Str::random(6) . '.' . $extension;

        $ruta = $this->image->storeAs('productos', $nombreSeguro, 'public');

        if (!$ruta || !Storage::disk('public')->exists($ruta)) {
            throw new \RuntimeException('No se pudo guardar la imagen en el disco público.');
        }

        // Borra la imagen anterior solo si el guardado de la nueva fue exitoso
        if ($oldImage && Storage::disk('public')->exists($oldImage)) {
            Storage::disk('public')->delete($oldImage);
        }

        return $ruta;
    }

    public function openDeleteModal($modelId): void
    {
        $this->selectedModelId = (int) $modelId;
        $this->showDeleteModal = true;
    }

    public function closeDeleteModal(): void
    {
        $this->showDeleteModal = false;
        $this->selectedModelId = null;
    }

    public function delete($modelId = null)
    {
        $modelId = $modelId ?? $this->selectedModelId;

        if (! $modelId) {
            return;
        }

        $model = ProductModel::findOrFail($modelId);

        // Eliminar la imagen asociada si existe
        if ($model->cover_image && Storage::disk('public')->exists($model->cover_image)) {
            Storage::disk('public')->delete($model->cover_image);
        }

        $model->delete();

        $this->closeDeleteModal();
        $this->notification('success', 'Éxito', 'Producto eliminado correctamente.');
    }

    public function resetForm()
    {
        $this->reset(['name', 'sku', 'description', 'category_id', 'season_id', 'image', 'existingImage', 'id', 'price_bace']);
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
        $models = ProductModel::with('category', 'season')->paginate(12);

        return view('livewire.modules.products.models.index', compact('models'));
    }
}
