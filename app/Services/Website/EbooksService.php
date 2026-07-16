<?php

namespace App\Services\Website;

use App\Models\Page;

class EbooksService
{
    private const DEFAULTS = [
        'recommend_heading'   => 'We recommend buying eBooks (soft copies) If:',
        'bullet_items'        => '<ul><li>You want to save storage.</li><li>You want the budget friendly option.</li><li>You want to ensure having the latest version of the course books to profit the most as they are updated regularly by ICE Publishers online.</li><li>You are an educator and want to teach the course online.</li><li>You don\'t like keeping hold of books after a grade or course is completed.</li><li>You want to be able to zoom the book content according to preferred size.</li></ul>',
        'catalog_button_text' => 'View full eBooks catalog',
        'catalog_button_url'  => '/pricing',
    ];

    public function getData(): array
    {
        $page = Page::where('slug', 'ebooks')->first();

        $recommendHeading  = $page?->meta('recommend_heading', self::DEFAULTS['recommend_heading'])  ?? self::DEFAULTS['recommend_heading'];
        $catalogButtonText = $page?->meta('catalog_button_text', self::DEFAULTS['catalog_button_text']) ?? self::DEFAULTS['catalog_button_text'];
        $catalogButtonUrl  = $page?->meta('catalog_button_url');
        if (!$catalogButtonUrl || $catalogButtonUrl === '#') {
            $catalogButtonUrl = self::DEFAULTS['catalog_button_url'];
        }

        $bulletItems = $page?->meta('bullet_items') ?: self::DEFAULTS['bullet_items'];

        $bgStyle = $page?->meta('bg_image')
            ? 'background-image: url("' . asset('admin-storage/' . $page->meta('bg_image')) . '"); background-size: 100% 100%; background-repeat: no-repeat;'
            : '';

        $mainImage = $page?->meta('main_image')
            ? asset('admin-storage/' . $page->meta('main_image'))
            : asset('images/education_system_1.webp');

        $boyImage = $page?->meta('boy_image')
            ? asset('admin-storage/' . $page->meta('boy_image'))
            : asset('images/9866_1.png');

        return compact('page', 'bgStyle', 'recommendHeading', 'bulletItems', 'catalogButtonText', 'catalogButtonUrl', 'mainImage', 'boyImage');
    }
}
