<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductSection extends Model
{
    protected $guarded = [];

    protected $casts = [
        'price'          => 'decimal:2',
        'sale_price'     => 'decimal:2',
        'ebook_price'    => 'decimal:2',
        'hardcopy_price' => 'decimal:2',
        'is_available'   => 'boolean',
        'is_published'   => 'boolean',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'section_id')->where('status', true)->orderBy('id');
    }
}
