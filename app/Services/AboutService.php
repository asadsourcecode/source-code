<?php

namespace App\Services;

use App\Models\Page;

class AboutService
{
    public function getData(): array
    {
        $page = Page::active()->where('slug', 'about')->firstOrFail();

        $bgImage       = $page->banner_image   ? asset('admin-storage/' . $page->banner_image)   : asset('images/about_bg_1.webp');
        $bookImage     = $page->featured_image ? asset('admin-storage/' . $page->featured_image) : asset('images/book_2.jpg');
        $mainContent   = $page->content;
        $authorContent = $page->meta('author_content');

        return compact('page', 'bgImage', 'bookImage', 'mainContent', 'authorContent');
    }
}
