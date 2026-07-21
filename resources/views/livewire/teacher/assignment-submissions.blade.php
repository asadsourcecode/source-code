<div class="p-6">

    <a href="{{ route('teacher.assignments.index') }}" class="text-[#216C22] text-[13px] font-['Work_Sans',sans-serif] font-semibold hover:underline">
        &larr; All Assignments
    </a>

    <h1 class="font-['Montserrat',sans-serif] font-bold text-[24px] text-[#1B1C1C] mt-2 mb-6">{{ $assignment->title }}</h1>

    <div class="flex flex-col gap-4">
        @foreach ($rows as $row)
        <div class="bg-white border border-[#C0C9B94D] rounded-[12px] p-5">

            <div class="flex items-center justify-between mb-3">
                <p class="font-['Work_Sans',sans-serif] font-bold text-[15px] text-[#1B1C1C]">{{ $row['name'] }}</p>
                <span class="font-['Work_Sans',sans-serif] font-semibold text-[12px] px-3 py-1 rounded-full
                    {{ $row['status'] === 'submitted' ? 'bg-[#DFF5E1] text-[#216C22]' : 'bg-[#F5F3F3] text-[#8A9490]' }}">
                    {{ $row['status'] === 'submitted' ? 'Submitted' : 'Not submitted yet' }}
                </span>
            </div>

            @if (count($row['answers']))
                <div class="flex flex-col gap-2">
                    @foreach ($row['answers'] as $answer)
                    <div class="border-t border-[#C0C9B94D] pt-2">
                        <p class="text-[12px] text-[#8A9490] font-['Work_Sans',sans-serif]">Page {{ $answer['page_number'] }} — {{ $answer['label'] }}</p>
                        <p class="text-[13px] text-[#1B1C1C] font-['Work_Sans',sans-serif] mt-0.5">{{ $answer['value'] ?: '—' }}</p>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-[12px] text-[#8A9490] font-['Work_Sans',sans-serif]">No answers yet.</p>
            @endif

        </div>
        @endforeach
    </div>

</div>
