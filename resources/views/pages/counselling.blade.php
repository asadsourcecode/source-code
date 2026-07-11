@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Counselling') . ' | ICE')

@section('content')

<div class="bg-white flex flex-col gap-0">

    {{-- Section 1: Background image with title overlay --}}
    <div class="relative block m-0 leading-none">
        <img src="{{ $bg1Image }}" alt="" class="w-full block min-h-[200px] object-fill">
        <div class="absolute top-[40px] left-0 right-0 flex justify-center px-3">
            <button class="font-['Raleway',sans-serif] font-extrabold bg-white text-black
                text-[18px] sm:text-[24px] md:text-[28px] lg:text-[32px]
                px-[14px] sm:px-[28px] md:px-[40px] lg:px-[58px]
                py-[8px] sm:py-[12px] md:py-[16px] lg:py-[22px]
                rounded-[8px] sm:rounded-[10px] md:rounded-[14px]
                shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
                border-none capitalize leading-[1.2]
                [text-shadow:0px_2px_0px_#8A8C8E]
                break-words min-w-0">
                {{ $page?->title ?? 'Counselling' }}
            </button>
        </div>
    </div>

    {{-- Section 2: Credentials list --}}
    <div class="bg-[length:100%_100%] bg-center bg-no-repeat min-h-[400px] block m-0"
         @if($bg2Style) style="{{ $bg2Style }}" @else style="background-image: url('{{ asset('images/conselling_1_small.webp') }}');" @endif>

        <div class="counseling text1raw font-comic-regular flex flex-col items-center pb-8 sm:pb-10 px-4 sm:px-8 md:px-12 pt-0">

            <div class="w-full max-w-3xl text-[14px] sm:text-[16px] md:text-[18px] lg:text-[20px] counselling-credentials">
                {!! $credentials !!}
            </div>

            <div class="mt-6 sm:mt-10 w-full flex justify-center">
                <a href="{{ route('logotherapy') }}">
                    <img src="{{ $buttonImage }}" alt="" class="max-w-[80%] sm:max-w-full h-auto">
                </a>
            </div>

            <div class="mt-4 sm:mt-6 w-full flex justify-center">
                <img src="{{ $manImage }}" alt="" class="max-w-[80%] sm:max-w-full h-auto">
            </div>

        </div>

    </div>

    {{-- Section 3: Quote --}}
    @if($quote)
    <div class="counselling-sometimes-white-bg bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-[16px] sm:text-[18px] md:text-[20px] lg:text-[24px] font-['Comic_Sans_MS',sans-serif] font-bold text-start m-0 ml-5">
                {{ $quote }}
            </p>
        </div>
    </div>
    @endif

    {{-- Section 4: Life & Faith --}}
    <div class="bg-[length:100%_100%] bg-center bg-no-repeat block m-0 pt-10 px-4 pb-[100px]"
         @if($bg2Style) style="{{ $bg2Style }}" @else style="background-image: url('{{ asset('images/conselling_1_small.webp') }}');" @endif>

        <div class="flex justify-center mb-[30px]">
            <img src="{{ $lifeImage }}" alt="" class="max-w-full h-auto block">
        </div>

        <div class="left-image-text-section max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">

                <div class="md:col-span-3 flex justify-center items-center">
                    <img src="{{ $iconImage }}" alt="" class="w-[60%] md:w-full h-auto block">
                </div>

                <div class="md:col-span-9">
                    @if($therapyPara)
                    <p class="font-con font-comic-bold text-[14px] sm:text-[16px] md:text-[18px] lg:text-[20px] text-[#215083] text-justify leading-[1.5] mb-5">
                        {{ $therapyPara }}
                    </p>
                    @endif

                    @if($faithBtnText)
                    <button onclick="window.location.href='/pages/counselling-or-logotherapy'"
                        class="font-comic-bold custom-faith text-[14px] sm:text-[18px] md:text-[20px] lg:text-[24px]">
                        {{ $faithBtnText }}
                    </button>
                    @endif
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
