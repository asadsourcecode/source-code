<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'price'      => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }
}
