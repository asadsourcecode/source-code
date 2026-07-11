@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Homeschooling') . ' | ICE')

@section('content')
    <div class="homeschooling_bg min-h-screen">

        {{-- Top Row: Title Button + Image --}}
        <div class="flex justify-center w-full px-4 pt-[30px] sm:pt-[40px] md:pt-[50px]">
            <div class="w-full max-w-6xl flex items-start justify-center gap-3 sm:gap-4">

                <button class="font-['Raleway',sans-serif] font-extrabold bg-white text-black
                    text-[16px] sm:text-[22px] md:text-[28px] lg:text-[36px]
                    px-[16px] sm:px-[28px] md:px-[40px] lg:px-[58px]
                    py-[10px] sm:py-[14px] md:py-[18px] lg:py-[22px]
                    rounded-[8px] sm:rounded-[10px] md:rounded-[14px]
                    shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
                    border-none capitalize leading-[1.2]
                    [text-shadow:0px_2px_0px_#8A8C8E]
                    break-words min-w-0">
                    {{ $page?->title ?? 'Homeschooling' }}
                </button>

                <img src="{{ $featuredImage }}" alt="Homeschooling"
                    class="flex-shrink-0 h-[48px] sm:h-[64px] md:h-[86px] w-auto">

            </div>
        </div>

        {{-- Intro paragraphs --}}
        <div class="flex justify-center mt-10">
            <div class="w-11/12 md:w-10/12 lg:w-8/12">
                @if($introPara1)
                    <p class="hs-body-text">{{ $introPara1 }}</p>
                @endif
                @if($introPara2)
                    <p class="hs-body-text">{!! $introPara2 !!}</p>
                @endif
            </div>
        </div>

        {{-- Helping hand image --}}
        <div class="flex justify-center my-8 sm:my-10">
            <img src="{{ $helpingHandImage }}" alt="Helping Hand"
                class="w-[90%] sm:w-[75%] md:w-[60%] lg:w-auto max-w-full h-auto">
        </div>

        {{-- Laptop text block --}}
        <div class="flex justify-center my-8 sm:my-10">
            <div class="lap-image w-11/12 md:w-10/12 lg:w-8/12">
                @if($laptopText)
                    <p class="lap-center-text">{{ $laptopText }}</p>
                @endif
                {{-- Laptop image visible only on mobile, hidden on md+ where ::after takes over --}}
                <div class="flex justify-center mt-4 md:hidden">
                    <img src="{{ $laptopImage }}" alt="Laptop" class="w-[70%] sm:w-[50%] h-auto">
                </div>
            </div>
        </div>

    </div>
@endsection
