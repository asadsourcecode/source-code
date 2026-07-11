<?php

namespace App\Services;

use App\Models\Page;

class MethodologyService
{
    public function getData(): array
    {
        $page = Page::active()->where('slug', 'methodology')->firstOrFail();

        $bgStyle = ($page->meta('bg_color_mode') === 'custom' && $page->meta('bg_color_top'))
            ? 'background-color: ' . $page->meta('bg_color_top') . '; background-image: none;'
            : '';

        $metha1Image = $page->meta('metha_1_image')
            ? asset('admin-storage/' . $page->meta('metha_1_image'))
            : null;

        $prefaceHeading  = $page->meta('preface_heading', 'PREFACE AND THE THREE HYPOTHESES OF THE COURSE');
        $prefaceSubtext  = $page->meta('preface_subtext', 'The approach of this Character Education School Course can be summarised through the following aims/hypotheses:');

        // Support new Repeater format (meta.hypotheses) and fall back to legacy keys
        $hypothesesMeta = $page->meta('hypotheses');
        if ($hypothesesMeta && is_array($hypothesesMeta)) {
            $hypotheses = array_values(array_filter(array_column($hypothesesMeta, 'content')));
        } else {
            $hypotheses = array_values(array_filter([
                $page->meta('hypothesis_1'),
                $page->meta('hypothesis_2'),
                $page->meta('hypothesis_3'),
            ]));
        }

        $hypotheses = array_map(fn ($h) => rtrim(preg_replace('/(\s*<br\s*\/?>\s*)+$/i', '', trim($h))), $hypotheses);

        $hypothesesClose = $page->meta('hypotheses_closing', 'This character-building Course is developed to help guide the new generation through the jungle of life, which can be very deceitful, especially if one is not aware of "the true rules of the game" and what life is truly about in its essence.');

        $image1 = $page->meta('image_1')
            ? asset('admin-storage/' . $page->meta('image_1'))
            : '//characterbuilding.education/cdn/shop/files/orignal_739d8fe5-f65c-43b7-893a-74d2367ef828.png?v=1725538717&width=2048';

        $objectiveText      = $page->meta('objective_text', 'The main objective of ICE Publishers is to provide some fundamental Islāmic guidance and enlightenment throughout the crucial years of development in a way that most children and youngsters can understand, grasp and adapt effectively.');
        $objectiveHighlight = $page->meta('objective_highlight', 'This aim is measured by whether and to what extent the student is able to recognise right/constructive from wrong/destructive and how conscious they appear to be about the test of life.');

        $image2 = $page->meta('image_2')
            ? asset('admin-storage/' . $page->meta('image_2'))
            : '//characterbuilding.education/cdn/shop/files/quit.png?v=1725539114&width=2048';

        return compact(
            'page',
            'bgStyle', 'metha1Image',
            'prefaceHeading', 'prefaceSubtext',
            'hypotheses', 'hypothesesClose',
            'image1',
            'objectiveText', 'objectiveHighlight',
            'image2',
        );
    }
}
