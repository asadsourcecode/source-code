<?php

namespace App\Services;

use App\Models\Page;

class AboutService
{
    public function getData(): array
    {
        $page = Page::active()->where('slug', 'about')->firstOrFail();
//        dd($page);

        $bgImage       = $page->banner_image   ? asset('admin-storage/' . $page->banner_image)   : asset('images/about_bg_1.webp');
        $bookImage     = $page->featured_image ? asset('admin-storage/' . $page->featured_image) : asset('images/book_2.jpg');
        $logoImage     = $page->meta('logo_image') ? asset('admin-storage/' . $page->meta('logo_image')) : asset('images/logo-Nw.webp');
        $mainContent   = $this->fixUrls($page->content);
        $authorContent = $this->fixUrls($page->meta('author_content'));

        return compact('page', 'bgImage', 'bookImage', 'logoImage', 'mainContent', 'authorContent');
    }

    private function fixUrls(?string $content): ?string
    {
        if (!$content) return $content;

        return preg_replace_callback('/href="([^"]+)"/', function ($matches) {
            $url = trim($matches[1], '\\/');
            if (!preg_match('/^https?:\/\//', $url)) {
                $url = 'https://' . $url;
            }
            return 'href="' . $url . '"';
        }, $content);
    }
}
