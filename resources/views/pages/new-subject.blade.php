@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'New Subject') . ' | ICE')
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)

@section('content')

    <div class="new-subject-bg">

        <div class="flex items-start justify-center pt-4 min-h-screen">
            <div class="section-block w-full">

                {{-- â”€â”€ Title Box â”€â”€ --}}
                <div class="text-center mt-4">
                    <button class="font-raleway-extrabold custom-btn page_character-building rounded-[14px]">
                        {{ $page?->title ?? '"Character Building" as an Independent Subject' }}
                    </button>
                </div>

                {{-- â”€â”€ Launching Heading â”€â”€ --}}
                <div class="flex justify-center my-6">
                    <span class="child-heading font-raleway-bold launching-heading">{!! nl2br(e($launchingHeading)) !!}</span>
                </div>

                <div>
                    <div class="new-subject-content max-w-[900px] mx-auto px-6 pt-[60px]">

                        {{-- â”€â”€ Four Intro Paragraphs â”€â”€ --}}
                        <p>{{ $para1 }}</p>
                        <p>{{ $para2 }}</p>
                        <p>{{ $para3 }}</p>
                        <p>{{ $para4 }}</p>

                        {{-- â”€â”€ Building Image â”€â”€ --}}
                        <div class="flex flex-wrap gap-5 justify-center my-9">
                            <img src="{{ $buildingImage }}" alt="Building"
                                 class="w-[90%] min-w-[340px] max-w-[900px] h-[520px] object-cover rounded-[156px] shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                        </div>
                        <hr class="border-0 border-t-2 border-gray-200 mb-8">

                        {{-- â”€â”€ Approach Text â”€â”€ --}}
                        <p>{{ $approachText }}</p>

                        <ul class="list-none p-0 mb-8">
                            @foreach($bulletItems as $item)
                                <li class="flex items-start gap-3 mb-[55px]">
                                    <span class="w-[10px] h-[10px] min-w-[10px] bg-[#3d5228] rounded-full mt-2 inline-block flex-shrink-0"></span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>

                        {{-- â”€â”€ Four Closing Paragraphs â”€â”€ --}}
                        <p><em><strong>{{ $quoteText }}</strong></em></p>
                        <p>{{ $educationistsText }}</p>
                        <p>{{ $programmeAimsText }}</p>
                        <p>{{ $closingPrayerText }}</p>

                        {{-- â”€â”€ Girls Image â”€â”€ --}}
                        <div class="grid place-items-center mb-6">
                            <img src="{{ $girlsImage }}" alt="Girls in classroom"
                                 class="w-[90%] min-w-[340px] max-w-[900px] h-[520px] object-cover shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
