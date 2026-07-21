<div>

<div class="bg-white border-2 border-[#E5EAE3] rounded-[16px] p-[24px] flex flex-col gap-[24px]">

    <div class="border-b border-[#E5EAE3] pb-[17px] w-full">
        <h2 class="font-['Work_Sans',sans-serif] font-bold text-[24px] leading-[31.2px] text-[#1B1C1C]">
            Announcements
        </h2>
    </div>

    <div class="flex flex-col gap-[16px] w-full">
        @foreach ($announcements as $item)
            <div class="bg-white border border-[#E5EAE3] rounded-[16px] p-[24px] flex flex-col gap-[16px] items-start w-full">
                <div class="flex flex-col items-start w-full">
                    <span class="font-['Work_Sans',sans-serif] font-normal text-[12px] leading-[28.8px] text-[#8A9490]">{{ $item['date'] }}</span>
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">{{ $item['emoji'] }} {{ $item['title'] }}</span>
                </div>
                <p class="font-['Work_Sans',sans-serif] font-normal text-[14px] leading-normal text-[#1B1C1C] whitespace-pre-line">{{ $item['description'] }}</p>
            </div>
        @endforeach
    </div>

</div>

</div>
