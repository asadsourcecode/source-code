@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title . ' | ICE')

@section('content')

    {{-- Hero / Banner --}}
    @if($page->banner_image)
        <div class="w-full h-[300px] md:h-[400px] relative overflow-hidden">
            <img src="{{ asset('admin-storage/' . $page->banner_image) }}"
                 alt="{{ $page->title }}"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                <h1 class="text-white text-[42px] md:text-[56px] font-extrabold text-center drop-shadow-lg px-4">
                    {{ $page->title }}
                </h1>
            </div>
        </div>
    @else
        <div class="bg-[#ecfde8] py-14 text-center">
            <h1 class="text-[42px] md:text-[52px] font-extrabold text-black">
                <span class="heading-bg-gr normal-case">{{ $page->title }}</span>
            </h1>
        </div>
    @endif

    {{-- Breadcrumb --}}
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-5xl mx-auto px-4 py-3 text-sm text-gray-500">
            <a href="/" class="hover:text-[#96c58f]">Home</a>
            <span class="mx-2">/</span>
            <span class="text-gray-700 font-medium">{{ $page->title }}</span>
        </div>
    </div>

    {{-- Body --}}
    <section class="py-14 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">

            @if($page->featured_image || $page->short_description)
                <div class="flex flex-col md:flex-row gap-10 items-start mb-12">

                    @if($page->featured_image)
                        <div class="md:w-2/5 shrink-0">
                            <img src="{{ asset('admin-storage/' . $page->featured_image) }}"
                                 alt="{{ $page->title }}"
                                 class="w-full h-auto rounded-2xl shadow-md">
                        </div>
                    @endif

                    @if($page->short_description)
                        <div class="flex-1 flex items-center">
                            <p class="text-[17px] text-gray-700 leading-relaxed font-medium">
                                {{ $page->short_description }}
                            </p>
                        </div>
                    @endif

                </div>
            @endif

            @if($page->content)
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    {!! $page->content !!}
                </div>
            @endif

        </div>
    </section>

@endsection
