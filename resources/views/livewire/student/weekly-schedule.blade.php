<div>

<div class="bg-white border-2 border-[#E5EAE3] rounded-[16px] p-[24px] flex flex-col gap-[24px] items-center">

    {{-- Heading --}}
    <div class="border-b border-[#E5EAE3] pb-[17px] w-full">
        <h2 class="font-['Work_Sans',sans-serif] font-bold text-[24px] leading-[31.2px] text-[#1B1C1C]">
            Weekly Schedule
        </h2>
    </div>

    {{-- Table --}}
    <div class="bg-white border border-[#E5EAE3] rounded-[16px] p-[24px] flex flex-col gap-[16px] items-start w-full">

        {{-- Header row --}}
        <div class="flex gap-[15px] items-center w-full">
            <div class="flex flex-col items-center px-[16px] py-[8px] w-[153.8px] shrink-0">
                <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">Subject/Grade</span>
            </div>
            <div class="flex flex-1 gap-[15px] items-center">
                @foreach ($columns as $column)
                    <div class="flex flex-1 flex-col items-center justify-center px-[16px] py-[8px] min-w-0">
                        <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">{{ $column }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Subject rows --}}
        @foreach ($rows as $row)
            <div class="flex gap-[15px] items-center w-full">
                <div class="flex flex-col items-center justify-center px-[16px] py-[8px] w-[153.8px] shrink-0">
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">{{ $row['subject'] }}</span>
                </div>
                <div class="flex flex-1 gap-[24px] items-center">
                    @foreach ($row['times'] as $time)
                        <div class="flex flex-col items-center justify-center px-[16px] py-[8px] shrink-0">
                            <span class="font-['Work_Sans',sans-serif] font-medium text-[14px] leading-[28.8px] text-[#1B1C1C] whitespace-nowrap">{{ $time }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

</div>

</div>
