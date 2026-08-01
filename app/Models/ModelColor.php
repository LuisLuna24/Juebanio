<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModelColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_model_id',
        'name',
        'hex_code',
        'swatch_image',
    ];

    public function productModel(): BelongsTo
    {
        return $this->belongsTo(ProductModel::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ModelVariant::class);
    }
}
