@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Homeschooling') . ' | ICE')

@section('content')
    <div class="homeschooling_bg min-h-screen">

        {{-- Top Row: Title Button (left) + Image (right) --}}
        <div class="flex justify-center pt-[30px] sm:pt-[40px] md:pt-[50px]">

            <div class="flex items-start">

                <div class="mr-[10px] sm:mr-[25px]">
                    <button class="font-['Raleway',sans-serif] font-extrabold bg-white text-black
                        text-[16px] sm:text-[22px] md:text-[28px] lg:text-[36px]
                        px-[16px] sm:px-[28px] md:px-[40px] lg:px-[58px]
                        py-[10px] sm:py-[14px] md:py-[18px] lg:py-[22px]
                        rounded-[8px] sm:rounded-[10px] md:rounded-[14px]
                        shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
                        border-none capitalize leading-[1.2]
                        [text-shadow:0px_2px_0px_#8A8C8E]
                        whitespace-nowrap">
                        {{ $page?->title ?? 'Homeschooling' }}
                    </button>
                </div>

                <div class="ml-[10px] sm:ml-[25px]">
                    <img src="{{ asset('images/schoolicon.webp') }}"
                        alt="Homeschooling"
                        class="h-[36px] sm:h-[64px] md:h-[86px] w-auto">
                </div>

            </div>

        </div>

        {{-- Intro paragraph --}}
        <div class="flex justify-center mt-10">
            <div class="w-11/12 md:w-10/12 lg:w-8/12">
                <p class="hs-body-text">As our purpose is to familiarise the Muslim community with character education approaches as part of raising children, the course books are now also made available for home-schooling upon enormous requests. Separate instructions are given for this purpose in the books, along with specifications of how many participants the activity requires.</p>
                <p class="hs-body-text">Parents wishing to home-school their kids, relatives, etc., can purchase hard copies of the Educators box and Textbooks for the students through our website by <a href="{{ route('hard-copies') }}" class="hs-link">clicking here</a>.</p>
            </div>
        </div>

        {{-- Helping hand image --}}
        <div class="flex justify-center my-8 sm:my-10">
            <img src="{{ asset('images/helpinghand.webp') }}" alt="Helping Hand" class="w-[90%] sm:w-[75%] md:w-[60%] lg:w-auto max-w-full h-auto">
        </div>


        {{-- Text row with laptop via after effect --}}
        <div class="flex justify-center my-8 sm:my-10">
            <div class="lap-image w-11/12 md:w-10/12 lg:w-8/12">
                <p class="lap-center-text">The digital books are reserved for our professional online teachers to ensure quality and supervision</p>
                {{-- Laptop image visible only on mobile, hidden on md+ where ::after takes over --}}
                <div class="flex justify-center mt-4 md:hidden">
                    <img src="{{ asset('images/claptop.webp') }}" alt="Laptop" class="w-[70%] sm:w-[50%] h-auto">
                </div>
            </div>
        </div>

    </div>
@endsection
