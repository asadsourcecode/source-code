<div>

<div class="bg-white border-2 border-[#216C221A] rounded-[16px] p-[24px] flex flex-col gap-[24px]">

    {{-- Heading --}}
    <div class="border-b border-[#C0C9B94D] pb-[16px] w-full">
        <h2 class="font-['Montserrat',sans-serif] font-bold text-[24px] leading-[31.2px] text-[#1B1C1B]">
            Meeting Details
        </h2>
    </div>

    {{-- Day rows --}}
    <div class="flex flex-col gap-[16px] w-full">
        @foreach ($days as $day)
            @if ($day['expanded'])
                {{-- Expanded day: green border, drop shadow, session list underneath --}}
                <div class="flex flex-col gap-[8px] items-end w-full">
                    <div class="bg-white border border-[#30A832] shadow-[0px_1px_1px_0px_rgba(0,0,0,0.05)] flex items-center justify-between p-[25px] rounded-[12px] w-full">
                        <div class="flex gap-[24px] items-center">
                            <div class="flex flex-col items-center w-[48px]">
                                <span class="font-['Work_Sans',sans-serif] font-bold text-[14px] leading-[19.6px] text-[#1B1C1B]">{{ $day['abbr'] }}</span>
                                <span class="font-['Work_Sans',sans-serif] font-bold text-[24px] leading-[31.2px] text-[#1B1C1B]">{{ $day['date'] }}</span>
                            </div>
                            <div>
                                <p class="font-['Work_Sans',sans-serif] font-bold text-[18px] leading-[28.8px] text-[#1B1C1B]">{{ $day['summary'] }}</p>
                                <p class="font-['Work_Sans',sans-serif] font-semibold text-[14px] leading-[19.6px] text-[#40493D]">{{ $day['range'] }}</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-up text-[#30A832] text-[12px]"></i>
                    </div>

                    <div class="bg-[#F5F3F34D] rounded-[8px] px-[16px] py-[8px] flex flex-col gap-[8px] w-full ml-[97px]" style="width: calc(100% - 97px)">
                        @foreach ($day['sessions'] as $session)
                            <div class="border-l-2 border-[#30A832] pl-[14px] pr-[12px] py-[12px] flex items-center justify-between w-full">
                                <p class="font-['Work_Sans',sans-serif] font-medium text-[14px] leading-[19.6px] text-[#1B1C1C]">
                                    {{ $session['time'] }} <span class="text-[rgba(0,0,0,0.2)] text-[20px] leading-[19.6px]">|</span> {{ $session['title'] }}
                                </p>
                                <button type="button" class="js-open-reschedule border-2 border-[#216C22] rounded-[12px] px-[32px] py-[16px] h-[48px] flex items-center justify-center font-['Work_Sans',sans-serif] font-bold text-[16px] leading-[24px] text-[#216C22] hover:bg-green-50 transition">
                                    Reschedule
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                {{-- Collapsed day: plain border, muted, chevron down --}}
                <div class="bg-white border border-[#C0C9B94D] flex items-center justify-between p-[25px] rounded-[12px] w-full">
                    <div class="flex gap-[24px] items-center opacity-80">
                        <div class="flex flex-col items-center w-[48px]">
                            <span class="font-['Work_Sans',sans-serif] font-bold text-[14px] leading-[19.6px] text-[#1B1C1C]">{{ $day['abbr'] }}</span>
                            <span class="font-['Work_Sans',sans-serif] font-bold text-[24px] leading-[31.2px] text-[#1B1C1C]">{{ $day['date'] }}</span>
                        </div>
                        <div>
                            <p class="font-['Work_Sans',sans-serif] font-bold text-[18px] leading-[28.8px] text-[#1B1C1C]">{{ $day['summary'] }}</p>
                            <p class="font-['Work_Sans',sans-serif] font-semibold text-[14px] leading-[19.6px] text-[#1B1C1C]">{{ $day['range'] }}</p>
                        </div>
                    </div>
                    <i class="fa-solid fa-chevron-down text-[#8A9490] text-[12px]"></i>
                </div>
            @endif
        @endforeach
    </div>

</div>

{{-- Reschedule Meeting pop-up (Figma: pop-up/Reschedule meeting) --}}
<div id="reschedule-modal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/40 px-4">
    <div class="bg-white drop-shadow-[0px_0px_4px_rgba(0,0,0,0.24)] flex flex-col gap-[24px] items-start p-[24px] rounded-[16px] w-full max-w-[715px]">

        <h3 class="font-['Work_Sans',sans-serif] font-semibold text-[20px] leading-[28.8px] text-[#1B1C1B]">
            Reschedule Meeting
        </h3>

        <div class="flex flex-col gap-[16px] items-start w-full">
            <p class="font-['Work_Sans',sans-serif] font-medium text-[18px] leading-[28.8px] text-[#707A6C]">
                Set Meeting Timings
            </p>

            <div class="flex gap-[24px] items-center w-full">
                <div class="flex flex-col gap-[6px] items-start flex-1">
                    <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] leading-[14.4px] tracking-[0.6px] text-[#46494B]">Start Time</label>
                    <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] flex items-center justify-between w-full">
                        <input type="time" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none" placeholder="00:00:00">
                        <i class="fa-solid fa-chevron-down text-[#46494B] text-[14px]"></i>
                    </div>
                </div>
                <div class="flex flex-col gap-[6px] items-start flex-1">
                    <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] leading-[14.4px] tracking-[0.6px] text-[#46494B]">End Time</label>
                    <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] flex items-center justify-between w-full">
                        <input type="time" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none" placeholder="00:00:00">
                        <i class="fa-solid fa-chevron-down text-[#46494B] text-[14px]"></i>
                    </div>
                </div>
            </div>

            <div class="flex gap-[24px] items-center w-full">
                <div class="flex flex-col gap-[6px] items-start flex-1">
                    <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] leading-[14.4px] tracking-[0.6px] text-[#46494B]">Select Date</label>
                    <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] flex items-center justify-between w-full">
                        <input type="date" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none" placeholder="DD-MM-YY">
                        <i class="fa-solid fa-chevron-down text-[#46494B] text-[14px]"></i>
                    </div>
                </div>
                <div class="flex flex-col gap-[6px] items-start flex-1">
                    <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] leading-[14.4px] tracking-[0.6px] text-[#46494B]">Session Duration</label>
                    <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] flex items-center w-full">
                        <input type="text" value="1hr 30min" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-[16px] items-center justify-end w-full">
            <button type="button" class="js-close-reschedule border-2 border-[#216C22] rounded-[12px] px-[32px] py-[16px] h-[48px] flex items-center justify-center font-['Work_Sans',sans-serif] font-bold text-[16px] text-[#216C22] hover:bg-green-50 transition">
                Cancel
            </button>
            <button type="button" class="js-close-reschedule bg-[#216C22] rounded-[12px] px-[32px] py-[16px] h-[48px] flex items-center justify-center font-['Work_Sans',sans-serif] font-bold text-[16px] text-white hover:bg-green-900 transition">
                Update
            </button>
        </div>

    </div>
</div>

</div>
