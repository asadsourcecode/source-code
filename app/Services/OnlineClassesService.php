<?php

namespace App\Services;

use App\Models\Page;

class OnlineClassesService
{
    private const DEFAULTS = [
        'intro_heading'   => 'We recommend Online Classes If:',
        'bullet_items'    => '<ul><li>You prefer learning from certified ICE instructors.</li><li>You want a structured, guided learning experience.</li><li>You are a homeschooling parent looking for professional support.</li><li>You want live, interactive sessions with real-time feedback.</li><li>You prefer flexible scheduling that fits your timetable.</li><li>You want to track your child\'s progress with regular assessments.</li></ul>',
        'cta_button_text' => 'View Online Classes Schedule',
        'cta_button_url'  => '#',
    ];

    public function getData(): array
    {
        $page = Page::where('slug', 'online-classes')->first();

        $introHeading  = $page?->meta('intro_heading', self::DEFAULTS['intro_heading'])   ?? self::DEFAULTS['intro_heading'];
        $ctaButtonText = $page?->meta('cta_button_text', self::DEFAULTS['cta_button_text']) ?? self::DEFAULTS['cta_button_text'];
        $ctaButtonUrl  = $page?->meta('cta_button_url', self::DEFAULTS['cta_button_url'])   ?? self::DEFAULTS['cta_button_url'];

        $bulletItems = $page?->meta('bullet_items') ?: self::DEFAULTS['bullet_items'];

        $mainImage = $page?->meta('main_image')
            ? asset('admin-storage/' . $page->meta('main_image'))
            : asset('images/monthly-blog-post.webp');

        $featuredImage = $page?->featured_image
            ? asset('admin-storage/' . $page->featured_image)
            : asset('images/mind-body-spirit.webp');

        return compact('page', 'introHeading', 'bulletItems', 'ctaButtonText', 'ctaButtonUrl', 'mainImage', 'featuredImage');
    }
}
