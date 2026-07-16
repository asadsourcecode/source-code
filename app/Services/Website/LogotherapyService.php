<?php

namespace App\Services\Website;

use App\Models\Page;

class LogotherapyService
{
    private const DEFAULTS = [
        'intro_text_1' => 'Logotherapy is a form of psychotherapy developed by Viktor Frankl, an Austrian psychiatrist and Holocaust survivor. It centres on the belief that the primary human drive is not pleasure (as Freud proposed) or power (as Adler argued), but the search for meaning in life.',
        'intro_text_2' => 'Frankl observed — both in his own experience in concentration camps and in clinical practice — that those who could find meaning, even in suffering, were more resilient and more capable of enduring hardship. His seminal work, "Man\'s Search for Meaning," has become one of the most influential books of the 20th century.',
        'intro_text_3' => 'Within the framework of ICE Publishers, Logotherapy principles underpin the character-building curriculum. Children are guided to discover purpose through personal values, responsibility, and the freedom to choose their response in any given situation.',
        'quote_heading' => 'Insights from Logotherapy',
        'closing_text' => '"Everything can be taken from a man but one thing: the last of the human freedoms — to choose one\'s attitude in any given set of circumstances, to choose one\'s own way."',
        'closing_author' => '— Viktor Frankl',
    ];

    public function getData(): array
    {
        $page = Page::where('slug', 'logotherapy')->first();

        $introText1   = $page?->meta('intro_text_1',   self::DEFAULTS['intro_text_1'])   ?? self::DEFAULTS['intro_text_1'];
        $introText2   = $page?->meta('intro_text_2',   self::DEFAULTS['intro_text_2'])   ?? self::DEFAULTS['intro_text_2'];
        $introText3   = $page?->meta('intro_text_3',   self::DEFAULTS['intro_text_3'])   ?? self::DEFAULTS['intro_text_3'];
        $quoteHeading = $page?->meta('quote_heading',  self::DEFAULTS['quote_heading'])  ?? self::DEFAULTS['quote_heading'];
        $closingText  = $page?->meta('closing_text',   self::DEFAULTS['closing_text'])   ?? self::DEFAULTS['closing_text'];
        $closingAuthor = $page?->meta('closing_author', self::DEFAULTS['closing_author']) ?? self::DEFAULTS['closing_author'];

        $frankImage = ($page?->meta('frank_image'))
            ? asset('admin-storage/' . $page->meta('frank_image'))
            : asset('images/frank_1.png');

        $boyImage = ($page?->meta('boy_image'))
            ? asset('admin-storage/' . $page->meta('boy_image'))
            : asset('images/boy-logoth-blnd.jpg');

        return compact(
            'page',
            'introText1', 'introText2', 'introText3',
            'quoteHeading', 'closingText', 'closingAuthor',
            'frankImage', 'boyImage',
        );
    }
}
