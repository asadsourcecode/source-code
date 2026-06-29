<?php

namespace App\Services;

use App\Models\Page;

class TeachersTrainingService
{
    public function getData(): array
    {
        $page = Page::where('slug', 'teachers-training')->first();

        return compact('page');
    }
}
