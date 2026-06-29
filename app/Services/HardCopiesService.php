<?php

namespace App\Services;

use App\Models\Page;

class HardCopiesService
{
    private const DEFAULTS = [
        'list_heading'  => 'We recommend buying Hard Copies If:',
        'bullet_items'  => '<ul><li>You prefer printed books.</li><li>You are a student and want to be able to write directly in your book. (Note, students only need to purchase the Textbook and Poster).</li><li>You want to reduce overall screen time.</li><li>You opt for a one time purchase of the edition to save money in the long run.</li><li>You are not comfortable with reading and/or teaching from a computer or iPad.</li><li>You want to purchase regular books, click hard copy.</li></ul>',
        'alert_text'    => 'To see your selected hard copy/book price, please click the "Hard copy" link.',
        'shipping_text' => 'Shipping/Transportation charges apply.',
        'left_label'    => 'Textbooks for Primary',
        'right_label'   => "Teacher's Guides for Primary",
    ];

    public function getData(): array
    {
        $page = Page::where('slug', 'hard-copies')->first();

        $listHeading  = $page?->meta('list_heading',  self::DEFAULTS['list_heading'])  ?? self::DEFAULTS['list_heading'];
        $alertText    = $page?->meta('alert_text',    self::DEFAULTS['alert_text'])    ?? self::DEFAULTS['alert_text'];
        $shippingText = $page?->meta('shipping_text', self::DEFAULTS['shipping_text']) ?? self::DEFAULTS['shipping_text'];
        $leftLabel    = $page?->meta('left_label',    self::DEFAULTS['left_label'])    ?? self::DEFAULTS['left_label'];
        $rightLabel   = $page?->meta('right_label',   self::DEFAULTS['right_label'])   ?? self::DEFAULTS['right_label'];

        $bulletItems = $page?->meta('bullet_items') ?: self::DEFAULTS['bullet_items'];

        $bookImage = $page?->featured_image
            ? asset('admin-storage/' . $page->featured_image)
            : asset('images/save-store-2.avif');

        $checkoutImage = $page?->meta('checkout_image')
            ? asset('admin-storage/' . $page->meta('checkout_image'))
            : asset('images/checkout-img.webp');

        $leftImage = $page?->meta('left_image')
            ? asset('admin-storage/' . $page->meta('left_image'))
            : asset('images/multiple-books.webp');

        $rightImage = $page?->meta('right_image')
            ? asset('admin-storage/' . $page->meta('right_image'))
            : asset('images/teachers-guide.webp');

        return compact(
            'page', 'listHeading', 'bulletItems',
            'alertText', 'shippingText',
            'leftLabel', 'rightLabel',
            'bookImage', 'checkoutImage', 'leftImage', 'rightImage'
        );
    }
}
