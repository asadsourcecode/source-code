@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | ICE')

@section('content')

<div class="min-h-screen pt-[80px]"
    style="background-image: url('{{ $bgImage }}'); background-size: 100% auto; background-position: top center; background-repeat: no-repeat;">

    <div class="flex justify-center">
    <div class="w-full sm:w-10/12 lg:w-8/12 px-4">

        {{-- Top Row: About Us Button (left) + Book Image (right) --}}
        <div class="flex items-start justify-center pt-[30px] sm:pt-[40px] md:pt-[50px]">

            {{-- Button wrapper --}}
            <div class="min-w-0 flex-1 max-w-[180px] sm:max-w-[240px] md:max-w-[300px]">
                <button class="font-['Raleway',sans-serif] font-extrabold bg-white text-black
                    text-[16px] sm:text-[22px] md:text-[28px] lg:text-[36px]
                    px-[16px] sm:px-[28px] md:px-[40px] lg:px-[58px]
                    py-[10px] sm:py-[14px] md:py-[18px] lg:py-[22px]
                    rounded-[8px] sm:rounded-[10px] md:rounded-[14px]
                    shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
                    border-none capitalize leading-[1.2]
                    [text-shadow:0px_2px_0px_#8A8C8E]
                    whitespace-nowrap">
                    {{ $page->title }}
                </button>
            </div>

            {{-- Book image --}}
            <div class="flex-shrink-0 pl-2 sm:pl-3 md:pl-4">
                <img src="{{ $bookImage }}"
                    alt="Course Book"
                    class="h-[48px] sm:h-[64px] md:h-[86px] w-auto">
            </div>

        </div>

        {{-- Main Content --}}
        @if($mainContent)
        <div class="about-content px-0 py-5 sm:py-6 md:py-8">
            {!! $mainContent !!}
        </div>
        @endif

        {{-- About the Author --}}
        @if($authorContent)
        <div class="mt-1 sm:mt-2">
            <h2 class="font-['Raleway',sans-serif] font-bold
                text-[18px] sm:text-[22px] md:text-[26px] lg:text-[30px]
                bg-white inline-block
                px-[8px] pt-[3px] pb-[7px]
                mt-[16px] sm:mt-[20px]
                mb-[8px] sm:mb-[10px]">
                About the Author:
            </h2>
            <div class="about-content pb-0">
                {!! $authorContent !!}
            </div>
        </div>
        @endif

        {{-- ICE Logo Watermark --}}
        <div class="flex justify-center mt-0 sm:-mt-32">
            <img src="{{ asset('images/logo-Nw.webp') }}"
                alt="ICE Publishers - Integrated Character Education"
                class="w-[300px] sm:w-[420px] md:w-[550px] lg:w-[700px] h-auto">
        </div>

    </div>
    </div>

</div>

@endsection
