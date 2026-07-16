@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | ICE')
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)

@section('content')
    <div class="online_classes_bg min-h-screen" @if($bgStyle) style="{{ $bgStyle }}" @endif>

        {{-- Title button --}}
        <div class="flex justify-center w-full px-4 pt-[30px] sm:pt-[40px] md:pt-[50px]">
            <div class="w-full max-w-5xl flex items-start justify-center">
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
            </div>
        </div>

        {{-- First content block --}}
        <div class="flex justify-center mt-10">
            <div class="w-11/12 md:w-10/12 lg:w-8/12">

                @if($introText)
                    <p class="oc-body-text">{{ $introText }}</p>
                @endif

                @if($launchingText)
                    <p class="oc-body-text oc-launching-soon">{{ $launchingText }}</p>
                @endif

                @if($onlineTeachersHeading)
                    <div class="mb-[10px]">
                        <strong class="pages-heading-bottom-border oc-online-teachers">{{ $onlineTeachersHeading }}</strong>
                    </div>
                @endif

                @if($teachWithUsHeading)
                    <div class="w-fit mb-[10px]">
                        <span class="oc-heading oc-heading-spaced">{{ $teachWithUsHeading }}</span>
                    </div>
                @endif

                @if($teachWithUsContent)
                    <div class="oc-body-text">{!! $teachWithUsContent !!}</div>
                @endif

            </div>
        </div>

        {{-- Banner image section --}}
        <div class="online-classes-banner" @if($bannerStyle) style="{{ $bannerStyle }}" @endif></div>

        {{-- Dynamic sections --}}
        @if($sections)
            <div class="flex justify-center mt-10">
                <div class="w-11/12 md:w-10/12 lg:w-8/12">

                    @foreach($sections as $section)
                        @if(!empty($section['heading']))
                            <div class="w-fit mt-5 mb-4">
                                <span class="oc-heading">{{ $section['heading'] }}</span>
                            </div>
                        @endif
                        @if(!empty($section['content']))
                            <div class="oc-body-text">{!! $section['content'] !!}</div>
                        @endif
                    @endforeach

                </div>
            </div>
        @endif

        {{-- Classroom image --}}
        <div class="flex justify-center mt-10">
            <img src="{{ $classroomImage }}" alt="Classroom" class="w-full max-w-5xl h-auto">
        </div>

    </div>
@endsection
