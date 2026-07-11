<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'price'             => 'decimal:2',
        'sale_price'        => 'decimal:2',
        'ebook_price'       => 'decimal:2',
        'hardcopy_price'    => 'decimal:2',
        'pages'             => 'integer',
        'cost_per_item'     => 'decimal:2',
        'weight'            => 'decimal:2',
        'charge_taxes'      => 'boolean',
        'track_quantity'    => 'boolean',
        'allow_oversell'    => 'boolean',
        'requires_shipping' => 'boolean',
        'status'            => 'boolean',
        'tags'              => 'array',
        'images'            => 'array',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(ProductSection::class, 'section_id');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }

    public function imageUrl(?string $fallback = null): string
    {
        $images = $this->images ?? [];
        $first  = $images[0] ?? null;

        if ($first) {
            return str_starts_with($first, 'http')
                ? $first
                : asset('admin-storage/' . $first);
        }

        if ($this->featured_image) {
            return asset('admin-storage/' . $this->featured_image);
        }

        return $fallback ?? asset('images/placeholder.jpg');
    }
}
