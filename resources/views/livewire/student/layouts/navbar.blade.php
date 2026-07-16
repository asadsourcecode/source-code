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
                @php $isActive = $currentRoute === $link['route']; @endphp
                <a href="#"
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

            {{-- Bell --}}
            <button class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-[#6B7280] hover:text-[#40493D] transition">
                <i class="fa-regular fa-bell text-[14px]"></i>
            </button>

            {{-- Settings --}}
            <button class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-[#6B7280] hover:text-[#40493D] transition">
                <i class="fa-solid fa-gear text-[14px]"></i>
            </button>

            {{-- Divider --}}
            <div class="w-px h-5 bg-[#E5EAE3] mx-2"></div>

            {{-- Avatar + name --}}
            <div class="flex items-center gap-2 cursor-pointer group">
                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-[#97E68C] flex-shrink-0 bg-[#216C22] flex items-center justify-center">
                    <span class="font-['Work_Sans',sans-serif] font-bold text-[10px] text-white leading-none">
                        {{ strtoupper(substr(auth()->user()?->name ?? 'S', 0, 2)) }}
                    </span>
                </div>
                <div class="flex flex-col leading-tight portal-avatar-name">
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[13px] text-[#1B1C1C] group-hover:text-[#216C22] transition-colors">
                        {{ auth()->user()?->name ?? 'Student' }}
                    </span>
                    <span class="font-['Work_Sans',sans-serif] font-normal text-[10px] text-[#8A9490]">Student</span>
                </div>
            </div>

        </div>
    </div>
</header>
