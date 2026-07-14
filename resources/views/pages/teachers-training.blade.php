@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: "Teacher's Training") . ' | ICE')
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)

@section('content')
    <div class="teachers-training-bg" @if($bgStyle) style="{{ $bgStyle }}" @endif>

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
                    {{ $page?->title ?? "Teacher's Training" }}
                </button>
            </div>
        </div>

        {{-- Main content --}}
        <div class="flex justify-center mt-10">
            <div class="w-11/12 md:w-10/12 lg:w-8/12">

                @if($introPara)
                    <p class="tt-body-text">{{ $introPara }}</p>
                @endif

                @if($offerHeading)
                    <div>
                        <span class="child-heading">{{ $offerHeading }}</span>
                    </div>
                @endif

                @if($offerPoint1)
                    <p class="tt-body-text pt-[18px]">{{ $offerPoint1 }}</p>
                @endif

                @if($offerPoint2)
                    <p class="tt-body-text">{{ $offerPoint2 }}</p>
                @endif

                @if($section1Heading)
                    <div>
                        <span class="child-heading">{{ $section1Heading }}</span>
                    </div>
                @endif

                @if($section1Para1)
                    <p class="tt-body-text pt-5">{{ $section1Para1 }}</p>
                @endif

                @if($section1Para2)
                    <p class="tt-body-text">{{ $section1Para2 }}</p>
                @endif

                @if($listHeading)
                    <p class="tt-body-text"><strong>{{ $listHeading }}</strong></p>
                @endif

                @if($bulletList)
                    <div class="oc-body-text">{!! $bulletList !!}</div>
                @endif

                @if($customCourses)
                    <p class="tt-body-text">{{ $customCourses }}</p>
                @endif

                {{-- Source Code Academia row --}}
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-6 mt-4 mb-4">
                    @if($scaContactPara)
                        <p class="tt-body-text flex-1">{{ $scaContactPara }}</p>
                    @endif
                    <div class="flex-shrink-0">
                        <img src="{{ $scaImage }}" alt="Source Code Academia" class="max-h-[60px] sm:max-h-[80px] w-auto">
                    </div>
                </div>

                @if($section2Heading)
                    <div>
                        <span class="child-heading">{{ $section2Heading }}</span>
                    </div>
                @endif

                @if($contactPara)
                    <p class="tt-body-text">{!! $contactPara !!}</p>
                @endif

                @if($licensePara)
                    <p class="tt-body-text">{{ $licensePara }}</p>
                @endif

                @if($moreInfoPara)
                    <p class="tt-body-text">{!! $moreInfoPara !!}</p>
                @endif

            </div>
        </div>

    </div>

    {{-- Bottom image --}}
    <div class="bg-[#E6D6E0]">
        <div class="container mx-auto px-4 py-10">
            <img src="{{ $meetingImage }}" alt="Meeting" class="w-full h-auto">
        </div>
    </div>

@endsection
