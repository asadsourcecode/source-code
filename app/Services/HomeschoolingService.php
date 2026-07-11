<?php

namespace App\Services;

use App\Models\Page;

class HomeschoolingService
{
    public function getData(): array
    {
        $page = Page::active()->where('slug', 'feature-homeschooling')->firstOrFail();

        $featuredImage = $page->featured_image
            ? asset('admin-storage/' . $page->featured_image)
            : asset('images/schoolicon.webp');

        $introPara1 = $page->meta('intro_para_1', 'As our purpose is to familiarise the Muslim community with character education approaches as part of raising children, the course books are now also made available for home-schooling upon enormous requests. Separate instructions are given for this purpose in the books, along with specifications of how many participants the activity requires.');

        $introPara2 = $page->meta('intro_para_2', 'Parents wishing to home-school their kids, relatives, etc., can purchase hard copies of the Educators box and Textbooks for the students through our website by <a href="' . route('hard-copies') . '" class="hs-link">clicking here</a>.');

        $helpingHandImage = $page->meta('helping_hand_image')
            ? asset('admin-storage/' . $page->meta('helping_hand_image'))
            : asset('images/helpinghand.webp');

        $laptopText = $page->meta('laptop_text', 'The digital books are reserved for our professional online teachers to ensure quality and supervision');

        $laptopImage = $page->meta('laptop_image')
            ? asset('admin-storage/' . $page->meta('laptop_image'))
            : asset('images/claptop.webp');

        return compact(
            'page',
            'featuredImage',
            'introPara1',
            'introPara2',
            'helpingHandImage',
            'laptopText',
            'laptopImage',
        );
    }
}
