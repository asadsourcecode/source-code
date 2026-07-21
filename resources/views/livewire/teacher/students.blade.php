<div>

{{-- ── Header ─────────────────────────────────────────────────────────── --}}
<div class="flex items-end justify-between mb-6 pb-[17px] border-b border-[#C0C9B94D]">
    <div>
        <h2 class="font-['Montserrat',sans-serif] font-bold text-[32px] leading-[38.4px] tracking-normal text-[#1B1C1C]">
            My Students
        </h2>
        <p class="font-['Work_Sans',sans-serif] font-normal text-[16px] leading-[25.6px] text-[#40493D] mt-0.5">
            Everyone assigned to you, with their reading progress at a glance.
        </p>
    </div>

    <div class="relative w-[280px] flex-shrink-0">
        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-[#8A9490] text-[14px]"></i>
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search name or email…"
               class="w-full h-[44px] pl-10 pr-4 rounded-full border border-[#C0C9B9] bg-white font-['Work_Sans',sans-serif] text-[14px] text-[#1B1C1C] placeholder:text-[#8A9490] focus:outline-none focus:border-[#216C22] transition">
    </div>
</div>

{{-- ── Students grid ──────────────────────────────────────────────────── --}}
@if (empty($this->filteredStudents))
    <div class="flex flex-col items-center justify-center py-16 text-center bg-white border-2 border-[#C0C9B94D] rounded-[16px]">
        <p class="font-['Work_Sans',sans-serif] font-semibold text-[15px] text-[#1B1C1C]">
            {{ $students ? 'No students match your search.' : 'No students are assigned to you yet.' }}
        </p>
    </div>
@else
<div class="portal-books-grid mb-8">
    @foreach ($this->filteredStudents as $student)
    <div class="flex flex-col bg-white border-2 border-[#C0C9B94D] rounded-[16px] p-4 gap-3">

        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-[#D0E5CD] flex items-center justify-center flex-shrink-0">
                <span class="font-['Work_Sans',sans-serif] font-bold text-[16px] text-[#216C22]">
                    {{ collect(explode(' ', $student['name']))->map(fn ($part) => mb_substr($part, 0, 1))->take(2)->implode('') }}
                </span>
            </div>
            <div class="min-w-0">
                <p class="font-['Work_Sans',sans-serif] font-bold text-[16px] leading-[22px] text-[#1B1C1C] truncate">
                    {{ $student['name'] }}
                </p>
                <p class="font-['Work_Sans',sans-serif] font-normal text-[12px] text-[#40493D] truncate">
                    {{ $student['email'] }}
                </p>
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between mb-1">
                <span class="font-['Work_Sans',sans-serif] font-semibold text-[11px] uppercase tracking-wide text-[#707A6C]">
                    Overall Progress
                </span>
                <span class="font-['Work_Sans',sans-serif] font-bold text-[12px] text-[#216C22]">
                    {{ $student['progress'] }}%
                </span>
            </div>
            <div class="h-2 rounded-full bg-[#EDEFEA] overflow-hidden">
                <div class="h-full bg-[#216C22] rounded-full" style="width: {{ $student['progress'] }}%"></div>
            </div>
        </div>

        <div class="flex items-center justify-between text-[11px] font-['Work_Sans',sans-serif]">
            <span class="flex items-center gap-1.5 text-[#40493D]">
                <i class="fa-solid fa-book text-[#8A9490]"></i>
                {{ $student['books_count'] }} {{ Str::plural('book', $student['books_count']) }}
            </span>
            <span class="flex items-center gap-1.5 text-[#40493D]">
                <i class="fa-regular fa-clock text-[#8A9490]"></i>
                {{ $student['last_activity']?->diffForHumans() ?? 'No activity yet' }}
            </span>
        </div>

    </div>
    @endforeach
</div>
@endif

{{-- ── Summary stats ──────────────────────────────────────────────────── --}}
@if ($stats['total_students'] > 0)
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
    <div class="bg-[#F2F3EF] border border-[#C0C9B94D] rounded-[16px] p-4">
        <p class="font-['Work_Sans',sans-serif] font-semibold text-[11px] uppercase tracking-wide text-[#707A6C] mb-1">
            Total Students
        </p>
        <p class="font-['Montserrat',sans-serif] font-bold text-[28px] text-[#1B1C1C]">{{ $stats['total_students'] }}</p>
    </div>
    <div class="bg-[#F2F3EF] border border-[#C0C9B94D] rounded-[16px] p-4">
        <p class="font-['Work_Sans',sans-serif] font-semibold text-[11px] uppercase tracking-wide text-[#707A6C] mb-1">
            Books In Progress
        </p>
        <p class="font-['Montserrat',sans-serif] font-bold text-[28px] text-[#1B1C1C]">{{ $stats['total_books'] }}</p>
    </div>
    <div class="bg-[#D0E5CD1A] border border-[#216C221A] rounded-[16px] p-4">
        <p class="font-['Work_Sans',sans-serif] font-semibold text-[11px] uppercase tracking-wide text-[#707A6C] mb-1">
            Average Progress
        </p>
        <p class="font-['Montserrat',sans-serif] font-bold text-[28px] text-[#216C22]">{{ $stats['average_progress'] }}%</p>
    </div>
</div>
@endif

</div>
