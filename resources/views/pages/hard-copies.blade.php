@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Hard Copies') . ' | ICE')

@section('content')
    <div class="stars_bg min-h-screen">

        <div class="flex items-start justify-center pt-[30px] sm:pt-[40px] md:pt-[50px]">

            {{-- Title Button --}}
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
                    {{ $page?->title ?? 'Hard Copies' }}
                </button>
            </div>

            {{-- Title image --}}
            <div class="flex-shrink-0 pl-6 sm:pl-8 md:pl-12 pr-4 sm:pr-6">
                <img src="{{ $bookImage }}" alt="Hard Copy Book"
                    class="h-[48px] sm:h-[64px] md:h-[86px] w-auto">
            </div>

        </div>

        <!-- Spacer -->
        <div class="h-20"></div>

        <!-- Books Section -->
        <div class="flex justify-center w-full px-4 pt-10">
            <div class="w-full max-w-6xl p-4">
                <div class="flex flex-row w-full gap-4">
                    <!-- Left Column -->
                    <div class="flex-[3] p-4">
                        <div class="set-heading-ebook w-3/5">
                            <h3 class="child-heading">{{ $listHeading }}</h3>
                        </div>
                        <div class="text1raw mt-4">
                            <div class="list-disc pl-5">
                                {!! $bulletItems !!}
                            </div>
                            <div class="alert alert-info">
                                {{ $alertText }}
                            </div>
                            <div class="flex justify-center w-full mt-4">
                                <img src="{{ $checkoutImage }}" alt="Checkout" class="h-auto">
                            </div>
                            <p class="font-comic-regular mt-4" style="text-align: center !important;">{{ $shippingText }}</p>
                        </div>

                    </div>
                    <!-- Spacer: hidden on mobile, visible on desktop -->

                </div>

            </div>
        </div>

        <!-- Labels Row -->
        <div class="flex flex-row w-full gap-4 mt-6 px-8">
            <div class="flex-1 flex justify-center">
                <p class="font-comic-regular bg-white inline-block rounded-[15px] p-6">{{ $leftLabel }}</p>
            </div>
            <div class="flex-1 flex justify-center">
                <p class="font-comic-regular bg-white inline-block rounded-[15px] p-6">{{ $rightLabel }}</p>
            </div>
        </div>

        <!-- Images Row -->
        <div class="flex flex-row w-full gap-4 mt-4 pb-10 items-stretch">
            <div class="flex-1 h-[450px]">
                <img src="{{ $leftImage }}" alt="{{ $leftLabel }}" class="w-full h-full object-contain">
            </div>
            <div class="flex-1 h-[450px]">
                <img src="{{ $rightImage }}" alt="{{ $rightLabel }}" class="w-full h-full object-contain">
            </div>
        </div>

    </div>
@endsection
