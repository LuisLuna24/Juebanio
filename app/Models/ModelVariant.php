<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModelVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_color_id',
        'sku',
        'pieces_count',
        'price',
        'sale_price',
        'stock',
        'package_dimensions',
        'weight_grams',
        'main_image',
        'status',
    ];

    public function color(): BelongsTo
    {
        return $this->belongsTo(ModelColor::class, 'model_color_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(VariantImage::class);
    }

    public function components(): BelongsToMany
    {
        return $this->belongsToMany(Component::class, 'component_variant')
            ->withPivot('quantity', 'dimensions')
            ->withTimestamps();
    }
}
