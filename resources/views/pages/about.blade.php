@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | ICE')
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)

@section('content')

<div class="min-h-screen pt-[80px]"
    >

    <div class="flex justify-center">
    <div class="w-full sm:w-10/12 lg:w-8/12 px-4">

        {{-- Top Row: About Us Button (left) + Book Image (right) --}}
        <div class="flex items-start justify-center gap-3 sm:gap-4 pt-[30px] sm:pt-[40px] md:pt-[50px]">

            {{-- Title button --}}
            <button class="font-['Raleway',sans-serif] font-extrabold bg-white text-black
                text-[16px] sm:text-[22px] md:text-[28px] lg:text-[36px]
                px-[16px] sm:px-[28px] md:px-[40px] lg:px-[58px]
                py-[10px] sm:py-[14px] md:py-[18px] lg:py-[22px]
                rounded-[8px] sm:rounded-[10px] md:rounded-[14px]
                shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
                border-none capitalize leading-[1.2]
                [text-shadow:0px_2px_0px_#8A8C8E]
                break-words min-w-0">
                {{ $page->title }}
            </button>

            {{-- Book image --}}
            <img src="{{ $bookImage }}"
                alt="Course Book"
                class="flex-shrink-0 h-[48px] sm:h-[64px] md:h-[86px] w-auto">

        </div>

        {{-- Main Content --}}
        @if($mainContent)
        <div class="about-content px-0 py-5 sm:py-6 md:py-8">
            {!! $mainContent !!}
        </div>
        @endif

        {{-- About the Author --}}
        @if($authorContent)
        <div>
            <span class="child-heading font-raleway-bold">About the Author:</span>
            <div class="about-content">
                {!! $authorContent !!}
            </div>
        </div>
        @endif

        {{-- Source Code Academy Link --}}
        <div class="text-center my-4">
            <a href="https://www.sourcecode.academy" target="_blank" class="text-blue-600 hover:underline text-[16px]">
                www.sourcecode.academy
            </a>
        </div>

        {{-- ICE Logo Watermark --}}
        <div class="flex justify-center mt-0 sm:-mt-32 mx-auto w-[300px] sm:w-[420px] md:w-[550px] lg:w-[700px]">
            <img src="{{ $logoImage }}"
                alt="ICE Publishers - Integrated Character Education"
                class="w-full h-auto"
                >
        </div>

    </div>
    </div>

</div>

@endsection
