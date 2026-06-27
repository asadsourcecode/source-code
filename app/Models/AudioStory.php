<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AudioStory extends Model
{
    protected $table = 'audio_stories';

    protected $guarded = [];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }
}
