<?php

namespace App\Services;

use App\Models\Page;

class CounsellingService
{
    public function getData(): array
    {
        $page = Page::active()->where('slug', 'feature-counselling-therapy')->firstOrFail();

        $bg1Image = $page->meta('bg_image_1')
            ? asset('admin-storage/' . $page->meta('bg_image_1'))
            : asset('images/bulb-3.webp');

        $bg2Style = $page->meta('bg_image_2')
            ? 'background-image: url("' . asset('admin-storage/' . $page->meta('bg_image_2')) . '"); background-size: 100% 100%; background-repeat: no-repeat;'
            : '';

        $credentials = $page->meta('credentials', '<ul><li>Educational Psychologist from the Danish University of Education with a major in Psychological Counselling and an international diploma in Logotherapy and Existentialistic Analysis.</li><li>Sofia Adeem is an accredited member of the International Association of Logotherapy and Existentialistic Analysis.</li><li>Counselling Psychologist with over 20 years of experience dealing with the Muslim community.</li><li>Therapist. Focus on helping women, children, and youngsters develop better emotional skills and confidence in problem-solving.</li><li>Faith-based therapy. Guidance on coping with issues and challenges of life in coherence with Islamic guidelines and help of faith.</li><li>Consultancy in children\'s systematic development and training (tarbiyyah) using favourable pedagogical approaches.</li><li>Author of Character Building school course for Muslims in English and Urdu. Logotherapy and existential analysis for people of any faith or those seeking to connect with the core of their spirituality.</li></ul>');

        $buttonImage = $page->meta('button_image')
            ? asset('admin-storage/' . $page->meta('button_image'))
            : asset('images/BUTTON_1.avif');

        $manImage = $page->meta('man_image')
            ? asset('admin-storage/' . $page->meta('man_image'))
            : asset('images/Man.webp');

        $quote = $page->meta('quote', 'Sometimes, being let down by a human being is the direct cause of you finding your own strength and depending only on Allah.');

        $lifeImage = $page->meta('life_image')
            ? asset('admin-storage/' . $page->meta('life_image'))
            : asset('images/Life-does.webp');

        $iconImage = $page->meta('icon_image')
            ? asset('admin-storage/' . $page->meta('icon_image'))
            : asset('images/icon_medium.avif');

        $therapyPara = $page->meta('therapy_para', 'The number one rule of successful psychological therapy is that you can only help the ones who want to help themselves. Practically it means that unless the client wants to be helped, change and restore mental health, no one can change him/her. Therapists are there to listen, support, mirror, analyse, guide, motivate, and help you through the process, but you will have to walk the path yourself. Ultimately, you decide what you want out of it.');

        $faithBtnText = $page->meta('faith_btn_text', 'Faith-based counselling and personal sessions');

        return compact(
            'page',
            'bg1Image', 'bg2Style',
            'credentials', 'buttonImage', 'manImage',
            'quote',
            'lifeImage', 'iconImage', 'therapyPara', 'faithBtnText',
        );
    }
}
