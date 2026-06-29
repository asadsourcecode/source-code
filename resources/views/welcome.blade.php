@extends('layouts.app')

@section('title', $homePage?->meta('page_title', 'ICE | Integrated Character Education'))

@section('content')

<section class="overflow-hidden banner-top-book-gras-2">

    <div class="banner-top-book-gras">
    {{-- ── Top banner ── --}}
    <div class="grid grid-cols-12">

        {{-- LEFT col --}}
        <div class="col-span-12 md:col-span-6 lg:col-span-8 xl:col-span-7 flex flex-col md:flex-row">

            <a href="https://ystsol.com/ice/Ice-Brochure-E.pdf" target="_blank">
                <img
                    src="{{ asset('images/banner_book-image.webp') }}"
                    alt="Download PDF Brochure"
                    class="sec-bg"
                >
            </a>

            <div class="flex-1 flex flex-col justify-center items-center text-center px-4 pt-3 md:pt-5">

                <div class="flex flex-col items-start w-full pl-3 md:pl-5">
                    <h1 class="text-[32px] md:text-[48px] lg:text-[64px] font-extrabold text-[#222]">
                        {{ $homePage?->meta('hero_heading', 'EMPOWERING') }}
                    </h1>
                    <img src="{{ asset('images/curv-line-bg.png') }}" alt="" class="w-4/5 -mt-2">
                </div>

                <p class="text-[24px] md:text-[32px] lg:text-[44px] font-medium text-[#222] pl-3 md:pl-5 text-left leading-[30px] md:leading-[40px] lg:leading-[50px]">
                    {{ $homePage?->meta('hero_subtext', 'Young Minds Through Character Education') }}
                </p>

                <p class="mt-2 pl-3 md:pl-5 text-[14px] md:text-[16px] lg:text-[18px] text-justify font-bold text-gray-800">
                    {{ $homePage?->meta('hero_description', 'Experience a more holistic approach to education that goes beyond academics by including integrated character education. Equip your child with the virtues and skills needed for true success.') }}
                </p>

                <div class="w-full mt-2">
                    <p class="text-center text-[20px] md:text-[24px] lg:text-[30px] font-bold text-[#96c58f] [text-shadow:2px_2px_0px_rgba(0,0,0,0.9)]">
                        {{ $homePage?->meta('start_journey_text', 'START THE JOURNEY') }}
                    </p>
                </div>

                <div class="py-4 pl-3 md:pl-5 w-full">
                    <p class="font-semibold italic text-gray-500">
                        {{ $homePage?->meta('hadith_text', 'In The Name Of Allah The Merciful, The Compassionate') }}
                    </p>
                </div>

                <div>
                    <img
                        src="{{ asset('images/bismillah_wo_cloud.png') }}"
                        alt="Bismillah"
                        class="max-w-xs"
                    >
                </div>

            </div>

        </div>

        {{-- RIGHT col --}}
        <div class="col-span-12 md:col-span-12 lg:col-span-4 xl:col-span-5 flex">
            <div class="book_1920_1 flex-1 relative">
                <a href="#freesample" id="freesamples"
                   class="absolute top-[117px] left-1/2 -translate-x-1/2">
                    <img
                        src="{{ asset('images/books-banner-goto.png') }}"
                        alt="Go to Books Section"
                        class="w-[120px] h-[120px]"
                    >
                </a>
            </div>
        </div>

    </div>

    {{-- ── Bottom 3-column strip ── --}}
    <div class="grid grid-cols-12 items-center px-2 pt-4 pb-8">

        <div class="col-span-2 flex justify-end pr-2">
            <img src="{{ asset('images/learn-more13.png') }}" alt="" class="w-full max-w-[90px]">
        </div>

        <div class="col-span-8 px-4 pt-6">
            <h2 class="text-[12px] md:text-xl lg:text-2xl font-black text-center text-[#00608C] leading-snug">
                {{ $homePage?->meta('hero_strip_text', "Ready To Transform Your Child's Character, strengthen Muslim Identity and enhance their Moral Judgement, Emotional Intelligence and pro-social skills?") }}
            </h2>
        </div>

        <div class="col-span-2 pl-2">
            <img src="{{ asset('images/icon_2.png') }}" alt="" class="w-full max-w-[90px]">
        </div>

    </div>

    {{-- ── Hadith + Vision Statement ── --}}
    <div class="flex flex-col md:flex-row">

        <div class="w-full md:w-1/2 flex flex-col justify-center items-center text-center py-6 md:py-0">
            <img src="{{ asset('images/hadith_2.png') }}" alt="Hadith" class="max-w-full h-auto">
            <p class="pt-5 text-center text-[13px] md:text-[14px] lg:text-[15px] font-semibold text-[#318E27]">
                {{ $homePage?->meta('mission_text', 'Do to others as you would have them do to you!') }}
            </p>
        </div>

        <div class="w-full md:w-1/2 flex items-center px-4 pb-8 md:pb-0">
            <div class="w-full">
                <h3 class="mb-3 text-center">
                    <span class="vision-heading text-[32px] md:text-[50px] font-extrabold capitalize">
                        {{ $homePage?->meta('vision_heading', 'Vision') }}
                    </span>
                    <span class="text-[32px] md:text-[50px] font-normal capitalize"> Statement</span>
                </h3>
                <p class="px-1 text-[16px] md:text-[18px] text-center font-semibold">
                    {{ $homePage?->meta('vision_text', 'The overarching mission of ICE Publishers is to motivate children towards righteousness throughout their developmental years and provide them with guidance, life skills and moral support along the way.') }}
                </p>
            </div>
        </div>

    </div>

    {{-- ── Moral / Social / Emotional section ── --}}
    <section class="bg-[#dde8d9] pb-6">

        <div class="py-8 text-center px-4">
            <h3 class="heading-bg-gr">{{ $homePage?->meta('moral_heading', 'Moral, Social & Emotional') }}</h3>
            <h3 class="section-subheading">{{ $homePage?->meta('moral_subheading', 'EDUCATION') }}</h3>
            <p class="section-paragraph">
                {{ $homePage?->meta('moral_description', "We focus on developing school-aged children's moral, emotional, and social skills through a comprehensive ethical education program. Our curriculum, grounded in Islamic and universal values, aims to foster virtues and good conduct in students.") }}
            </p>
        </div>

        <div class="max-w-6xl mx-auto px-4 space-y-4">

            @foreach ($missionDefaults as $slug => $def)
                @php $card = $innerCards[$slug] ?? null; @endphp
                <div class="grid grid-cols-12 items-center bg-white p-3 md:p-4 lg:p-6 rounded-[20px] shadow-[3px_7px_10px_#000000] mx-4 md:mx-10 lg:mx-20">
                    <div class="col-span-12 md:col-span-2 flex items-center justify-center py-2 md:py-3 lg:py-0">
                        <p class="text-base md:text-lg lg:text-xl font-extrabold text-center" style="color: {{ $def['color'] }}">
                            {{ $card?->meta('card_label', $def['label']) ?? $def['label'] }}
                        </p>
                    </div>
                    <div class="col-span-12 md:col-span-7 px-2">
                        <p class="text-xs md:text-sm lg:text-base font-semibold text-justify">
                            {{ $card?->short_description ?? $def['excerpt'] }}
                            <a href="/pages/{{ $slug }}" class="inline-flex items-center gap-1.5 text-[rgba(151,14,14,0.7)] no-underline">Read more <i class="fa-solid fa-arrow-right text-xs"></i></a>
                        </p>
                    </div>
                    <div class="col-span-12 md:col-span-3 flex justify-center items-center py-2 md:py-3 lg:py-0 px-2">
                        @if($card?->featured_image)
                            <img src="{{ asset('admin-storage/' . $card->featured_image) }}" alt="{{ $def['label'] }}" class="w-full max-w-[200px] md:max-w-none rounded-lg">
                        @else
                            <img src="{{ asset($def['img']) }}" alt="{{ $def['label'] }}" class="w-full max-w-[200px] md:max-w-none rounded-lg">
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    {{-- ── Video Presentation section ── --}}
    <section id="video" class="bg-video-section py-8">

        {{-- Heading --}}
        <div class="text-center mb-6">
            <h2 class="heading-bg-gr">{{ $homePage?->meta('video_heading', 'Video Presentation') }}</h2>
        </div>

        {{-- Row 1: Smile image (8 cols) + Urdu video (4 cols) --}}
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-12 items-center gap-4 mb-8">

                <div class="col-span-12 md:col-span-8 flex justify-center">
                    <img
                        src="{{ asset('images/smile.png') }}"
                        alt="Smile"
                        class="max-w-full h-auto"
                    >
                </div>

                <div class="col-span-12 md:col-span-4 flex flex-col items-center">
                    <a href="{{ $homePage?->meta('video_url_urdu', 'https://youtu.be/tDmkLrWCx_g') }}" target="_blank" class="relative block w-full max-w-md">
                        <span class="absolute top-2 ml-8 left-2 z-10 bg-black/60 text-white text-xs font-bold px-2 py-1 rounded">Urdu - Detailed</span>
                        <img
                            src="{{ asset('images/video-thumb-urdu.png') }}"
                            alt="Urdu - Detailed"
                            class="w-full rounded-lg hover:opacity-90 transition-opacity"
                        >
                    </a>
                </div>

            </div>

            {{-- Row 2: Two English videos centered --}}
            <div class="grid grid-cols-12 gap-6 justify-items-center">

                <div class="col-span-12 md:col-span-4 md:col-start-3 flex flex-col items-center">
                    <a href="{{ $homePage?->meta('video_url_english_short', 'https://youtu.be/8z8ieh_e1v8') }}" target="_blank" class="relative block w-full">
                        <span class="absolute top-2 left-2 z-10 bg-black/60 text-white text-xs font-bold px-2 py-1 rounded">English - Short</span>
                        <img
                            src="{{ asset('images/video-thumb-english-short.png') }}"
                            alt="English - Short"
                            class="w-full rounded-lg hover:opacity-90 transition-opacity"
                        >
                    </a>
                </div>

                <div class="col-span-12 md:col-span-4 flex flex-col items-center">
                    <a href="{{ $homePage?->meta('video_url_english_intro', 'https://youtu.be/OHmvUHFGiI8') }}" target="_blank" class="relative block w-full">
                        <span class="absolute top-2 left-2 z-10 bg-black/60 text-white text-xs font-bold px-2 py-1 rounded">English - Introduction</span>
                        <img
                            src="{{ asset('images/video-thumb-english-intro.png') }}"
                            alt="English - Introduction"
                            class="w-full rounded-lg hover:opacity-90 transition-opacity"
                        >
                    </a>
                </div>

            </div>
        </div>

    </section>

    {{-- ── Character Building Course section ── --}}
    <section id="deals" class="bg-character-building py-14">

        <div class="grid grid-cols-12 items-center max-w-7xl mx-auto px-4">

            {{-- Left decorative image --}}
            <div class="hidden md:flex col-span-2 justify-center items-center">
                <img
                    src="{{ asset('images/hard_copy_1_b27914f4-5516-4190-9ca2-c31e9ec74314.png') }}"
                    alt=""
                    class="w-[200px]"
                >
            </div>

            {{-- Centre content --}}
            <div class="col-span-12 md:col-span-8 text-center">

                <h3 class="text-[28px] md:text-[36px] lg:text-[50px] font-bold text-black capitalize">
                    {{ $homePage?->meta('course_heading', 'Check Out Our') }}
                </h3>

                <h2 class="heading-bg-gr text-black mb-4">
                    {{ $homePage?->meta('course_subheading', 'Character Building Course') }}
                </h2>

                <p class="text-sm md:text-base lg:text-base font-semibold text-gray-700 max-w-2xl mx-auto mb-4">
                    {{ $homePage?->meta('course_description', 'Discover our course, nurturing children\'s moral, emotional, and social skills. Grounded in Islamic and universal values, our program fosters empathy and responsibility through engaging activities and thought-building processes. Explore our enriching and transformative character development programme.') }}
                </p>

                <h4 class="text-[18px] md:text-[22px] lg:text-[28px] text-[#95C28F] font-semibold text-center pt-8 md:pt-10 lg:pt-12 pb-2 [text-shadow:2px_2px_0px_rgba(0,0,0,0.9)] font-[Poppins,sans-serif]">
                    {{ $homePage?->meta('course_purchase_text', 'For purchase of books, choose your level :') }}
                </h4>



                {{-- Key Stage buttons --}}
                <div class="w-full flex flex-col lg:flex-row justify-center items-center gap-3 lg:gap-4 mt-2">

                    <span class="text-[18px] md:text-[20px] lg:text-[24px] xl:text-[32px] font-bold text-[#95C28F] shrink-0 lg:ml-[-277px] lg:mr-8 mr-0 [text-shadow:2px_2px_0px_#000000,-2px_-2px_0px_#FFFFFF]">
                        Package Deals:
                    </span>

                    <div class="flex flex-wrap justify-center items-center gap-3 lg:gap-4 w-full lg:w-auto">
                        @foreach ([
                            ['href' => '/products/key-stage-1-grade-1-2',     'label' => 'Key Stage 01', 'grade' => 'Grade 1 & 2'],
                            ['href' => '/products/key-stage-02-grade-3-4-5',  'label' => 'Key Stage 02', 'grade' => 'Grade 3,4 & 5'],
                            ['href' => '/products/key-stage-03-grade-6-7-8',  'label' => 'Key Stage 03', 'grade' => 'Grade 6,7 & 8'],
                            ['href' => '/products/key-stage-04-grade-9-10-11','label' => 'Key Stage 04', 'grade' => 'Grade 9,10 & 11'],
                        ] as $stage)
                            <div class="flex flex-col items-center shrink-0">
                                <a
                                    href="{{ $stage['href'] }}"
                                    class="inline-block bg-[#96c58f] hover:bg-[#7aad73] text-white font-bold text-xs md:text-sm px-4 md:px-5 py-2 rounded-full transition-colors duration-200"
                                >
                                    {{ $stage['label'] }}
                                </a>
                                <p class="mt-1 text-xs md:text-sm font-semibold text-gray-700 font-[Poppins]">
                                    {{ $stage['grade'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>

            {{-- Right decorative image --}}
            <div class="hidden md:flex col-span-2 justify-center items-center">
                <img
                    src="{{ asset('images/e-learning.png') }}"
                    alt=""
                    class="w-[200px]"
                >
            </div>

        </div>

    </section>


    {{-- â”€â”€ Free Sample Lessons slider â”€â”€ --}}
    <section id="freesample" class="free-sample-section py-[50px]">

        {{-- Heading --}}
        <div class="flex justify-center py-[30px]">
            <h2 class="text-[18px] md:text-[20px] lg:text-[25px] font-extrabold text-[#6D6E70] bg-white px-4 py-2 text-center">
                {{ $homePage?->meta('freesample_heading', 'For free sample lessons, click button:') }}
                <img src="{{ asset('images/cartoon.png') }}" alt="" class="inline-block w-[10%]">
            </h2>
        </div>

        {{-- Slider --}}
        <div id="fs-wrapper" class="relative px-14 mx-auto" style="max-width: 1400px;">

            {{-- Prev arrow --}}
            <button id="fs-prev"
                class="absolute left-0 top-[50%] -translate-y-1/2 z-10 w-[60px] h-[88px] bg-no-repeat bg-contain bg-center border-0 bg-transparent cursor-pointer"
                style="background-image: url('{{ asset('images/left-arrow.png') }}'); top: 124px;">
            </button>

            {{-- Track viewport: clip X so slider works, Y visible so books poke above --}}
            <div class="mt-[70px]" style="overflow-x: clip; overflow-y: visible;">
                <div id="fs-track" class="flex gap-4 transition-transform duration-300 ease-in-out">

                    @foreach([
                        ['label' => 'Complete Class 1',  'slug' => 'class-one',    'tb' => 'C-1-TB.png',  'tg' => 'C-1-TG.png'],
                        ['label' => 'Complete Class 2',  'slug' => 'class-two',    'tb' => 'C-2-TB.png',  'tg' => 'C-2-TG.png'],
                        ['label' => 'Complete Class 3',  'slug' => 'class-three',  'tb' => 'C-3-TB.png',  'tg' => 'C-3-TG.png'],
                        ['label' => 'Complete Class 4',  'slug' => 'class-four',   'tb' => 'C-4-TB.png',  'tg' => 'C-4-TG.png'],
                        ['label' => 'Complete Class 5',  'slug' => 'class-five',   'tb' => 'C-5-TB.png',  'tg' => 'C-5-TG.png'],
                        ['label' => 'Complete Class 6',  'slug' => 'class-six',    'tb' => 'C-6-TB.png',  'tg' => 'C-6-TG.png'],
                        ['label' => 'Complete Class 7',  'slug' => 'class-seven',  'tb' => 'C-7-TB.png',  'tg' => 'C-7-TG.png'],
                        ['label' => 'Complete Class 8',  'slug' => 'class-eight',  'tb' => 'C-8-TB.png',  'tg' => 'C-8-TG.png'],
                        ['label' => 'Complete Class 9',  'slug' => 'class-nine',   'tb' => 'C-9-TB.png',  'tg' => 'C-9-TG.png'],
                        ['label' => 'Complete Class 10', 'slug' => 'class-ten',    'tb' => 'C-10-TB.png', 'tg' => 'C-10-TG.png'],
                        ['label' => 'Complete Class 11', 'slug' => 'class-eleven', 'tb' => 'C-11-TB.png', 'tg' => 'C-11-TG.png'],
                    ] as $class)
                        <div class="fs-slide flex-shrink-0">

                            {{-- White card --}}
                            <div class="fs-card bg-white rounded-[15px] px-2 pt-2 pb-2"
                                 style="box-shadow: -1px -1px 3px rgba(0,0,0,0.2), 4px 4px 10px rgba(0,0,0,0.76); overflow: visible;">

                                {{-- Books: -mt pulls them above the card top edge --}}
                                <div class="flex justify-center gap-2 -mt-[60px] mb-2">
                                    <img src="{{ asset('images/' . $class['tb']) }}" alt="{{ $class['label'] }}" class="tb-img h-[90px] w-auto object-contain drop-shadow-sm">
                                    <img src="{{ asset('images/' . $class['tg']) }}" alt="{{ $class['label'] }}" class="tg-img h-[90px] w-auto object-contain drop-shadow-sm">
                                </div>

                                {{-- Title --}}
                                <div class="py-2 text-center">
                                    <a href="/pages/{{ $class['slug'] }}"
                                       class="text-[14px] md:text-[15px] lg:text-[16px] font-bold text-gray-800 underline hover:[text-shadow:2px_2px_5px_rgba(0,0,0,0.3)]">
                                        {{ $class['label'] }}
                                    </a>
                                </div>

                                {{-- Buttons --}}
                                <div class="flex flex-col items-center gap-2 pb-6">
                                    <a href="/products/{{ $class['slug'] }}-textbook"
                                       class="textbook-link w-full text-center text-sm font-bold text-black bg-white border-2 border-[#a8f58d] rounded-full px-2 py-[5px] hover:bg-[#E2FCD8] transition-colors">
                                        Textbook
                                    </a>
                                    <a href="/products/{{ $class['slug'] }}-teachers-guide"
                                       class="teacher-link w-full text-center text-sm font-bold text-black bg-white border-2 border-[#a8f58d] rounded-full px-2 py-[5px] hover:bg-[#E2FCD8] transition-colors">
                                        Teacher's Guide
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            {{-- Next arrow --}}
            <button id="fs-next"
                class="absolute right-0 z-10 w-[50px] h-[100px] bg-no-repeat bg-contain bg-center border-0 bg-transparent cursor-pointer"
                style="background-image: url('{{ asset('images/right-arrow.png') }}'); top: 139px; right: -40px;">
            </button>

        </div>

    </section>

    {{-- ── Books Banner ── --}}<div class="books-img-bg-section">
            <img src="{{ asset('images/books-home-banner.png') }}"
                 alt="All Books"
                 class="block max-w-[85%] h-auto mx-auto pt-[30px]">
        </div>

    <script>
    (function () {
        var track   = document.getElementById('fs-track');
        var slides  = Array.from(track.children);
        var total   = slides.length;
        var current = 0;
        var visible, maxIdx;

        function getVisible() {
            var w = window.innerWidth;
            if (w >= 1280) return 6;
            if (w >= 1024) return 4;
            if (w >= 640)  return 3;
            return 2;
        }

        function setWidths() {
            visible = getVisible();
            maxIdx  = Math.max(0, total - visible);
            if (current > maxIdx) current = maxIdx;
            var vw  = track.parentElement.clientWidth;
            var gap = 16;
            var w   = (vw - gap * (visible - 1)) / visible;
            slides.forEach(function (s) { s.style.width = w + 'px'; });
        }

        function cardStep() {
            return slides[0].offsetWidth + 16;
        }

        function render() {
            track.style.transform = 'translateX(-' + (current * cardStep()) + 'px)';
        }

        setWidths();
        render();

        window.addEventListener('resize', function () { setWidths(); render(); });

        document.getElementById('fs-prev').addEventListener('click', function () {
            current = current <= 0 ? maxIdx : current - 1;
            render();
        });

        document.getElementById('fs-next').addEventListener('click', function () {
            current = current >= maxIdx ? 0 : current + 1;
            render();
        });
    })();
    </script>

    {{-- ── Special Features ── --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Heading --}}
            <div class="text-center -mt-[25px] mb-[40px]">
                <h2 class="heading-bg-gr normal-case font-extrabold text-[50px] text-black">
                    Special features
                </h2>
            </div>

            {{-- Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @forelse($features as $feature)
                    @php
                        $featureImageDefaults = [
                            'feature-homeschooling'      => 'images/homeschooling_medium.png',
                            'feature-counselling-therapy'=> 'images/mind-body-spirit.webp',
                        ];
                        $featureImg = $feature->featured_image
                            ? asset('admin-storage/' . $feature->featured_image)
                            : (isset($featureImageDefaults[$feature->slug]) ? asset($featureImageDefaults[$feature->slug]) : null);
                    @endphp
                    <div class="flex flex-col rounded-[25px] overflow-hidden text-center mb-5 bg-white shadow-[-1px_-1px_3px_rgba(0,0,0,0.2),4px_5px_5px_rgba(0,0,0,0.76)]">

                        @if($featureImg)
                            <img src="{{ $featureImg }}"
                                 alt="{{ $feature->title }}" class="w-full h-auto">
                        @endif

                        <div class="flex flex-col flex-1 p-4">
                            <h3 class="text-[16px] md:text-[17px] lg:text-[18px] font-bold text-[#222] mb-3">{{ $feature->title }}</h3>
                            <p class="text-[13px] md:text-[14px] leading-relaxed px-[15px] text-left flex-1">
                                {{ $feature->short_description }}
                            </p>
                            <a href="/pages/{{ $feature->slug }}"
                               class="inline-block mt-3 text-black font-semibold text-sm hover:underline">
                                Read More
                            </a>
                        </div>

                    </div>
                @empty
                    <p class="col-span-4 text-center text-gray-400 text-sm py-8">
                        No features yet. Add pages with slugs starting with <code>feature-</code> in the admin.
                    </p>
                @endforelse

            </div>
        </div>
    </section>

    {{-- ── Testimonials ── --}}
    <section class="testimonials-bg-section py-14">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">

            {{-- Heading --}}
            <h2 class="heading-bg-gr normal-case font-extrabold text-[50px] text-black mb-10">
                Testimonials
            </h2>

            {{-- Slider --}}
            <div class="relative">

                {{-- Slides --}}
                @forelse($testimonials as $i => $t)
                    <div class="testi-slide {{ $i > 0 ? 'hidden' : '' }}">

                        {{-- Card --}}
                        <div class="bg-white rounded-[12px] px-6 py-8 shadow-[-1px_-1px_3px_rgba(0,0,0,0.2),4px_4px_10px_rgba(0,0,0,0.76)] text-left mb-6">
                            <p class="text-[14px] md:text-[15px] lg:text-[16px] text-gray-700 leading-relaxed">
                                {{ $t->content }}
                            </p>
                        </div>

                        {{-- Icon + Author --}}
                        <div class="flex flex-col items-center mt-5">
                            @if($t->photo)
                                <img src="{{ asset('admin-storage/' . $t->photo) }}"
                                     alt="{{ $t->name }}" class="w-[60px] h-[60px] rounded-full object-cover mb-3">
                            @else
                                <img src="{{ asset('images/testimonial-icon.png') }}"
                                     alt="testimonial" class="w-[60px] h-auto mb-3">
                            @endif
                            <h4 class="font-bold text-[14px] md:text-[15px] lg:text-[16px] text-[#222]">{{ $t->name }}</h4>
                            <p class="text-xs md:text-sm text-gray-500 italic">{{ $t->designation }}</p>
                        </div>

                    </div>
                @empty
                    <p class="text-center text-gray-400 text-sm py-8">No testimonials yet.</p>
                @endforelse

                {{-- Arrows --}}
                <div class="flex justify-center items-center gap-6 mt-6">
                    <button id="testi-prev" class="w-[40px] h-[40px] bg-no-repeat bg-contain bg-center border-0 bg-transparent cursor-pointer"
                            style="background-image: url('{{ asset('images/left-arrow.png') }}')">
                    </button>
                    <button id="testi-next" class="w-[40px] h-[40px] bg-no-repeat bg-contain bg-center border-0 bg-transparent cursor-pointer"
                            style="background-image: url('{{ asset('images/right-arrow.png') }}')">
                    </button>
                </div>

            </div>
        </div>
    </section>

    <script>
    (function () {
        var slides  = Array.from(document.querySelectorAll('.testi-slide'));
        var current = 0;
        function show(idx) {
            slides.forEach(function (s) { s.classList.add('hidden'); });
            slides[idx].classList.remove('hidden');
        }
        document.getElementById('testi-prev').addEventListener('click', function () {
            current = current <= 0 ? slides.length - 1 : current - 1;
            show(current);
        });
        document.getElementById('testi-next').addEventListener('click', function () {
            current = current >= slides.length - 1 ? 0 : current + 1;
            show(current);
        });
    })();
    </script>

    {{-- ── FAQ ── --}}
    <section class="faq-section py-[40px]">
        <div class="container mx-auto px-4">

            {{-- Heading --}}
            <h2 class="text-center mb-5 text-[32px] md:text-[40px] lg:text-[50px] leading-tight text-black">
                <span class="heading-bg-gr font-extrabold normal-case">Frequently</span><span class="font-[100]"> Asked Questions</span>
            </h2>

            {{-- Row with girl image on right --}}
            <div class="bg-adjest flex flex-row-reverse justify-center">
                <div class="w-full lg:w-10/12">
                    <div class="flex flex-row-reverse justify-center items-center">
                        <div class="w-full lg:w-10/12">

                            @forelse($faqs as $i => $faq)
                                <div class="faq-item bg-white my-8 rounded-[1rem] border-2 border-[#a19c9c] {{ $i === 0 ? 'shadow-[0px_4px_8px_rgba(2,10,6,1)]' : '' }} overflow-hidden">
                                    <button class="faq-trigger w-full flex items-center gap-3 px-6 py-7 cursor-pointer text-left">
                                        <span class="shrink-0 font-bold text-[18px] md:text-[20px] text-[#000]">{{ $i + 1 }}.</span>
                                        <span class="flex-1 font-bold text-[18px] md:text-[20px] text-[#000]">{{ $faq->question }}</span>
                                        <span class="faq-icon shrink-0 w-6 h-6 flex items-center justify-center text-gray-600">
                                            <i class="fa-solid fa-plus text-[14px]"></i>
                                        </span>
                                    </button>
                                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                        <div class="px-6 pb-6 text-[16px] md:text-[18px] text-gray-700 leading-relaxed">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-gray-400 text-sm py-8">No FAQs yet. Add them in the admin panel.</p>
                            @endforelse

                            <script>
                                document.querySelectorAll('.faq-trigger').forEach(function (btn) {
                                    btn.addEventListener('click', function () {
                                        var item    = btn.closest('.faq-item');
                                        var answer  = item.querySelector('.faq-answer');
                                        var icon    = item.querySelector('.faq-icon i');
                                        var isOpen  = answer.style.maxHeight && answer.style.maxHeight !== '0px';

                                        // Close all
                                        document.querySelectorAll('.faq-answer').forEach(function (a) { a.style.maxHeight = '0px'; });
                                        document.querySelectorAll('.faq-icon i').forEach(function (ic) {
                                            ic.className = 'fa-solid fa-plus text-[12px]';
                                        });

                                        if (!isOpen) {
                                            answer.style.maxHeight = answer.scrollHeight + 'px';
                                            icon.className = 'fa-solid fa-minus text-[12px]';
                                        }
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ── Hijab Girl Banner ── --}}
    <section class="w-full relative" style="background-image: url('{{ asset('images/hijab-girl.webp') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 700px;">
        <div style="width: 100%; height: 100%; position: absolute; background-image: url('{{ asset('images/sofia-adeem.webp') }}'); background-size: 50%; background-repeat: no-repeat; background-position: center center; left: 0; top: 0;"></div>
    </section>

    {{-- ── Contact Us ── --}}
    <section class="py-0 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col lg:flex-row items-stretch">

                {{-- Left: book image --}}
                <div class="lg:w-1/2 flex items-center">
                    <img src="{{ asset('images/contact-book.png') }}" alt="Contact" class="w-full h-auto">
                </div>

                {{-- Right: form with background --}}
                <div class="lg:w-1/2 contact-form-adjest">

                    {{-- sb_pen: form + decorative pen side by side --}}
                    <div class="flex w-[92%] ml-auto pt-[5px] pb-[48px]">

                        {{-- Form --}}
                        <form action="https://characterbuilding.education/contact" method="post" enctype="multipart/form-data" class="w-full">
                            <input type="hidden" name="form_type" value="contact">
                            <input type="hidden" name="utf8" value="&#10003;">

                            {{-- Heading --}}
                            <p class="text-[18px] md:text-[20px] lg:text-[22px] mb-4 leading-tight">
                                <span class="font-normal">Contact</span>
                                <span class="font-bold pl-2">Us</span>
                            </p>

                            {{-- Name --}}
                            <div class="contact-field">
                                <i class="icon fa fa-user"></i>
                                <input type="text" id="contact-name" placeholder="Name" name="contact[name]" required>
                            </div>

                            {{-- Email --}}
                            <div class="contact-field">
                                <i class="icon fa fa-envelope"></i>
                                <input type="email" id="contact-email" placeholder="Email" name="contact[email]" required>
                            </div>

                            {{-- Message --}}
                            <div class="contact-field textfild">
                                <i class="icon messageicon">
                                    <img class="contact-pen-resize" src="{{ asset('images/contact-pen-icon.png') }}" alt="Message">
                                </i>
                                <textarea id="contact-message" placeholder="Message" name="contact[body]" required></textarea>
                            </div>

                            <button type="submit" class="contact-submit-btn">Submit</button>
                        </form>

                        {{-- Decorative pen --}}
                        <div class="ml-3 flex items-end shrink-0">
                            <img class="form-image" src="{{ asset('images/contact-pen-deco.png') }}" alt="Pen">
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ── Partner Organizations ── --}}
    <section class="py-16 bg-[#f7f3e8]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">

            <h2 class="mb-2"><span class="heading-bg-gr normal-case font-extrabold text-[24px] md:text-[28px] lg:text-[36px] text-[#24372f]">{{ $homePage?->meta('partners_heading', 'We Collaborate With a') }}</span></h2>
            <h3 class="text-[16px] md:text-[18px] lg:text-[20px] xl:text-[24px] font-semibold text-gray-600 mb-10">{{ $homePage?->meta('partners_subheading', 'Number of Leading Schools and Institutes') }}</h3>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 items-center justify-items-center">
                @forelse($partners as $partner)
                    <a href="{{ $partner->website_url ?? '#' }}"
                       {{ $partner->website_url ? 'target="_blank" rel="noopener"' : '' }}
                       class="">
                        @if($partner->logo)
                            <img src="{{ asset('admin-storage/' . $partner->logo) }}"
                                 alt="{{ $partner->name }}" class="h-28 w-auto object-contain mx-auto">
                        @else
                            <span class="text-[13px] font-semibold text-gray-500">{{ $partner->name }}</span>
                        @endif
                    </a>
                @empty
                    <p class="col-span-6 text-center text-gray-400 text-sm py-4">No partners yet. Add them in the admin panel.</p>
                @endforelse
            </div>

        </div>
    </section>

    {{-- ── Blog ── --}}
    <section class="py-16" style="background-image: url('{{ asset('images/monthly-blog-post.webp') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-center gap-3 mb-10">
                <img src="{{ asset('images/book-icon-1.png') }}" alt="" class="h-12 w-auto">
                <h2 class="heading-bg-gr !mb-0">Monthly Blog Posts</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($posts as $post)
                    <article class="bg-[#f7f3e8] rounded-xl p-6 flex flex-col hover:shadow-md transition-shadow duration-300">

                        @if($post->featured_image)
                            <img src="{{ asset('admin-storage/' . $post->featured_image) }}"
                                 alt="{{ $post->title }}"
                                 class="w-full h-40 object-cover rounded-lg mb-4">
                        @endif

                        <h3 class="text-[16px] md:text-[17px] lg:text-[18px] font-extrabold text-[#24372f] mb-3">{{ $post->title }}</h3>
                        <p class="text-[13px] md:text-[14px] text-gray-600 leading-relaxed flex-1 mb-4">{{ $post->excerpt }}</p>
                        <div class="flex items-center justify-between mt-auto">
                            <a href="/blog/{{ $post->slug }}"
                               class="inline-flex items-center gap-1 text-[#96c58f] font-bold text-sm hover:text-[#7aad73] transition-colors">
                                Read More <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                            <time class="text-xs text-gray-400 italic">
                                {{ $post->published_at?->format('F Y') }}
                            </time>
                        </div>
                    </article>
                @empty
                    <p class="col-span-3 text-center text-gray-400 text-sm py-8">No blog posts yet. Publish posts in the admin panel.</p>
                @endforelse
            </div>

        </div>
    </section>

    {{-- ── Promo Banner ── --}}
    <div class="w-full pb-[70px]">
        @if($homePage?->meta('promo_banner'))
            <img src="{{ asset('admin-storage/' . $homePage->meta('promo_banner')) }}" alt="Character Building Course" class="w-full h-auto block">
        @else
            <img src="{{ asset('images/promo-banner.png') }}" alt="Character Building Course" class="w-full h-auto block">
        @endif
    </div>


    </div>

</section>

@endsection
