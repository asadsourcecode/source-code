<?php

namespace App\Services;

use App\Models\Page;

class HomeschoolingService
{
    public function getData(): array
    {
        $page = Page::where('slug', 'homeschooling')->first();

        return compact('page');
    }
}
