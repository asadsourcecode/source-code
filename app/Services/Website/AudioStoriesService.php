<?php

namespace App\Services\Website;

use App\Models\Page;

class AudioStoriesService
{
    public function getData(): array
    {
        $page = Page::active()->where('slug', 'audio-stories')->firstOrFail();

        $bgStyle = $page->meta('bg_image')
            ? 'background-image: url("' . asset('admin-storage/' . $page->meta('bg_image')) . '"); background-size: 100% 100%; background-repeat: no-repeat;'
            : '';

        $introPara       = $page->meta('intro_para', 'Storytelling is one of the primary tools of the syllabus for utilisation in character-building education, especially in the years of primary schooling. All types of stories have been used in the syllabus, including a few audio stories to provide variety.');
        $audioLabel      = $page->meta('audio_label', 'Free sample of an audio story:');
        $audioTitle      = $page->meta('audio_title', 'The Ugly Duckling');
        $audioUrl        = $page->meta('audio_url', 'https://cdn.shopify.com/s/files/1/0613/9661/5233/files/03-The_Ugly_Duckling.delete_rep_12.54-13.02.mp3?v=1728908143');
        $quote           = $page->meta('quote', '"Stories, read or told, have always been among the favourite teaching instruments of the world\'s great moral educators. Stories teach by attraction rather than compulsion; they invite rather than impose. They capture the imagination and touch the heart. All of us have experienced the power of a good story to stir strong feelings. That\'s why storytelling is such a natural way to engage and develop the emotional side of a child\'s character."');
        $citation1       = $page->meta('citation_1', '(Lickona, Thomas. (1999) Educating for Character. New York: Bantam)');
        $narrativePara   = $page->meta('narrative_para', 'We do not just hear a story; we experience it to some extent, or at least this is how it is felt. It is called "narrative transportation" in scientific language. It refers to narration\'s ability to transport us into another\'s world, like a mental journey. The more involved you get in the story, the more you become part of it. You might even adopt some of the opinions and messages that the story depicts at the end if you could emphasise and/or sympathise with the character(s) or storyline. Research shows that our brains react and lighten up when a powerful story is heard as well as when it is told. The hormones oxytocin and cortisol are greatly relieved when we get emotionally affected.');
        $citation2       = $page->meta('citation_2', '(Andersen N.V (2021) Kunsten at tale so alle lytter. En praktisk og videnskabelig funderet guide til storytelling. [The art of talking in a way that everybody listens. A practical and scientifically based guide to storytelling.] Frydenlund. Denmark. P.24-27)');
        $imaginePara     = $page->meta('imagine_para', 'Imagine the effect of a good narrator and a powerful story on us in terms of leaving an emotional impression. It can go to the core of our hearts and move us in minutes - even affecting our understanding of things, developing new concepts and thus widening our horizons.');
        $blueQuote       = $page->meta('blue_quote', '"Imagine if a machine was invented to transmit thoughts from one person to another. Stories are such a machine. You can influence the minds of others incredibly when you tell relevant and well-chosen stories." In other words, you can make a difference with stories. You can change mindsets and motivate people to go new ways.');
        $citation3       = $page->meta('citation_3', '(Andersen.P.31)');
        $availabilityLine = $page->meta('availability_line', 'Audio Stories available in Key Stage 1 and Key Stage 02');
        $courseBoxLinks  = $page->meta('course_box_links', '');

        $headphoneImage = $page->meta('headphone_image')
            ? asset('admin-storage/' . $page->meta('headphone_image'))
            : asset('images/headphone.webp');

        return compact(
            'page', 'bgStyle',
            'introPara', 'audioLabel', 'audioTitle', 'audioUrl',
            'quote', 'citation1',
            'narrativePara', 'citation2',
            'imaginePara', 'blueQuote', 'citation3',
            'availabilityLine', 'courseBoxLinks',
            'headphoneImage',
        );
    }
}
