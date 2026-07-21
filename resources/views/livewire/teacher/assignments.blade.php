<div class="p-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="font-['Montserrat',sans-serif] font-bold text-[24px] text-[#1B1C1C]">Assignments</h1>
        <a href="{{ route('teacher.assignments.create') }}"
           class="bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[13px] px-5 py-2.5 rounded-full hover:bg-green-900 transition">
            + Create Assignment
        </a>
    </div>

    @if (empty($assignments))
        <div class="flex flex-col items-center justify-center py-16 text-center bg-white border-2 border-[#C0C9B94D] rounded-[16px]">
            <p class="font-['Work_Sans',sans-serif] font-semibold text-[15px] text-[#1B1C1C]">
                You haven't created any assignments yet.
            </p>
        </div>
    @else
        <div class="flex flex-col gap-3">
            @foreach ($assignments as $assignment)
            <a href="{{ route('teacher.assignments.submissions', $assignment['id']) }}"
               class="flex items-center justify-between bg-white border border-[#C0C9B94D] rounded-[12px] px-5 py-4 hover:border-[#216C22] transition">
                <div>
                    <p class="font-['Work_Sans',sans-serif] font-bold text-[15px] text-[#1B1C1C]">{{ $assignment['title'] }}</p>
                    <p class="font-['Work_Sans',sans-serif] text-[12px] text-[#8A9490] mt-0.5">
                        {{ $assignment['book_title'] }} &middot; Created {{ $assignment['created_at'] }}
                    </p>
                </div>
                <span class="font-['Work_Sans',sans-serif] font-semibold text-[13px] text-[#216C22]">
                    {{ $assignment['submitted_count'] }} / {{ $assignment['total_students'] }} submitted
                </span>
            </a>
            @endforeach
        </div>
    @endif

</div>
