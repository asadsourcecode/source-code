<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    protected $casts = [
        'meta'   => 'array',
        'status' => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }

    // Safely get any meta field with optional fallback
    public function meta(string $key, mixed $default = null): mixed
    {
        return ($this->meta ?? [])[$key] ?? $default;
    }
}
