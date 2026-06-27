@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'New Subject') . ' | ICE')

@section('content')

    <div class="new-subject-bg">

        <div class="flex items-start justify-center pt-4" style="min-height: 100vh;">
            <div class="section-block w-full">

                {{-- ── Title Box ── --}}
                <div class="max-w-4xl mx-auto border-4 p-8 rounded-lg mt-4 shadow-[0px_4px_6px_rgba(0,0,0,0.9)]" style="background-color: white !important;">
                    <div class="text-center">
                        <h1 class="font-raleway-extrabold text-3xl font-bold mb-6" style="color: black !important;">
                            {{ $page?->title ?? '"Character Building" as an Independent Subject' }}
                        </h1>
                    </div>
                </div>

                {{-- ── Launching Heading ── --}}
                <div class="text1raw">
                    <p class="text-center"><span class="child-heading font-raleway-bold">{!! nl2br(e($launchingHeading)) !!}</span></p>
                </div>

                <div>
                    <div class="new-subject-content" style="max-width: 900px; margin: 0 auto; padding: 60px 24px 180px 24px;">

                        {{-- ── Four Intro Paragraphs ── --}}
                        <p>{{ $para1 }}</p>
                        <p>{{ $para2 }}</p>
                        <p>{{ $para3 }}</p>
                        <p>{{ $para4 }}</p>

                        {{-- ── Building Image ── --}}
                        <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin: 36px 0;">
                            <img src="{{ $buildingImage }}" alt="Building"
                                 style="width: 90%; min-width: 340px; max-width: 900px; height: 520px; object-fit: cover; border-radius: 156px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                        </div>

                        <hr style="border: none; border-top: 2px solid #e5e7eb; margin-bottom: 32px;">

                        {{-- ── Approach Text + Bullet List ── --}}
                        <p>{{ $approachText }}</p>

                        <ul style="list-style: none; padding: 0; margin: 0 0 32px 0;">
                            @foreach($bulletItems as $item)
                                <li style="display: flex; align-items: flex-start; gap: 12px; margin-bottom: 10px;">
                                    <span style="width: 10px; height: 10px; min-width: 10px; background-color: #3d5228; border-radius: 50%; margin-top: 8px; display: inline-block;"></span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>

                        {{-- ── Four Closing Paragraphs ── --}}
                        <p><em><strong>{{ $quoteText }}</strong></em></p>
                        <p>{{ $educationistsText }}</p>
                        <p>{{ $programmeAimsText }}</p>
                        <p>{{ $closingPrayerText }}</p>

                        {{-- ── Girls Image ── --}}
                        <div class="grid place-items-center mb-6">
                            <img src="{{ $girlsImage }}" alt="Girls in classroom"
                                 style="width: 90%; min-width: 340px; max-width: 900px; height: 520px; object-fit: cover; border-radius: 0; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
