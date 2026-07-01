<?php

namespace App\Services;

use App\Models\Page;

class ContactService
{
    public function getData(): array
    {
        $page = Page::where('slug', 'contact')->first();

        return compact('page');
    }
}
