@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Audio Stories') . ' | ICE')

@section('content')
    <div class="audio-stories-bg min-h-screen">

        {{-- Title Button --}}
        <div class="flex justify-center pt-[30px] sm:pt-[40px] md:pt-[50px]">
            <button class="font-['Raleway',sans-serif] font-extrabold bg-white text-black
                text-[16px] sm:text-[22px] md:text-[28px] lg:text-[36px]
                px-[16px] sm:px-[28px] md:px-[40px] lg:px-[58px]
                py-[10px] sm:py-[14px] md:py-[18px] lg:py-[22px]
                rounded-[8px] sm:rounded-[10px] md:rounded-[14px]
                shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
                border-none capitalize leading-[1.2]
                [text-shadow:0px_2px_0px_#8A8C8E]
                whitespace-nowrap">
                {{ $page?->title ?? 'Audio Stories' }}
            </button>
        </div>

        {{-- Intro paragraph --}}
        <div class="flex justify-center mt-10">
            <div class="w-11/12 md:w-10/12 lg:w-8/12">
                <p class="oc-body-text">Storytelling is one of the primary tools of the syllabus for utilisation in character-building education, especially in the years of primary schooling. All types of stories have been used in the syllabus, including a few audio stories to provide variety.</p>
                <p class="oc-body-text"><strong>Free sample of an audio story: <span class="charcoal-bluish-txt">The Ugly Duckling</span></strong></p>
                <audio controls controlslist="nodownload">
                    <source src="https://cdn.shopify.com/s/files/1/0613/9661/5233/files/03-The_Ugly_Duckling.delete_rep_12.54-13.02.mp3?v=1728908143" type="audio/mpeg">
                </audio>
                <br><br>

                <p class="oc-body-text text-black">
                    "Stories, read or told, have always been among the favourite teaching instruments of the world's great moral educators. Stories teach by attraction rather than compulsion; they invite rather than impose. They capture the imagination and touch the heart. All of us have experienced the power of a good story to stir strong feelings. That's why storytelling is such a natural way to engage and develop the emotional side of a child's character."
                </p>

                <p class="oc-body-text text-gray-400 font-light">
                    <em>(Lickona, Thomas. (1999) Educating for Character. New York: Bantam)</em>
                </p>

                <p class="oc-body-text">We do not just hear a story; we experience it to some extent, or at least this is how it is felt. It is called "narrative transportation" in scientific language. It refers to narration's ability to transport us into another's world, like a mental journey. The more involved you get in the story, the more you become part of it. You might even adopt some of the opinions and messages that the story depicts at the end if you could emphasise and/or sympathise with the character(s) or storyline. Research shows that our brains react and lighten up when a powerful story is heard as well as when it is told. The hormones oxytocin and cortisol are greatly relieved when we get emotionally affected.</p>
                <p class="oc-body-text"><em>(Andersen N.V (2021) Kunsten at tale so alle lytter. En praktisk og videnskabelig funderet guide til storytelling. [The art of talking in a way that everybody listens. A practical and scientifically based guide to storytelling.] Frydenlund. Denmark. P.24-27)</em></p>

                <p class="oc-body-text">Imagine the effect of a good narrator and a powerful story on us in terms of leaving an emotional impression. It can go to the core of our hearts and move us in minutes - even affecting our understanding of things, developing new concepts and thus widening our horizons.</p>

                <p class="oc-body-text text-[#325D9B]">"Imagine if a machine was invented to transmit thoughts from one person to another. Stories are such a machine. You can influence the minds of others incredibly when you tell relevant and well-chosen stories." In other words, you can make a difference with stories. You can change mindsets and motivate people to go new ways.</p>
                <p class="oc-body-text"><em>(Andersen.P.31)</em></p>

                <p class="oc-body-text"><strong>Audio Stories available in Key Stage 1 and Key Stage 02</strong></p>

                <p class="font-comic-bold text-[24px] leading-[1.4]">Or buy with course box of choice: <a href="#" class="course-box-link">Grade 1 course box</a> , <a href="#" class="course-box-link">Grade 2 course box</a> , <a href="#" class="course-box-link">Grade 3 course box</a> , <a href="#" class="course-box-link">Grade 4 course box</a> or <a href="#" class="course-box-link">Grade 5 course box</a></p>
            </div>
        </div>

        {{-- Headphone image --}}
        <div class="flex justify-center mt-5 mb-[100px]">
            <img src="{{ asset('images/headphone.webp') }}" alt="Headphone" class="w-auto h-auto">
        </div>

    </div>
@endsection
