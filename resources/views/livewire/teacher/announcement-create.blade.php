
<div>

<div class="bg-white border-2 border-[#216C221A] rounded-[16px] pt-[18px] pb-[32px] px-[24px] flex flex-col gap-[24px]">

    {{-- Header: heading + Cancel/Save --}}
    <div class="border-b border-[#216C2233] pb-[17px] flex items-end justify-between w-full">
        <h2 class="font-['Montserrat',sans-serif] font-bold text-[24px] leading-[31.2px] text-[#1B1C1B]">
            Create New Announcement
        </h2>
        <div class="flex gap-[12px] items-center">
            <a href="{{ route('teacher.announcements') }}" wire:navigate class="border-2 border-[#216C22] rounded-[12px] h-[48px] w-[140px] flex items-center justify-center font-['Work_Sans',sans-serif] font-bold text-[16px] text-[#216C22] hover:bg-green-50 transition">
                Cancel
            </a>
            <button type="button" class="bg-[#216C22] rounded-[12px] h-[48px] w-[140px] flex items-center justify-center font-['Work_Sans',sans-serif] font-bold text-[16px] text-white hover:bg-green-900 transition">
                Save
            </button>
        </div>
    </div>

    {{-- Form fields --}}
    <div class="flex flex-col gap-[24px] w-full">

        <div class="flex gap-[24px] items-start w-full">
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Title</label>
                <input type="text" name="title" placeholder="Eid Holiday" class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
            </div>
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Subject</label>
                <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full flex items-center justify-between">
                    <input type="text" name="subject" placeholder="CB Grade 4-5" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
                    <i class="fa-solid fa-chevron-down text-[#46494B] text-[14px]"></i>
                </div>
            </div>
        </div>

        <div class="flex gap-[24px] items-start w-full">
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">From Date</label>
                <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full flex items-center justify-between">
                    <input type="date" name="from_date" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
                    <i class="fa-regular fa-calendar text-[#46494B] text-[16px]"></i>
                </div>
            </div>
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">To Date</label>
                <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full flex items-center justify-between">
                    <input type="date" name="to_date" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
                    <i class="fa-regular fa-calendar text-[#46494B] text-[16px]"></i>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-[6px] w-full">
            <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Announcement Description</label>
            <textarea name="description" rows="4" placeholder="Description...." class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none resize-none h-[121px]"></textarea>
        </div>

        <div class="flex flex-col gap-[16px] items-start w-full">
            <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Status</label>
            <label class="flex gap-[8px] items-center cursor-pointer">
                <span class="relative inline-block w-[52px] h-[26px]">
                    <input type="checkbox" name="status" checked class="sr-only">
                    <span class="absolute inset-0 bg-[#2350A1] rounded-full"></span>
                    <span class="absolute left-[26px] top-[2px] w-[22px] h-[22px] bg-white rounded-full"></span>
                </span>
                <span class="font-['Hanken_Grotesk',sans-serif] font-medium text-[14px] tracking-[0.6px] text-[#46494B]">Active</span>
            </label>
        </div>

    </div>

</div>

</div>
