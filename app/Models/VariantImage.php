<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VariantImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_variant_id',
        'image_path',
        'sort_order',
    ];

    public function variant(): BelongsTo
    {
        return $this->belongsTo(ModelVariant::class, 'model_variant_id');
    }
}
