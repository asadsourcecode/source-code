<?php

namespace App\Services\Website;

use App\Models\Page;

class IntroductionService
{
    public function getData(): array
    {
        $page = Page::where('slug', 'introduction')->first();

        return compact('page');
    }
}
