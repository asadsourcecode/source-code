@extends('student.layouts.app')

@section('title', 'Dashboard | ICE Student Portal')

@section('portal-content')

{{-- ── 1. Upper Section: Upcoming Lesson + Attendance ──────────────────── --}}
<div class="flex gap-5 mb-6">

    {{-- LEFT: Ready for Your Next Lesson card --}}
    <div class="flex-1 min-w-0 rounded-2xl overflow-hidden bg-white border border-[#E5EAE3] flex">

        {{-- LEFT inner: text + buttons --}}
        <div class="flex-1 min-w-0 px-8 py-7 flex flex-col gap-[10px] min-h-[259px]">

            <h2 class="font-['Work_Sans',sans-serif] font-bold text-[24px] leading-[33.6px] tracking-normal text-[#1B1C1C]">
                Ready for Your Next Lesson!
            </h2>

            <p class="font-['Work_Sans',sans-serif] font-semibold text-[13px] leading-[18.2px] tracking-normal text-[#6B7280]">
                Class: Character Building – Grade 4 (Section B)
            </p>

            <p class="font-['Work_Sans',sans-serif] font-normal text-[13px] leading-[18.2px] tracking-normal text-[#8A9490]">
                Topics: Honesty and Moral Integrity
            </p>

            {{-- Buttons: vertical stack --}}
            <div class="flex flex-col gap-[8px] w-full">

                {{-- Class Starts in 45 min --}}
                <button class="w-full h-[48px] flex items-center justify-center gap-[8px] bg-[#216C221A] text-[#216C22] font-['Work_Sans',sans-serif] font-bold text-[13px] leading-[18.2px] tracking-normal py-[12px] rounded-[8px] hover:bg-[#216C2230] transition">
                    <i class="fa-regular fa-clock text-[#216C22] text-[12px]"></i>
                    Class Starts in 45 min
                </button>

                {{-- Ask To Join Class --}}
                <button class="w-full h-[48px] flex items-center justify-center bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-bold text-[13px] leading-[18.2px] tracking-normal py-[12px] rounded-[8px] hover:bg-green-900 transition">
                    Ask To Join Class
                </button>

            </div>

        </div>

        {{-- RIGHT inner: illustration --}}
        <div class="flex-shrink-0 flex items-end justify-center px-8">
            <img src="{{ asset('images/painting.webp') }}" alt="Student illustration"
                 class="w-[320px] h-auto object-contain">
        </div>

    </div>

    {{-- RIGHT: Attendance card --}}
    <div class="w-[280px] flex-shrink-0 rounded-2xl bg-white border border-[#E5EAE3] px-6 py-6 flex flex-col items-center">

        <p class="font-['Work_Sans',sans-serif] font-semibold text-[11px] leading-none tracking-[1.2px] uppercase text-[#8A9490] mb-5 self-start">
            Attendance
        </p>

        {{-- Circular donut chart --}}
        <div class="relative flex items-center justify-center mb-5">
            <svg class="w-[120px] h-[120px] -rotate-90" viewBox="0 0 120 120">
                {{-- Track --}}
                <circle cx="60" cy="60" r="50" fill="none" stroke="#E5EAE3" stroke-width="12"/>
                {{-- Progress (90%) — circumference = 2π×50 ≈ 314.16 --}}
                <circle cx="60" cy="60" r="50" fill="none" stroke="#216C22" stroke-width="12"
                        stroke-dasharray="314.16" stroke-dashoffset="31.4"
                        stroke-linecap="round"/>
            </svg>
            {{-- Center label --}}
            <div class="absolute flex flex-col items-center justify-center rotate-0">
                <span class="font-['Work_Sans',sans-serif] font-extrabold text-[26px] leading-none text-[#1B1C1C]">90%</span>
                <span class="font-['Work_Sans',sans-serif] font-normal text-[10px] text-[#8A9490] mt-0.5">Rate</span>
            </div>
        </div>

        {{-- Stats row --}}
        <div class="flex w-full justify-around border-t border-[#E5EAE3] pt-4">
            <div class="flex flex-col items-center gap-0.5">
                <span class="font-['Work_Sans',sans-serif] font-extrabold text-[22px] leading-none text-[#1B1C1C]">19</span>
                <span class="font-['Work_Sans',sans-serif] font-normal text-[11px] text-[#8A9490]">Present</span>
            </div>
            <div class="w-px bg-[#E5EAE3]"></div>
            <div class="flex flex-col items-center gap-0.5">
                <span class="font-['Work_Sans',sans-serif] font-extrabold text-[22px] leading-none text-red-500">02</span>
                <span class="font-['Work_Sans',sans-serif] font-normal text-[11px] text-red-400">Absent</span>
            </div>
        </div>

    </div>

</div>

{{-- ── 2. Weekly Schedule ────────────────────────────────────────────── --}}
<div class="mb-6">

    <h2 class="font-['Work_Sans',sans-serif] font-bold text-xl leading-[28px] tracking-normal text-[#1B1C1C] mb-0.5">
        Weekly Schedule
    </h2>
    <p class="font-['Work_Sans',sans-serif] font-normal text-sm text-[#8A9490] mb-4">
        Click on a day to view detailed activities
    </p>

    {{-- Day pills + mini card row --}}
    <div class="flex gap-5 mb-5">

        {{-- LEFT: day cards --}}
        <div class="flex-1 min-w-0 flex gap-2">

            <button class="flex flex-col items-start justify-start flex-1 rounded-[16px] bg-[#216C220A] border-2 border-[#216C22] p-[16px] text-[#216C22] hover:bg-[#216C2215] transition">
                <span class="font-['Work_Sans',sans-serif] font-semibold text-[11px] leading-none tracking-[0.4px] mb-1">Today</span>
                <span class="font-['Work_Sans',sans-serif] font-extrabold text-[36px] leading-none">12</span>
            </button>

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

    {{-- Session rows --}}
    @php
        $sessions = [
            ['subject' => 'Subject Name', 'category' => 'Topic Name', 'students' => 32, 'time' => '8:00 PM – 10:00 PM'],
            ['subject' => 'Book Name',    'category' => 'Honesty & Integrity', 'students' => 32, 'time' => '8:00 PM – 10:00 PM'],
            ['subject' => 'Subject Name', 'category' => 'Gratitude Practices', 'students' => 32, 'time' => '8:00 PM – 10:00 PM'],
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

            {{-- Col 4: Buttons --}}
            <div class="flex flex-col gap-2 items-end">
                <button class="w-[155px] h-[40px] flex items-center justify-center gap-[8px] px-[24px] rounded-[9999px] bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[13px] hover:opacity-90 transition {{ $loop->first ? '' : 'opacity-50' }}">
                    Join Meeting
                </button>
                <button class="w-[155px] h-[40px] flex items-center justify-center gap-[8px] px-[24px] rounded-[9999px] border border-[#C0C9B9] text-[#40493D] font-['Work_Sans',sans-serif] font-semibold text-[13px] hover:bg-gray-50 transition">
                    View Details
                </button>
            </div>

        </div>
        @endforeach
    </div>

</div>

{{-- ── 3. My Books ───────────────────────────────────────────────────── --}}
<div>

    <div class="flex items-end justify-between mb-4">
        <div>
            <h2 class="font-['Work_Sans',sans-serif] font-bold text-xl leading-[28px] tracking-normal text-[#1B1C1C]">
                My Books
            </h2>
            <p class="font-['Work_Sans',sans-serif] font-normal text-sm text-[#8A9490] mt-0.5">
                Quickly access the books you Learn
            </p>
        </div>
    </div>

    @php
        $books = [
            ['title' => 'Apocalypse For Everyone', 'image' => 'book1.webp', 'subject' => 'Grade 4 – Character Education', 'progress' => 65],
            ['title' => 'The Art Of Storytelling',  'image' => 'book2.webp', 'subject' => 'Grade 5 – Language Arts',       'progress' => 40],
            ['title' => 'Culinary Delights',         'image' => 'book3.webp', 'subject' => 'Grade 3 – Life Skills',         'progress' => 80],
            ['title' => 'Character Building',        'image' => 'book4.webp', 'subject' => 'Grade 6 – Values Education',    'progress' => 25],
        ];
    @endphp

    <div class="grid grid-cols-4 gap-4">
        @foreach ($books as $book)

        <div class="flex flex-col bg-white border-2 border-[#C0C9B94D] rounded-[16px] overflow-hidden">

            <div class="flex items-center justify-center h-[293px] p-[10px] gap-[10px] bg-[#F5F7F5]">
                <img src="{{ asset('images/' . $book['image']) }}"
                     alt="{{ $book['title'] }}"
                     class="h-full w-full object-contain rounded-[8px]">
            </div>

            <div class="flex flex-col gap-3 p-4">

                <div>
                    <p class="font-['Work_Sans',sans-serif] font-bold text-[14px] leading-[19.6px] tracking-normal text-[#1B1C1C]">
                        {{ $book['title'] }}
                    </p>
                    <p class="font-['Work_Sans',sans-serif] font-normal text-[12px] text-[#8A9490] mt-0.5">
                        {{ $book['subject'] }}
                    </p>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="font-['Work_Sans',sans-serif] font-semibold text-[11px] text-[#8A9490]">Read</span>
                        <span class="font-['Work_Sans',sans-serif] font-bold text-[11px] text-[#2FE432]">{{ $book['progress'] }}%</span>
                    </div>
                    <div class="w-full h-1.5 bg-[#E5EAE3] rounded-full overflow-hidden">
                        <div class="h-full bg-[#2FE432] rounded-full" style="width: {{ $book['progress'] }}%"></div>
                    </div>
                </div>

                <button class="w-full bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[13px] leading-[18.2px] tracking-normal py-2.5 rounded-full hover:bg-green-900 transition">
                    Open Book
                </button>

            </div>
        </div>

        @endforeach
    </div>

</div>

@endsection
