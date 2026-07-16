<div>

<div class="bg-white border-2 border-[#216C221A] rounded-[16px] p-[24px] flex flex-col gap-[24px]">

    {{-- Heading + Create New button --}}
    <div class="border-b border-[#216C2233] pb-[17px] flex items-center justify-between w-full">
        <h2 class="font-['Montserrat',sans-serif] font-bold text-[24px] leading-[31.2px] text-[#1B1C1B]">
            Announcements
        </h2>
        <a href="{{ route('teacher.announcements.create') }}" wire:navigate class="bg-[#216C22] h-[48px] rounded-[12px] px-[32px] py-[16px] flex items-center justify-center font-['Work_Sans',sans-serif] font-bold text-[16px] text-white hover:bg-green-900 transition">
            Create New
        </a>
    </div>

    {{-- Table --}}
    <div class="border border-[#216C2233] rounded-[16px] py-[24px] flex flex-col gap-[16px] w-full">

        {{-- Header row --}}
        <div class="flex gap-[15px] items-center w-full">
            <div class="w-[240px] shrink-0 px-[16px] py-[8px]">
                <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">Title</span>
            </div>
            <div class="flex flex-1 gap-[15px] items-center">
                <div class="flex-1 flex flex-col items-center justify-center px-[16px] py-[8px] min-w-0">
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">Subject</span>
                </div>
                <div class="flex-1 flex flex-col items-center justify-center px-[16px] py-[8px] min-w-0">
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">From Date</span>
                </div>
                <div class="flex-1 flex flex-col items-center justify-center px-[16px] py-[8px] min-w-0">
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">To Date</span>
                </div>
                <div class="flex-1 flex flex-col items-center justify-center px-[16px] py-[8px] min-w-0">
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">Status</span>
                </div>
                <div class="flex-1 flex flex-col items-center justify-center px-[16px] py-[8px] min-w-0">
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">Actions</span>
                </div>
            </div>
        </div>

        {{-- Data rows --}}
        @foreach ($announcements as $announcement)
            <div class="flex gap-[15px] items-center w-full">
                <div class="w-[240px] shrink-0 px-[16px] py-[8px]">
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">{{ $announcement['title'] }}</span>
                </div>
                <div class="flex flex-1 gap-[24px] items-center">
                    <div class="flex-1 flex flex-col items-center justify-center px-[16px] py-[8px] min-w-0">
                        <span class="font-['Work_Sans',sans-serif] font-medium text-[14px] leading-[28.8px] text-[#1B1C1C]">{{ $announcement['subject'] }}</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center justify-center px-[16px] py-[8px] min-w-0">
                        <span class="font-['Work_Sans',sans-serif] font-medium text-[14px] leading-[28.8px] text-[#1B1C1C]">{{ $announcement['fromDate'] }}</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center justify-center px-[16px] py-[8px] min-w-0">
                        <span class="font-['Work_Sans',sans-serif] font-medium text-[14px] leading-[28.8px] text-[#1B1C1C]">{{ $announcement['toDate'] }}</span>
                    </div>
                    <div class="flex-1 flex items-center justify-center px-[16px] py-[8px] min-w-0">
                        @if ($announcement['status'] === 'Active')
                            <span class="bg-[#0061301A] rounded-[16px] px-[12px] py-[4px] font-['Inter',sans-serif] font-medium text-[12px] leading-[16px] text-[#006130]">Active</span>
                        @else
                            <span class="bg-[#0061301A] rounded-[16px] px-[12px] py-[4px] font-['Inter',sans-serif] font-medium text-[12px] leading-[16px] text-[#8B8D8F]">Inactive</span>
                        @endif
                    </div>
                    <div class="flex-1 flex items-center justify-center gap-[16px] px-[16px] py-[8px] min-w-0">
                        <button type="button" class="border border-[#216C22] rounded-[8px] px-[12px] py-[4px] font-['Hanken_Grotesk',sans-serif] font-medium text-[12px] leading-[16px] text-[#216C22] hover:bg-green-50 transition">
                            Edit
                        </button>
                        <button type="button" class="js-open-delete-announcement w-[44px] h-[44px] rounded-full flex items-center justify-center hover:bg-gray-100 transition" data-title="{{ $announcement['title'] }}">
                            <i class="fa-regular fa-trash-can text-[#1B1C1C] text-[16px]"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    {{-- Pagination --}}
    <div class="bg-[#216C221A] border border-[#DBD9D9] rounded-[16px] px-[25px] py-[17px] flex items-center justify-between w-full">
        <span class="font-['Montserrat',sans-serif] font-medium text-[12px] leading-[16px] text-[#64748B]">
            Showing <span class="text-[#1E293B]">{{ $pagination['from'] }}</span> to <span class="text-[#1E293B]">{{ $pagination['to'] }}</span> of <span class="text-[#1E293B]">{{ $pagination['total'] }}</span> entries
        </span>
        <div class="flex items-center gap-[4px]">
            <button type="button" class="bg-white border border-[#DBD9D9] rounded-[8px] px-[13px] py-[9px] font-['Montserrat',sans-serif] font-medium text-[12px] text-[#64748B] hover:bg-gray-50 transition">
                Previous
            </button>
            @foreach ($pagination['pages'] as $page)
                @if ($page === '...')
                    <span class="px-[8px] font-['Montserrat',sans-serif] font-normal text-[16px] leading-[24px] text-[#94A3B8]">...</span>
                @else
                    <button type="button" class="{{ $page === $pagination['current'] ? 'bg-[#216C224D] border-[#216C224D] text-[#1A2E2A] font-bold' : 'bg-white border-[#DBD9D9] text-[#64748B] font-medium hover:bg-gray-50' }} border rounded-[8px] px-[17px] py-[9px] font-['Montserrat',sans-serif] text-[12px] transition">
                        {{ $page }}
                    </button>
                @endif
            @endforeach
            <button type="button" class="bg-white border border-[#DBD9D9] rounded-[8px] px-[13px] py-[9px] font-['Montserrat',sans-serif] font-medium text-[12px] text-[#64748B] hover:bg-gray-50 transition">
                Next
            </button>
        </div>
    </div>

</div>

{{-- Delete Announcement pop-up (Figma: Pop-up delete doc) --}}
<div id="delete-announcement-modal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/40 px-4">
    <div class="bg-white flex flex-col gap-[16px] rounded-[12px] shadow-[0px_0px_50px_-12px_rgba(0,0,0,0.24)] w-full max-w-[531px] overflow-hidden">
        <div class="flex items-center justify-between px-[24px] py-[16px]">
            <h3 class="font-['Hanken_Grotesk',sans-serif] font-semibold text-[24px] leading-[31.2px] text-[#46494B]">
                Delete Announcement
            </h3>
        </div>
        <div class="px-[24px]">
            <p id="delete-announcement-text" class="font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#6F7A6F]">
                Are you sure you want to delete this Announcement?
            </p>
        </div>
        <div class="flex gap-[24px] items-center p-[24px]">
            <button type="button" class="js-close-delete-announcement border-2 border-[#2350A1] rounded-[8px] h-[50px] flex-1 flex items-center justify-center font-['Hanken_Grotesk',sans-serif] font-bold text-[18px] text-[#2350A1] hover:bg-blue-50 transition">
                Cancel
            </button>
            <button type="button" class="js-close-delete-announcement bg-[#2350A1] rounded-[8px] h-[50px] flex-1 flex items-center justify-center font-['Hanken_Grotesk',sans-serif] font-bold text-[18px] text-white hover:bg-blue-900 transition">
                Delete
            </button>
        </div>
    </div>
</div>

</div>
