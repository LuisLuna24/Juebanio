<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class ProductModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'season_id',
        'category_id',
        'name',
        'slug',
        'description',
        'material',
        'cover_image',
        'status',
    ];

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function colors(): HasMany
    {
        return $this->hasMany(ModelColor::class);
    }

    // Relación directa a todas las variantes pertenecientes a este modelo (vía colores)
    public function variants(): HasManyThrough
    {
        return $this->hasManyThrough(ModelVariant::class, ModelColor::class);
    }
}
