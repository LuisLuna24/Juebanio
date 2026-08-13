<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function variants(): BelongsToMany
    {
        return $this->belongsToMany(ModelVariant::class, 'component_variant')
            ->withPivot('quantity', 'dimensions')
            ->withTimestamps();
    }
}
