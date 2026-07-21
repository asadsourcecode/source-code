<header class="bg-white border-b border-[#E5EAE3] sticky top-0 z-20 flex-shrink-0">
    <div class="flex items-center justify-between h-[56px] portal-navbar-inner">

        {{-- Nav links as pill buttons (left) --}}
        @php
            $currentRoute = request()->route()->getName() ?? '';
            $links = [
                ['label' => 'Dashboard', 'route' => 'student.dashboard'],
                ['label' => 'Schedule',  'route' => 'student.schedule'],
                ['label' => 'My Books',  'route' => 'student.books'],
            ];
        @endphp

        <nav class="flex items-center gap-2">
            @foreach ($links as $link)
                @php
                    $isActive = $currentRoute === $link['route'];
                    $href = \Illuminate\Support\Facades\Route::has($link['route']) ? route($link['route']) : '#';
                @endphp
                <a href="{{ $href }}" wire:navigate
                   class="px-4 py-1.5 rounded-full font-['Work_Sans',sans-serif] font-semibold text-[13px] leading-[18.2px] tracking-normal transition-colors border border-[#C0C9B9]
                          {{ $isActive
                              ? 'bg-white text-[#1B1C1C] shadow-sm'
                              : 'bg-transparent text-[#6B7280] hover:bg-white hover:text-[#1B1C1C]' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Right: icons + avatar --}}
        <div class="flex items-center gap-1">

            {{-- Announcements --}}
            @php
                $announcements = app(\App\Services\Student\AnnouncementService::class)->getData()['announcements'];
            @endphp
            <div class="relative">
                <button type="button" id="announcements-menu-button" class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-[#6B7280] hover:text-[#40493D] transition relative">
                    <i class="fa-solid fa-bullhorn text-[14px]"></i>
                    <span class="absolute -top-0.5 -right-0.5 w-[18px] h-[18px] flex items-center justify-center bg-[#BA1A1A] border border-[#BA1A1A] rounded-full">
                        <span class="font-['Work_Sans',sans-serif] font-normal text-[12px] leading-[18px] text-white">3</span>
                    </span>
                </button>

                {{-- Dropdown --}}
                <div id="announcements-menu" class="hidden absolute right-0 top-[calc(100%+8px)] bg-white drop-shadow-[0px_0px_12px_0px_rgba(0,0,0,0.24)] rounded-[16px] flex flex-col gap-[10px] items-center overflow-y-auto pb-[24px] px-[24px] w-[380px] max-h-[500px] z-30">
                    <div class="bg-white flex gap-[10px] items-center pb-[6px] pt-[16px] sticky top-0 w-full z-10">
                        <h3 class="flex-1 font-['Work_Sans',sans-serif] font-semibold text-[16px] leading-[28.8px] text-[#1B1C1C]">Announcements</h3>
                        <a href="{{ Route::has('student.announcements') ? route('student.announcements') : '#' }}" wire:navigate
                           class="bg-[#216C221A] flex items-center justify-center px-[12px] py-[4px] rounded-full shrink-0 hover:bg-[#216C2230] transition">
                            <span class="font-['Work_Sans',sans-serif] font-normal text-[12px] leading-[18px] text-[#1B1C1C] whitespace-nowrap">View All</span>
                        </a>
                    </div>
                    @foreach ($announcements as $item)
                        <div class="bg-white border border-[#216C221A] rounded-[16px] p-[24px] flex flex-col gap-[16px] items-start w-full shrink-0">
                            <div class="flex flex-col items-start w-full">
                                <span class="font-['Work_Sans',sans-serif] font-normal text-[12px] leading-[28.8px] text-[#707A6C]">{{ $item['date'] }}</span>
                                <span class="font-['Work_Sans',sans-serif] font-semibold text-[18px] leading-[28.8px] text-[#1B1C1C]">{{ $item['emoji'] }} {{ $item['title'] }}</span>
                            </div>
                            <p class="font-['Work_Sans',sans-serif] font-normal text-[14px] leading-normal text-[#1B1C1C] whitespace-pre-line">{{ $item['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Notification --}}
            <button class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-[#6B7280] hover:text-[#40493D] transition relative">
                <i class="fa-regular fa-bell text-[14px]"></i>
                <span class="absolute -top-0.5 -right-0.5 w-[18px] h-[18px] flex items-center justify-center bg-[#BA1A1A] border border-[#BA1A1A] rounded-full">
                    <span class="font-['Work_Sans',sans-serif] font-normal text-[12px] leading-[18px] text-white">3</span>
                </span>
            </button>

            {{-- Divider --}}
            <div class="w-px h-5 bg-[#E5EAE3] mx-2"></div>

            {{-- Avatar + name + dropdown --}}
            <div class="relative">
                <button type="button" id="profile-menu-button" class="flex items-center gap-2 cursor-pointer group">
                    <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-[#97E68C] flex-shrink-0 bg-[#216C22] flex items-center justify-center">
                        <span class="font-['Work_Sans',sans-serif] font-bold text-[10px] text-white leading-none">
                            {{ strtoupper(substr(auth()->user()?->name ?? 'S', 0, 2)) }}
                        </span>
                    </div>
                    <div class="flex flex-col leading-tight portal-avatar-name text-left">
                        <span class="font-['Work_Sans',sans-serif] font-semibold text-[13px] text-[#1B1C1C] group-hover:text-[#216C22] transition-colors">
                            {{ auth()->user()?->name ?? 'Student' }}
                        </span>
                        <span class="font-['Work_Sans',sans-serif] font-normal text-[10px] text-[#8A9490]">Student</span>
                    </div>
                    <i id="profile-menu-chevron" class="fa-solid fa-chevron-down text-[#6B7280] text-[10px] transition-transform"></i>
                </button>

                {{-- Dropdown menu --}}
                <div id="profile-menu" class="hidden absolute right-0 top-[calc(100%+8px)] bg-white drop-shadow-[0px_2px_4px_rgba(0,0,0,0.18)] rounded-[12px] p-[16px] flex flex-col gap-[4px] w-[274px] z-30">
                    <a href="{{ Route::has('student.profile') ? route('student.profile') : '#' }}" wire:navigate>
                        <span class="flex items-center gap-[12px] h-[56px] rounded-[12px] pl-[8px] pr-[16px] hover:bg-gray-50 transition">
                            <i class="fa-regular fa-circle-user text-[24px] text-[#40493D]"></i>
                            <span class="font-['Work_Sans',sans-serif] font-medium text-[16px] text-[#40493D]">My Profile</span>
                        </span>
                    </a>
                    <a href="#" class="border-b border-[#E5E5E5] pb-[4px]">
                        <span class="flex items-center gap-[12px] h-[56px] rounded-[12px] pl-[8px] pr-[16px] hover:bg-gray-50 transition">
                            <i class="fa-solid fa-key text-[24px] text-[#40493D]"></i>
                            <span class="font-['Work_Sans',sans-serif] font-medium text-[16px] text-[#40493D]">Change password</span>
                        </span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-[12px] h-[56px] w-full rounded-[12px] pl-[8px] pr-[16px] hover:bg-gray-50 transition">
                            <i class="fa-solid fa-arrow-right-from-bracket text-[24px] text-[#BA1A1A]"></i>
                            <span class="font-['Work_Sans',sans-serif] font-medium text-[16px] text-[#BA1A1A]">Logout</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>

<script>
(function () {

    const profileMenuButton = document.getElementById('profile-menu-button');
    const profileMenu = document.getElementById('profile-menu');
    const profileMenuChevron = document.getElementById('profile-menu-chevron');
    if (profileMenuButton && profileMenu) {
        profileMenuButton.addEventListener('click', function (e) {
            e.stopPropagation();
            profileMenu.classList.toggle('hidden');
            if (profileMenuChevron) profileMenuChevron.classList.toggle('rotate-180');
        });
    }

    // Announcements dropdown
    const announcementsMenuButton = document.getElementById('announcements-menu-button');
    const announcementsMenu = document.getElementById('announcements-menu');
    if (announcementsMenuButton && announcementsMenu) {
        announcementsMenuButton.addEventListener('click', function (e) {
            e.stopPropagation();
            announcementsMenu.classList.toggle('hidden');
        });
    }

    // Close on outside click. Bound once on <html> (persists across wire:navigate, unlike
    // <body>) and re-queries elements fresh on every click, since this whole script re-runs
    // on every navigation and would otherwise stack duplicate listeners.
    if (!document.documentElement.dataset.studentNavbarDropdownCloseBound) {
        document.documentElement.dataset.studentNavbarDropdownCloseBound = '1';

        document.addEventListener('click', function (e) {
            const openProfileMenu = document.getElementById('profile-menu');
            const profileBtn = document.getElementById('profile-menu-button');
            const profileChevron = document.getElementById('profile-menu-chevron');
            if (openProfileMenu && !openProfileMenu.classList.contains('hidden') && !openProfileMenu.contains(e.target) && e.target !== profileBtn && !profileBtn.contains(e.target)) {
                openProfileMenu.classList.add('hidden');
                if (profileChevron) profileChevron.classList.remove('rotate-180');
            }

            const openAnnouncementsMenu = document.getElementById('announcements-menu');
            const announcementsBtn = document.getElementById('announcements-menu-button');
            if (openAnnouncementsMenu && !openAnnouncementsMenu.classList.contains('hidden') && !openAnnouncementsMenu.contains(e.target) && e.target !== announcementsBtn && !announcementsBtn.contains(e.target)) {
                openAnnouncementsMenu.classList.add('hidden');
            }
        });
    }

})();
</script>
