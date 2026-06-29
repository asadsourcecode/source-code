<?php

namespace App\Services;

use App\Models\Page;

class AudioStoriesService
{
    public function getData(): array
    {
        $page = Page::where('slug', 'audio-stories')->first();

        return compact('page');
    }
}
