<?php

namespace App\Services\Website;

use App\Models\Faq;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Testimonial;

class HomeService
{
    public function getData(): array
    {
        $homePage = Page::active()->where('slug', 'home')->first();

        $faqs = Faq::active()->orderBy('sort_order')->get();

        $testimonials = Testimonial::active()->orderBy('sort_order')->get();

        $posts = Post::active()
            ->published()
            ->with('category')
            ->latest('published_at')
            ->take(3)
            ->get();

        $features = Page::active()
            ->where('slug', 'like', 'feature-%')
            ->orderBy('id')
            ->get();

        $featureRoutes = [
            'feature-homeschooling'       => route('homeschooling'),
            'feature-teachers-training'   => route('teachers-training'),
            'feature-online-learning'     => route('online-classes'),
            'feature-counselling-therapy' => route('counselling'),
        ];

        $partners = Partner::active()->orderBy('sort_order')->get();

        $innerCards = Page::active()
            ->whereIn('slug', ['our-mission', 'what-makes', 'introduction'])
            ->get()
            ->keyBy('slug');

        $missionDefaults = [
            'our-mission' => [
                'label'   => 'Our Mission',
                'color'   => '#C35A11',
                'excerpt' => 'This character-building curriculum attempts to teach morals based on various methods of educational psychology grounded in pedagogical concerns. The purpose is to replace the widespread old-fashioned approach to religious teachings, which is both superficial, boring, and ineffective, with progressive ones. Thus, we strive to educate the Ummah on how to apply effective strategies to moral education that actually work and have positive and long-term effects as they influence the child during the years of personality formation. The main objective is to make them truly understand the concepts behind the rules of Islam. An in-depth approach to the main philosophy. We let them ask the WHY questions and try to explain concepts in a way.....',
                'img'     => 'images/our_mission_1015x695.png',
            ],
            'what-makes' => [
                'label'   => 'What Makes This Course Different From Others',
                'color'   => '#1B6B5A',
                'excerpt' => 'The uniqueness of the subject is the advanced pedagogical methods behind it and the practical stepwise execution strategy of how ethics can be delivered accurately. Instilling values delicately and naturally is the focus, as the age of schooling is a golden opportunity for nurturing and influencing children. Numerous efforts in terms of smaller programmes have already been made in several Muslim countries. However, according to my research and two decades of experience, those methods are often limited to.....',
                'img'     => 'images/what_makes_the_course_1015x695.png',
            ],
            'introduction' => [
                'label'   => 'Introduction',
                'color'   => '#6B3FA0',
                'excerpt' => 'The Character-Building school course has been initiated to impart ethics to children effectively. The curriculum aims to provide the modern Muslim world with a comprehensive ethical programme that enlightens and boosts the values of school-aged children. An educational setting that can equip them with the necessary moral, emotional, and social skills to develop into the best version of themselves. These three areas complement one another in developing moral characters delicately but efficiently.....',
                'img'     => 'images/Introduction_1015x695.png',
            ],
        ];

        return compact(
            'homePage',
            'faqs',
            'testimonials',
            'posts',
            'features',
            'featureRoutes',
            'partners',
            'innerCards',
            'missionDefaults',
        );
    }
}
