@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Audio Stories') . ' | ICE')

@section('content')
    <div class="audio-stories-bg min-h-screen" @if($bgStyle) style="{{ $bgStyle }}" @endif>

        {{-- Title Button --}}
        <div class="flex justify-center w-full px-4 pt-[30px] sm:pt-[40px] md:pt-[50px]">
            <div class="w-full max-w-6xl flex items-start justify-center">
                <button class="font-['Raleway',sans-serif] font-extrabold bg-white text-black
                    text-[16px] sm:text-[22px] md:text-[28px] lg:text-[36px]
                    px-[16px] sm:px-[28px] md:px-[40px] lg:px-[58px]
                    py-[10px] sm:py-[14px] md:py-[18px] lg:py-[22px]
                    rounded-[8px] sm:rounded-[10px] md:rounded-[14px]
                    shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
                    border-none capitalize leading-[1.2]
                    [text-shadow:0px_2px_0px_#8A8C8E]
                    break-words min-w-0">
                    {{ $page?->title ?? 'Audio Stories' }}
                </button>
            </div>
        </div>

        {{-- Content --}}
        <div class="flex justify-center mt-8 sm:mt-10">
            <div class="w-11/12 md:w-10/12 lg:w-8/12">

                @if($introPara)
                    <p class="oc-body-text">{{ $introPara }}</p>
                @endif

                @if($audioUrl)
                    <p class="oc-body-text">
                        <strong>{{ $audioLabel }} <span class="charcoal-bluish-txt">{{ $audioTitle }}</span></strong>
                    </p>
                    <audio controls controlslist="nodownload">
                        <source src="{{ $audioUrl }}" type="audio/mpeg">
                    </audio>
                    <br><br>
                @endif

                @if($quote)
                    <p class="oc-body-text text-black">"{{ $quote }}"</p>
                @endif

                @if($citation1)
                    <p class="oc-body-text font-light text-[13px] sm:text-[15px] md:text-[17px] lg:text-[20px] text-black">
                        <em>{{ $citation1 }}</em>
                    </p>
                @endif

                @if($narrativePara)
                    <p class="oc-body-text">{{ $narrativePara }}</p>
                @endif

                @if($citation2)
                    <p class="oc-body-text text-[13px] sm:text-[15px] md:text-[17px] lg:text-[20px]">
                        <em>{{ $citation2 }}</em>
                    </p>
                @endif

                @if($imaginePara)
                    <p class="oc-body-text">{{ $imaginePara }}</p>
                @endif

                @if($blueQuote)
                    <p class="oc-body-text text-[#325D9B]">{{ $blueQuote }}</p>
                @endif

                @if($citation3)
                    <p class="oc-body-text"><em>{{ $citation3 }}</em></p>
                @endif

                @if($availabilityLine)
                    <p class="oc-body-text"><strong>{{ $availabilityLine }}</strong></p>
                @endif

                @if($courseBoxLinks)
                    <div class="font-comic-bold text-[13px] sm:text-[16px] md:text-[20px] lg:text-[24px] leading-[1.4]">
                        {!! $courseBoxLinks !!}
                    </div>
                @endif

            </div>
        </div>

        {{-- Headphone image --}}
        <div class="flex justify-center mt-5 mb-[40px] sm:mb-[60px] lg:mb-[100px]">
            <img src="{{ $headphoneImage }}" alt="Headphone"
                class="w-[80%] sm:w-[60%] md:w-[50%] lg:w-auto max-w-full h-auto">
        </div>

    </div>
@endsection
