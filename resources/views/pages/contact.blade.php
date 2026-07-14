@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Contact Us') . ' | ICE')
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)

@section('content')
<div class="bg-white">

{{-- Section 1: Globe background with Contact Us button --}}
<div class="relative">
    <img src="{{ $bgImage }}" class="w-full block" alt="">
    <div class="absolute inset-0 flex flex-col items-center justify-center px-4">
        <button class="font-['Raleway',sans-serif] font-extrabold bg-white text-black
            text-[14px] sm:text-[22px] md:text-[30px] lg:text-[36px]
            px-[24px] sm:px-[48px] md:px-[64px] lg:px-[80px]
            py-[8px] sm:py-[14px] md:py-[18px] lg:py-[22px]
            mt-5 sm:mt-0
            rounded-[10px]
            shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
            border-none [text-shadow:0px_2px_0px_#8A8C8E]
            whitespace-nowrap">
            {{ $page?->title ?? 'Contact Us' }}
        </button>

        <div class="mt-8 sm:mt-10 md:mt-12 lg:mt-10 text-center">
            <div class="flex items-center justify-center gap-2 sm:gap-3">
                <img src="{{ asset('images/icon-1.avif') }}" alt="" class="w-[18px] h-[18px] sm:w-[24px] sm:h-[24px] md:w-[30px] md:h-[30px] object-contain flex-shrink-0">
                <p class="text-[13px] sm:text-[20px] md:text-[26px] lg:text-[32px] font-['Comic_Sans_MS',sans-serif] font-normal leading-[1.2] mb-[10px] text-left">
                   {{ $emailLine }}
                </p>
            </div>
            <p class="text-[13px] sm:text-[20px] md:text-[26px] lg:text-[32px] font-['Comic_Sans_MS',sans-serif] font-normal leading-[1.2] mb-[10px] ml-5 pl-5 text-start">
               {{ $formPrompt }}
            </p>
        </div>
    </div>
</div>

{{-- Section 2 + 3: Three columns + Form on same background --}}
<div class="contact-section-2-bg">

    {{-- Three info columns --}}
    <div class="py-8 md:py-12 px-4 sm:px-8 lg:px-16">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 lg:gap-10 w-full font-['Raleway',sans-serif] text-[#333]">

            {{-- Column 1: International customers --}}
            <div class="text-center">
                <p class="font-extrabold mb-3 text-[18px] lg:text-[22px] font-['Comic_Sans_MS',sans-serif]">{{ $col1Heading }}</p>
                <div class="flex items-center gap-2 justify-center text-[16px] lg:text-[20px]">
                    <x-icon-whatsapp />
                    <span>{{ $col1Text }}</span>
                </div>
            </div>

            {{-- Column 2: Pakistan --}}
            <div class="leading-relaxed text-[16px] lg:text-[20px]">
                <p class="font-extrabold mb-3 text-[18px] lg:text-[22px] font-['Comic_Sans_MS',sans-serif]">{{ $col2Heading }}</p>
                <div class="contact-col-content">{!! $col2Content !!}</div>
            </div>

            {{-- Column 3: Urdu website --}}
            <div class="leading-relaxed text-[16px] lg:text-[20px]">
                <p class="font-extrabold mb-3 text-[18px] lg:text-[22px] font-['Comic_Sans_MS',sans-serif]">{{ $col3Heading }}</p>
                <div class="contact-col-content">{!! $col3Content !!}</div>
            </div>

        </div>
    </div>

    {{-- Section 3: Form card --}}
    <div class="py-8 md:py-14 px-4 sm:px-8 md:px-10">
        <div class="relative flex items-start justify-center max-w-3xl mx-auto">

            <div class="relative w-full rounded-2xl contact-form-card-bg
                px-6 py-10
                sm:px-12 sm:py-16
                lg:px-20 lg:py-24
                xl:px-24 xl:py-28
                mb-8 md:mb-10">

                <p class="font-['Raleway',sans-serif] text-[14px] sm:text-[16px] md:text-[17px] text-white mb-6 leading-snug">
                    {{ $formIntro }}
                </p>

                <form action="{{ route('contact') }}" method="POST" class="space-y-3">
                    @csrf

                    <div class="contact-input-wrap">
                        <span class="contact-input-icon"><x-icon-user /></span>
                        <input type="text" name="name" placeholder="Name" required class="contact-input font-['Raleway',sans-serif]">
                    </div>

                    <div class="contact-input-wrap">
                        <span class="contact-input-icon"><x-icon-email /></span>
                        <input type="email" name="email" placeholder="Email" required class="contact-input font-['Raleway',sans-serif]">
                    </div>

                    <div class="contact-input-wrap">
                        <span class="contact-input-icon"><x-icon-document /></span>
                        <input type="text" name="subject" placeholder="Subject" class="contact-input font-['Raleway',sans-serif]">
                    </div>

                    <div class="contact-input-wrap items-start">
                        <span class="contact-input-icon mt-[13px]">
                            <img src="{{ asset('images/contact-pen-icon.png') }}" alt="" class="w-[24px] h-[24px] object-contain">
                        </span>
                        <textarea name="message" placeholder="Message" required rows="5" class="contact-input font-['Raleway',sans-serif] resize-none"></textarea>
                    </div>

                    <div class="pt-1">
                        <button type="submit" class="contact-submit-btn font-['Raleway',sans-serif] font-extrabold">
                            Submit
                        </button>
                    </div>

                </form>

                <img src="{{ asset('images/contact-pen-deco.png') }}" alt=""
                     class="hidden lg:block absolute bottom-20 right-6 w-[35px] xl:w-[42px] h-auto pointer-events-none">

            </div>

        </div>
    </div>

</div>{{-- end contact-section-2-bg --}}

</div>{{-- end white wrapper --}}

@endsection
