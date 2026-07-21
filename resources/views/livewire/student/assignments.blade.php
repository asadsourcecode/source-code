<div class="p-6">

    <h1 class="font-['Montserrat',sans-serif] font-bold text-[24px] text-[#1B1C1C] mb-6">Assignments</h1>

    @if (empty($assignments))
        <div class="flex flex-col items-center justify-center py-16 text-center bg-white border-2 border-[#C0C9B94D] rounded-[16px]">
            <p class="font-['Work_Sans',sans-serif] font-semibold text-[15px] text-[#1B1C1C]">
                You don't have any assignments yet.
            </p>
        </div>
    @else
        <div class="flex flex-col gap-3">
            @foreach ($assignments as $assignment)
            <a href="{{ route('student.assignments.show', $assignment['id']) }}"
               class="flex items-center justify-between bg-white border border-[#C0C9B94D] rounded-[12px] px-5 py-4 hover:border-[#216C22] transition">
                <div>
                    <p class="font-['Work_Sans',sans-serif] font-bold text-[15px] text-[#1B1C1C]">{{ $assignment['title'] }}</p>
                    <p class="font-['Work_Sans',sans-serif] text-[12px] text-[#8A9490] mt-0.5">{{ $assignment['book_title'] }}</p>
                </div>
                <span class="font-['Work_Sans',sans-serif] font-semibold text-[12px] px-3 py-1 rounded-full
                    {{ $assignment['status'] === 'submitted' ? 'bg-[#DFF5E1] text-[#216C22]' : 'bg-[#FDF3D8] text-[#A8790A]' }}">
                    {{ $assignment['status'] === 'submitted' ? 'Submitted' : 'To do' }}
                </span>
            </a>
            @endforeach
        </div>
    @endif

</div>
