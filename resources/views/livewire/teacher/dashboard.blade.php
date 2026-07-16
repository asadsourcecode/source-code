<div>

{{-- ── 1. Upcoming Lesson — full-width card ─────────────────────────── --}}
<div class="rounded-2xl overflow-hidden bg-[#D0E5CD1A] border border-[#216C221A] mb-6 portal-hero-card">

    {{-- LEFT: vertical flow, gap 10px, height 259px (Figma spec) --}}
    <div class="flex-1 min-w-0 px-8 py-7 flex flex-col gap-[10px] min-h-[259px]">

        <h2 class="font-['Montserrat',sans-serif] font-bold text-[32px] leading-[38.4px] tracking-normal text-[#1B1C1C]">
            Upcoming Lesson
        </h2>

        <p class="font-['Work_Sans',sans-serif] font-normal text-[16px] leading-[25.6px] tracking-normal text-[#40493D]">
            Class: Character Building – Grade 4 (Section B)
        </p>

        <p class="font-['Work_Sans',sans-serif] font-normal text-[16px] leading-[25.6px] tracking-normal text-[#40493D]">
            Topics: Honesty and Moral Integrity
        </p>

        {{-- Buttons: vertical stack, gap-8px --}}
        <div class="flex flex-col gap-[8px] w-full">

            {{-- Class Starts in 45 min: w-full, h-48px, radius-8px, py-12px, gap-8px, bg #216C22 10% --}}
            <button class="w-full h-[48px] flex items-center justify-center gap-[8px] bg-[#216C221A] text-[#707A6C] font-['Work_Sans',sans-serif] font-bold text-[16px] leading-[24px] tracking-normal py-[12px] rounded-[8px] hover:bg-[#216C2230] transition">
                <i class="fa-regular fa-clock text-[#707A6C] text-[12px]"></i>
                Class Starts in 45 min
            </button>

            {{-- Ask To Join Class: same dimensions, solid green --}}
            <button class="w-full h-[48px] flex items-center justify-center bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-bold text-[16px] leading-[24px] tracking-normal py-[12px] rounded-[12px] hover:bg-green-900 transition">
                Ask To Join Class
            </button>   

        </div>

    </div>

    {{-- RIGHT: painting.webp --}}
    <div class="flex-shrink-0 flex items-end justify-center px-8 portal-hero-image">
        <img src="{{ asset('images/painting.webp') }}" alt="Teacher illustration"
             class="w-[320px] h-auto object-contain">
    </div>

</div>

{{-- ── 2. Weekly Schedule ────────────────────────────────────────────── --}}
<div class="mb-6">

    {{-- Heading + subtitle: full width --}}
    <h2 class="font-['Montserrat',sans-serif] font-semibold text-[24px] leading-[31.2px] tracking-normal text-[#1B1C1C] mb-0.5">
        Weekly Schedule
    </h2>
    <p class="font-['Work_Sans',sans-serif] font-normal text-[16px] leading-[25.6px] text-[#40493D] mb-4">
        Click on a day to view detailed activities
    </p>

    {{-- Same row: day pills (left) | mini card (right) — items-stretch so left fills mini card height --}}
    <div class="portal-schedule-row">

        {{-- LEFT: day cards — stretch fills the row height automatically --}}
        <div class="flex-1 min-w-0 portal-days-wrap">

            {{-- Today — plain card, green text only (matches Figma) --}}
            <button class="flex flex-col items-start justify-start flex-1 rounded-[12px] bg-white border border-[#C0C9B980] p-[17px] text-[#216C22] hover:border-[#216C22] transition">
                <span class="font-['Work_Sans',sans-serif] font-semibold text-[16px] leading-none tracking-[0.4px] mb-1">
                    Today
                </span>
                <span class="font-['Work_Sans',sans-serif] font-medium text-[52px] leading-none">
                    12
                </span>
            </button>

            {{-- TUE – SUN --}}
            @php
                $otherDays = [
                    ['abbr' => 'TUE', 'num' => '13', 'weekend' => false, 'active' => true],
                    ['abbr' => 'WED', 'num' => '14', 'weekend' => false, 'active' => false],
                    ['abbr' => 'THU', 'num' => '15', 'weekend' => false, 'active' => false],
                    ['abbr' => 'FRI', 'num' => '16', 'weekend' => false, 'active' => false],
                    ['abbr' => 'SAT', 'num' => '17', 'weekend' => true, 'active' => false],
                    ['abbr' => 'SUN', 'num' => '18', 'weekend' => true, 'active' => false],
                ];
            @endphp

            @foreach ($otherDays as $day)
                <button class="flex flex-col items-start justify-start flex-1 rounded-[12px] transition
                    {{ $day['active'] ? 'border-2 border-[#216C22] p-[16px] shadow-[0px_4px_6px_0px_rgba(0,0,0,0.1),0px_2px_4px_0px_rgba(0,0,0,0.1)] bg-white' : 'border p-[17px]' }}
                    {{ !$day['active'] && $day['weekend'] ? 'bg-[#F5F3F380] border-[#C0C9B933]' : '' }}
                    {{ !$day['active'] && !$day['weekend'] ? 'bg-white border-[#C0C9B980] hover:border-[#216C22]' : '' }}">
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[16px] leading-none tracking-[0.4px] mb-1 {{ $day['weekend'] ? 'text-[#707A6C]' : 'text-[#3D493D]' }}">
                        {{ $day['abbr'] }}
                    </span>
                    <span class="font-['Work_Sans',sans-serif] font-normal text-[32px] leading-none {{ $day['weekend'] ? 'text-[#707A6C]' : 'text-[#1B1C1B]' }}">
                        {{ $day['num'] }}
                    </span>
                </button>
            @endforeach

        </div>

        {{-- RIGHT: mini Weekly Schedule card --}}
        <div class="w-[380px] flex-shrink-0">
            <div class="bg-[#E4EEE4] border border-[#EBEDEB] rounded-tr-2xl rounded-br-2xl p-[24px]">
                <h3 class="font-['Montserrat',sans-serif] font-bold text-[28px] leading-[38.4px] tracking-normal text-[#1B1C1C] mb-1">
                    Weekly Schedule
                </h3>
                <p class="font-['Work_Sans',sans-serif] font-normal text-[16px] leading-[25.6px] text-[#707A6C] mb-4">
                    Lorem ipsum dolor sit, consectetur.
                </p>
                <a href="{{ route('teacher.weekly-schedule') }}" wire:navigate
                   class="block w-full border-2 border-[#216C22] text-[#216C22] font-['Work_Sans',sans-serif] font-bold text-[16px] leading-[24px] tracking-normal py-[16px] px-[32px] rounded-[12px] hover:bg-green-50 transition text-center">
                    View Full Schedule
                </a>
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
        <div class="bg-white rounded-[16px] border border-[#216C221A] px-[24px] py-[16px] portal-session-grid">

            {{-- Col 1: Subject Name --}}
            <div class="min-w-0">
                <p class="font-['Work_Sans',sans-serif] font-bold text-[18px] leading-[28.8px] text-[#1B1C1C]">
                    {{ $session['subject'] }}
                </p>
                <p class="font-['Work_Sans',sans-serif] font-semibold text-[14px] leading-[19.6px] text-[#40493D] mt-0.5">
                    {{ $session['category'] }}
                </p>
            </div>

            {{-- Col 2: Students --}}
            <div class="flex items-center gap-1.5 justify-center portal-session-col-2">
                <i class="fa-solid fa-user-group text-[16px] text-[#8A9490]"></i>
                <span class="font-['Work_Sans',sans-serif] font-medium text-[16px] text-[#216C22] underline">
                    {{ $session['students'] }} Students
                </span>
            </div>

            {{-- Col 3: Time --}}
            <div class="flex items-center gap-1.5 justify-center portal-session-col-3">
                <i class="fa-regular fa-clock text-[16px] text-[#8A9490]"></i>
                <span class="font-['Work_Sans',sans-serif] font-medium text-[16px] text-[#40493D]">
                    {{ $session['time'] }}
                </span>
            </div>

            {{-- Col 4: Buttons stacked, right-aligned --}}
            <div class="flex flex-col gap-2 items-end portal-session-col-4">
                <button class="w-[165px] h-[40px] flex items-center justify-center gap-[8px] px-3 whitespace-nowrap rounded-[12px] text-white font-['Work_Sans',sans-serif] font-medium text-[16px] hover:opacity-90 transition {{ $loop->first ? 'bg-[#216C22]' : 'bg-[#216C2299]' }}">
                    Join Meeting
                </button>
                <a href="{{ route('teacher.meeting-details') }}" wire:navigate class="w-[165px] h-[40px] flex items-center justify-center gap-[8px] px-3 whitespace-nowrap rounded-[12px] border-2 border-[#216C22] text-[#216C22] font-['Work_Sans',sans-serif] font-medium text-[16px] hover:bg-gray-50 transition">
                    View Details
                </a>
            </div>

        </div>
        @endforeach
    </div>

</div>

{{-- ── 3. My Books — full-width 4-column grid ───────────────────────── --}}
<div>

    <div class="flex items-end justify-between mb-4 pb-[17px] border-b border-[#C0C9B94D]">
        <div>
            <h2 class="font-['Montserrat',sans-serif] font-bold text-[24px] leading-[31.2px] tracking-normal text-[#1B1C1C]">
                My Books
            </h2>
            <p class="font-['Work_Sans',sans-serif] font-semibold text-[16px] text-[#40493D] mt-0.5">
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

    <div class="portal-books-grid">
        @foreach ($books as $book)

        {{-- Book card: white, border-2 #C0C9B94D 30%, radius 16px, vertical flex --}}
        <div class="flex flex-col bg-white border-2 border-[#C0C9B94D] rounded-[16px] overflow-hidden">

            {{-- Image container: h-293px, p-10px, gap-10px, horizontal --}}
            <div class="flex items-center justify-center h-[293px] p-[10px] gap-[10px] bg-[#F5F7F5] portal-book-img">
                <img src="{{ asset('images/' . $book['image']) }}"
                     alt="{{ $book['title'] }}"
                     class="h-full w-full object-contain rounded-[8px]">
            </div>

            {{-- Card body: title + progress + button --}}
            <div class="flex flex-col gap-3 p-4">

                {{-- Subject name --}}
                <div>
                    <p class="font-['Work_Sans',sans-serif] font-bold text-[16px] leading-[25.6px] tracking-normal text-[#1B1C1C]">
                        {{ $book['title'] }}
                    </p>
                    <p class="font-['Work_Sans',sans-serif] font-normal text-[12px] text-[#40493D] mt-0.5">
                        {{ $book['subject'] }}
                    </p>
                </div>

                {{-- How much read: progress bar --}}
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="font-['Work_Sans',sans-serif] font-medium text-[12px] text-[#8A9490]">Read</span>
                        <span class="font-['Work_Sans',sans-serif] font-medium text-[12px] text-[#2FE432]">{{ $book['progress'] }}%</span>
                    </div>
                    <div class="w-full h-1.5 bg-[#E5EAE3] rounded-full overflow-hidden">
                        <div class="h-full bg-[#2FE432] rounded-full" style="width: {{ $book['progress'] }}%"></div>
                    </div>
                </div>

                {{-- Open Book button --}}
                <button class="w-full bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-bold text-[16px] leading-[24px] tracking-normal py-[16px] px-[32px] rounded-[12px] hover:bg-green-900 transition">
                    Open Book
                </button>

            </div>
        </div>

        @endforeach
    </div>

</div>

</div>
