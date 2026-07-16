<header class="bg-white border-b border-[#E5EAE3] sticky top-0 z-20 flex-shrink-0">
    <div class="flex items-center justify-between py-5 portal-navbar-inner">

        {{-- Nav links as pill buttons (left) --}}
        @php
            $currentRoute = request()->route()->getName() ?? '';
            $links = [
                ['label' => 'Dashboard',      'route' => 'teacher.dashboard'],
                ['label' => 'Schedule',       'route' => 'teacher.weekly-schedule'],
                ['label' => 'Announcements',  'route' => 'teacher.announcements'],
                ['label' => 'My Books',       'route' => 'teacher.books'],
            ];
        @endphp

        <nav class="flex items-center gap-2">
            @foreach ($links as $link)
                @php
                    $isActive = $currentRoute === $link['route'];
                    $href = \Illuminate\Support\Facades\Route::has($link['route']) ? route($link['route']) : '#';
                @endphp
                <a href="{{ $href }}" wire:navigate
                   class="h-[40px] px-[24px] flex items-center justify-center rounded-full font-['Work_Sans',sans-serif] font-medium text-[16px] leading-[24px] tracking-normal transition-colors border border-[#707A6C] text-[#216C22]
                          {{ $isActive
                              ? 'bg-[#F2F3EF] shadow-[0px_2px_2px_0px_rgba(0,0,0,0.24)]'
                              : 'bg-[#FBF9F8] hover:bg-[#F2F3EF]' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Right: icons + avatar --}}
        <div class="flex items-center gap-1">

            {{-- Announcements (Figma: icons/announcements02) --}}
            @php
                $announcements = [
                    [
                        'date'        => '7 July 2026',
                        'emoji'       => '🌙',
                        'title'       => 'Eid-ul-Adha Holidays',
                        'description' => "Please be informed that all online classes and school activities will remain suspended from 2nd Jun, 2026 to 6th Jun, 2026 in observance of Eid-ul-Adha.\n\nRegular classes will resume on 7th Jun, 2026\n\nWishing all our students, teachers, and families a joyful, peaceful, and blessed Eid Mubarak! ✨",
                    ],
                    [
                        'date'        => '7 July 2026',
                        'emoji'       => '📖',
                        'title'       => 'Exams Week',
                        'description' => "Please be informed that all online classes and school activities will remain suspended from 2nd Jun, 2026 to 6th Jun, 2026 in observance of Eid-ul-Adha.\n\nRegular classes will resume on 7th Jun, 2026\n\nWishing all our students, teachers, and families a joyful, peaceful, and blessed Eid Mubarak! ✨",
                    ],
                    [
                        'date'        => '7 July 2026',
                        'emoji'       => '🌙',
                        'title'       => 'Eid-ul-Fitar Holidays',
                        'description' => "Please be informed that all online classes and school activities will remain suspended from 2nd Jun, 2026 to 6th Jun, 2026 in observance of Eid-ul-Adha.\n\nRegular classes will resume on 7th Jun, 2026\n\nWishing all our students, teachers, and families a joyful, peaceful, and blessed Eid Mubarak! ✨",
                    ],
                ];
            @endphp
            <div class="relative">
                <button type="button" id="announcements-menu-button" class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-[#6B7280] hover:text-[#40493D] transition relative">
                    <i class="fa-solid fa-bullhorn text-[14px]"></i>
                </button>

                {{-- Dropdown (Figma: My Announcements dropdown) --}}
                <div id="announcements-menu" class="hidden absolute right-0 top-[calc(100%+8px)] bg-white drop-shadow-[0px_0px_12px_0px_rgba(0,0,0,0.24)] rounded-[16px] flex flex-col gap-[10px] items-center overflow-y-auto pb-[24px] px-[24px] w-[380px] max-h-[500px] z-30">
                    <div class="bg-white flex items-center justify-center pb-[8px] pl-0 pt-[24px] sticky top-0 w-full z-10">
                        <h3 class="flex-1 font-['Work_Sans',sans-serif] font-semibold text-[20px] leading-[28.8px] text-[#1B1C1C]">Announcements</h3>
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

            {{-- Bell --}}
            <button class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-[#6B7280] hover:text-[#40493D] transition relative">
                <i class="fa-regular fa-bell text-[14px]"></i>
            </button>

            {{-- Settings --}}
            <button class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-[#6B7280] hover:text-[#40493D] transition">
                <i class="fa-solid fa-gear text-[14px]"></i>
            </button>

            {{-- Divider --}}
            <div class="w-px h-5 bg-[#E5EAE3] mx-2"></div>

            {{-- Avatar + name + dropdown --}}
            <div class="relative">
                <button type="button" id="profile-menu-button" class="flex items-center gap-2 cursor-pointer group">
                    <div class="w-10 h-10 rounded-full overflow-hidden bg-[#97E68C] flex-shrink-0">
                        <img src="{{ asset('images/girl.jpg') }}" alt="Asad Shoaib" class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col leading-tight portal-avatar-name text-left">
                        <span class="font-['Work_Sans',sans-serif] font-bold text-[14px] text-[#1B1C1C] group-hover:text-[#216C22] transition-colors">Asad Shoaib</span>
                        <span class="font-['Work_Sans',sans-serif] font-normal text-[12px] text-[#40493D]">Lead Educator</span>
                    </div>
                    <i id="profile-menu-chevron" class="fa-solid fa-chevron-down text-[#6B7280] text-[12px] transition-transform"></i>
                </button>

                {{-- Dropdown menu (Figma: Profile dropdown) --}}
                <div id="profile-menu" class="hidden absolute right-0 top-[calc(100%+8px)] bg-white drop-shadow-[0px_2px_4px_rgba(0,0,0,0.18)] rounded-[12px] p-[16px] flex flex-col gap-[4px] w-[274px] z-30">
                    <a href="{{ Route::has('teacher.profile') ? route('teacher.profile') : '#' }}" wire:navigate class="border-b border-[#E5E5E5] pb-[4px]">
                        <span class="flex items-center gap-[12px] h-[56px] rounded-[12px] pl-[8px] pr-[16px] hover:bg-gray-50 transition">
                            <i class="fa-regular fa-circle-user text-[24px] text-[#46494B]"></i>
                            <span class="font-['Hanken_Grotesk',sans-serif] font-medium text-[14px] text-[#46494B]">My Profile</span>
                        </span>
                    </a>
                    <a href="#" class="border-b border-[#E5E5E5] pb-[4px]">
                        <span class="flex items-center gap-[12px] h-[56px] rounded-[12px] pl-[8px] pr-[16px] hover:bg-gray-50 transition">
                            <i class="fa-regular fa-circle-question text-[24px] text-[#46494B]"></i>
                            <span class="font-['Hanken_Grotesk',sans-serif] font-medium text-[16px] text-[#46494B]">Help &amp; Support</span>
                        </span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-[12px] h-[56px] w-full rounded-[12px] pl-[8px] pr-[16px] hover:bg-gray-50 transition">
                            <i class="fa-solid fa-arrow-right-from-bracket text-[24px] text-[#BA1A1A]"></i>
                            <span class="font-['Hanken_Grotesk',sans-serif] font-medium text-[16px] text-[#BA1A1A]">Logout</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>

<script>
(function () {

    // Profile dropdown
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

    // Close open dropdowns on outside click. Bound once on <html> (which persists across
    // wire:navigate, unlike <body>) and re-queries elements fresh on every click, since this
    // whole script re-runs on every navigation and would otherwise stack duplicate listeners.
    if (!document.documentElement.dataset.navbarDropdownCloseBound) {
        document.documentElement.dataset.navbarDropdownCloseBound = '1';

        document.addEventListener('click', function (e) {
            const openProfileMenu = document.getElementById('profile-menu');
            const profileBtn = document.getElementById('profile-menu-button');
            const profileChevron = document.getElementById('profile-menu-chevron');
            if (openProfileMenu && !openProfileMenu.classList.contains('hidden') && !openProfileMenu.contains(e.target) && e.target !== profileBtn) {
                openProfileMenu.classList.add('hidden');
                if (profileChevron) profileChevron.classList.remove('rotate-180');
            }

            const openAnnouncementsMenu = document.getElementById('announcements-menu');
            const announcementsBtn = document.getElementById('announcements-menu-button');
            if (openAnnouncementsMenu && !openAnnouncementsMenu.classList.contains('hidden') && !openAnnouncementsMenu.contains(e.target) && e.target !== announcementsBtn) {
                openAnnouncementsMenu.classList.add('hidden');
            }
        });
    }

})();
</script>
