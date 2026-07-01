@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'E-Books') . ' | ICE')

@section('content')
    <div class="shutter_bg">

        <div class="text-center">
            <button class="font-raleway-extrabold custom-btn page_ebook-2">{{ $page?->title ?? 'E-Books' }}</button>
        </div>

        <!-- Books Section -->
        <div class="flex justify-center w-full px-4 pt-10">
            <div class="w-full max-w-6xl p-4">
                <div class="w-full">
                    <div class="p-4">
                        <div class="set-heading-ebook">
                            <h3 class="child-heading">{{ $recommendHeading }}</h3>
                        </div>
                        <div class="text1raw mt-4">
                            {!! $bulletItems !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Section -->
        <div class="flex justify-center w-full pt-10">
            <div class="w-full max-w-5xl">
                <img src="{{ $mainImage }}" alt="Education System" class="block w-full h-auto">
            </div>
        </div>

        <!-- Button and Boy Image -->
        <div class="flex justify-center w-full px-4 pt-10">
            <div class="w-full max-w-6xl flex flex-col lg:flex-row lg:justify-between lg:items-end">
                <!-- Button -->
                <a href="{{ $catalogButtonUrl }}" class="faith self-start lg:self-center mb-4 lg:mb-0">
                    <b class="text-xl">{{ $catalogButtonText }}</b>
                </a>
                <!-- Boy image -->
                <img src="{{ $boyImage }}" alt="" class="block w-[260px] lg:w-[500px] boy-image-ebook mx-auto lg:mx-0">
            </div>
        </div>

    </div>
@endsection
