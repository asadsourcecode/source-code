@extends('teacher.layouts.app')

@section('title', 'Dashboard | ICE Teacher Portal')

@section('portal-content')

{{-- ── 1. Upcoming Lesson — full-width card ─────────────────────────── --}}
<div class="rounded-2xl overflow-hidden bg-white border border-[#E5EAE3] mb-6 flex">

    {{-- LEFT: vertical flow, gap 10px, height 259px (Figma spec) --}}
    <div class="flex-1 min-w-0 px-8 py-7 flex flex-col gap-[10px] min-h-[259px]">

        <h2 class="font-['Work_Sans',sans-serif] font-bold text-[24px] leading-[33.6px] tracking-normal text-[#1B1C1C]">
            Upcoming Lesson
        </h2>

        <p class="font-['Work_Sans',sans-serif] font-semibold text-[13px] leading-[18.2px] tracking-normal text-[#6B7280]">
            Class: Character Building – Grade 4 (Section B)
        </p>

        <p class="font-['Work_Sans',sans-serif] font-normal text-[13px] leading-[18.2px] tracking-normal text-[#8A9490]">
            Topics: Honesty and Moral Integrity
        </p>

        {{-- Buttons: vertical stack, gap-8px, radius-8px --}}
        <div class="flex flex-col gap-[8px] w-full">

            {{-- Class Starts in 45 min: w-full, h-48px, radius-8px, py-12px, gap-8px, bg #216C22 10% --}}
            <button class="w-full h-[48px] flex items-center justify-center gap-[8px] bg-[#216C221A] text-[#216C22] font-['Work_Sans',sans-serif] font-bold text-[13px] leading-[18.2px] tracking-normal py-[12px] rounded-[8px] hover:bg-[#216C2230] transition">
                <i class="fa-regular fa-clock text-[#216C22] text-[12px]"></i>
                Class Starts in 45 min
            </button>

            {{-- Ask To Join Class: same dimensions, solid green --}}
            <button class="w-full h-[48px] flex items-center justify-center bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-bold text-[13px] leading-[18.2px] tracking-normal py-[12px] rounded-[8px] hover:bg-green-900 transition">
                Ask To Join Class
            </button>

        </div>

    </div>

    {{-- RIGHT: painting.webp --}}
    <div class="flex-shrink-0 flex items-end justify-center px-8">
        <img src="{{ asset('images/painting.webp') }}" alt="Teacher illustration"
             class="w-[320px] h-auto object-contain">
    </div>

</div>

{{-- ── 2. Weekly Schedule ────────────────────────────────────────────── --}}
<div class="mb-6">

    {{-- Heading + subtitle: full width --}}
    <h2 class="font-['Work_Sans',sans-serif] font-bold text-xl leading-[28px] tracking-normal text-[#1B1C1C] mb-0.5">
        Weekly Schedule
    </h2>
    <p class="font-['Work_Sans',sans-serif] font-normal text-sm text-[#8A9490] mb-4">
        Click on a day to view detailed activities
    </p>

    {{-- Same row: day pills (left) | mini card (right) — items-stretch so left fills mini card height --}}
    <div class="flex gap-5 mb-5">

        {{-- LEFT: day cards — stretch fills the row height automatically --}}
        <div class="flex-1 min-w-0 flex gap-2">

            {{-- Today — same base style, green border override --}}
            <button class="flex flex-col items-start justify-start flex-1 rounded-[16px] bg-[#216C220A] border-2 border-[#216C22] p-[16px] text-[#216C22] hover:bg-[#216C2215] transition">
                <span class="font-['Work_Sans',sans-serif] font-semibold text-[11px] leading-none tracking-[0.4px] mb-1">
                    Today
                </span>
                <span class="font-['Work_Sans',sans-serif] font-extrabold text-[36px] leading-none">
                    12
                </span>
            </button>

            {{-- TUE – SUN --}}
            @php
                $otherDays = [
                    ['abbr' => 'TUE', 'num' => '13', 'weekend' => false],
                    ['abbr' => 'WED', 'num' => '14', 'weekend' => false],
                    ['abbr' => 'THU', 'num' => '15', 'weekend' => false],
                    ['abbr' => 'FRI', 'num' => '16', 'weekend' => false],
                    ['abbr' => 'SAT', 'num' => '17', 'weekend' => true],
                    ['abbr' => 'SUN', 'num' => '18', 'weekend' => true],
                ];
            @endphp

            @foreach ($otherDays as $day)
                <button class="flex flex-col items-start justify-start flex-1 rounded-[16px] border border-[#C0C9B980] p-[16px] text-[#40493D] hover:border-[#216C22] hover:text-[#216C22] transition
                    {{ $day['weekend'] ? 'bg-[#F5F3F380]' : 'bg-white' }}">
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[11px] leading-none tracking-[0.4px] mb-1">
                        {{ $day['abbr'] }}
                    </span>
                    <span class="font-['Work_Sans',sans-serif] font-extrabold text-[20px] leading-none">
                        {{ $day['num'] }}
                    </span>
                </button>
            @endforeach

        </div>

        {{-- RIGHT: mini Weekly Schedule card --}}
        <div class="w-[380px] flex-shrink-0">
            <div class="bg-[#E4EEE4] border border-[#E5EAE3] rounded-2xl p-5">
                <h3 class="font-['Work_Sans',sans-serif] font-bold text-[15px] leading-[21px] tracking-normal text-[#1B1C1C] mb-1">
                    Weekly Schedule
                </h3>
                <p class="font-['Work_Sans',sans-serif] font-normal text-[12px] text-[#8A9490] mb-4">
                    Lorem ipsum dolor sit, consectetur.
                </p>
                <button class="w-full border border-[#216C22] text-[#216C22] font-['Work_Sans',sans-serif] font-semibold text-sm leading-[19.6px] tracking-normal py-2.5 rounded-full hover:bg-green-50 transition">
                    View Full Schedule
                </button>
            </div>
        </div>

    </div>

    {{-- Session rows: full width below --}}
    @php
        $sessions = [
            ['subject' => 'Subject Name', 'category' => 'Subject Category', 'students' => 25, 'time' => '8:00 PM – 10:00 PM'],
            ['subject' => 'Subject Name', 'category' => 'Subject Category', 'students' => 25, 'time' => '8:00 PM – 10:00 PM'],
            ['subject' => 'Subject Name', 'category' => 'Subject Category', 'students' => 25, 'time' => '8:00 PM – 10:00 PM'],
        ];
    @endphp

    <div class="flex flex-col gap-3">
        @foreach ($sessions as $session)
        <div class="bg-white rounded-xl border border-[#E5EAE3] px-5 py-4 grid grid-cols-4 items-center gap-4">

            {{-- Col 1: Subject Name --}}
            <div class="min-w-0">
                <p class="font-['Work_Sans',sans-serif] font-bold text-[15px] leading-[21px] text-[#1B1C1C]">
                    {{ $session['subject'] }}
                </p>
                <p class="font-['Work_Sans',sans-serif] font-semibold text-[13px] leading-[18.2px] text-[#8A9490] mt-0.5">
                    {{ $session['category'] }}
                </p>
            </div>

            {{-- Col 2: Students --}}
            <div class="flex items-center gap-1.5 justify-center">
                <i class="fa-solid fa-user-group text-[12px] text-[#8A9490]"></i>
                <span class="font-['Work_Sans',sans-serif] font-semibold text-sm text-[#40493D]">
                    {{ $session['students'] }} Students
                </span>
            </div>

            {{-- Col 3: Time --}}
            <div class="flex items-center gap-1.5 justify-center">
                <i class="fa-regular fa-clock text-[12px] text-[#8A9490]"></i>
                <span class="font-['Work_Sans',sans-serif] font-semibold text-sm text-[#40493D]">
                    {{ $session['time'] }}
                </span>
            </div>

            {{-- Col 4: Buttons stacked, right-aligned --}}
            <div class="flex flex-col gap-2 items-end">
                <button class="w-[155px] h-[40px] flex items-center justify-center gap-[8px] px-[24px] rounded-[9999px] bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[13px] hover:opacity-90 transition {{ $loop->first ? '' : 'opacity-50' }}">
                    Start Session
                </button>
                <button class="w-[155px] h-[40px] flex items-center justify-center gap-[8px] px-[24px] rounded-[9999px] border border-[#C0C9B9] text-[#40493D] font-['Work_Sans',sans-serif] font-semibold text-[13px] hover:bg-gray-50 transition">
                    View Details
                </button>
            </div>

        </div>
        @endforeach
    </div>

</div>

{{-- ── 3. My Books — full-width 4-column grid ───────────────────────── --}}
<div>

    <div class="flex items-end justify-between mb-4">
        <div>
            <h2 class="font-['Work_Sans',sans-serif] font-bold text-xl leading-[28px] tracking-normal text-[#1B1C1C]">
                My Books
            </h2>
            <p class="font-['Work_Sans',sans-serif] font-normal text-sm text-[#8A9490] mt-0.5">
                Quickly access the books you teach
            </p>
        </div>
    </div>

    @php
        $books = [
            [
                'title'    => 'Apocalypse For Everyone',
                'image'    => 'book1.webp',
                'subject'  => 'Grade 4 – Character Education',
                'progress' => 65,
            ],
            [
                'title'    => 'The Art Of Storytelling',
                'image'    => 'book2.webp',
                'subject'  => 'Grade 5 – Language Arts',
                'progress' => 40,
            ],
            [
                'title'    => 'Culinary Delights',
                'image'    => 'book3.webp',
                'subject'  => 'Grade 3 – Life Skills',
                'progress' => 80,
            ],
            [
                'title'    => 'Character Building',
                'image'    => 'book4.webp',
                'subject'  => 'Grade 6 – Values Education',
                'progress' => 25,
            ],
        ];
    @endphp

    <div class="grid grid-cols-4 gap-4">
        @foreach ($books as $book)

        {{-- Book card: white, border-2 #C0C9B94D 30%, radius 16px, vertical flex --}}
        <div class="flex flex-col bg-white border-2 border-[#C0C9B94D] rounded-[16px] overflow-hidden">

            {{-- Image container: h-293px, p-10px, gap-10px, horizontal --}}
            <div class="flex items-center justify-center h-[293px] p-[10px] gap-[10px] bg-[#F5F7F5]">
                <img src="{{ asset('images/' . $book['image']) }}"
                     alt="{{ $book['title'] }}"
                     class="h-full w-full object-contain rounded-[8px]">
            </div>

            {{-- Card body: title + progress + button --}}
            <div class="flex flex-col gap-3 p-4">

                {{-- Subject name --}}
                <div>
                    <p class="font-['Work_Sans',sans-serif] font-bold text-[14px] leading-[19.6px] tracking-normal text-[#1B1C1C]">
                        {{ $book['title'] }}
                    </p>
                    <p class="font-['Work_Sans',sans-serif] font-normal text-[12px] text-[#8A9490] mt-0.5">
                        {{ $book['subject'] }}
                    </p>
                </div>

                {{-- How much read: progress bar --}}
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="font-['Work_Sans',sans-serif] font-semibold text-[11px] text-[#8A9490]">Read</span>
                        <span class="font-['Work_Sans',sans-serif] font-bold text-[11px] text-[#2FE432]">{{ $book['progress'] }}%</span>
                    </div>
                    <div class="w-full h-1.5 bg-[#E5EAE3] rounded-full overflow-hidden">
                        <div class="h-full bg-[#2FE432] rounded-full" style="width: {{ $book['progress'] }}%"></div>
                    </div>
                </div>

                {{-- Open Book button --}}
                <button class="w-full bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[13px] leading-[18.2px] tracking-normal py-2.5 rounded-full hover:bg-green-900 transition">
                    Open Book
                </button>

            </div>
        </div>

        @endforeach
    </div>

</div>

@endsection
