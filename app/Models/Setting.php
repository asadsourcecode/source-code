<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    public static function site(): ?self
    {
        return static::query()
            ->where('status', true)
            ->orderBy('id')
            ->first();
    }
}
