<?php

namespace App\Services;

use App\Models\Page;

class CounsellingService
{
    public function getData(): array
    {
        $page = Page::where('slug', 'counselling')->first();

        return compact('page');
    }
}
