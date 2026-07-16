<?php

namespace App\Services\Website;

use App\Models\Page;

class ContactService
{
    public function getData(): array
    {
        $page = Page::active()->where('slug', 'contact')->firstOrFail();

        $bgImage = $page->meta('bg_image')
            ? asset('admin-storage/' . $page->meta('bg_image'))
            : asset('images/WhatsApp_Image_2024-10-21_at_17.35.56.webp');

        $emailLine   = $page->meta('email_line', 'Email us at: info@characterbuilding.education');
        $formPrompt  = $page->meta('form_prompt', 'Or use the Form below:');
        $col1Heading = $page->meta('col1_heading', 'International customers');
        $col1Text    = $page->meta('col1_text', '0045 50106941 (Only WhatsApp calls)');
        $col2Heading = $page->meta('col2_heading', 'Pakistan');
        $col2Content = $page->meta('col2_content', '<p>Urdu course books available on printing on demand.</p><p>Monday to Sunday: 5pm to 9 pm.</p><p><strong>Note:</strong> For pakistani customers who are unable to check out with their credit cards, please contact your Banks to enable International Transactions</p>');
        $col3Heading = $page->meta('col3_heading', 'Urdu website');
        $col3Content = $page->meta('col3_content', '<p>Urdu website to be launched soon.</p><p>For inquiries about Urdu syllabus or purchase</p><p>contact: <strong>0092 3158200834</strong> (for Pakistani Customers)</p>');
        $formIntro   = $page->meta('form_intro', 'For questions and suggestions, please get in touch with us at:');

        return compact(
            'page',
            'bgImage', 'emailLine', 'formPrompt',
            'col1Heading', 'col1Text',
            'col2Heading', 'col2Content',
            'col3Heading', 'col3Content',
            'formIntro',
        );
    }
}
