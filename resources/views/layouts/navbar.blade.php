@php
    $contactPhone = $siteSettings?->phone ?? '+45 50106941';
    $contactEmail = $siteSettings?->email ?? 'Info@characterbuilding.education';
@endphp

<header>

    <!-- Top Bar -->
    <div class="bg-[#232323] text-white border-b border-white/10">
        <div class="w-full px-8 py-3">

            <div class="flex items-center">

                <!-- Left: Phone & Email -->
                <div class="hidden lg:flex items-center gap-8">

                  <span class="inline-flex items-center gap-2 text-sm">
    <x-whatsapp-ico class="h-5 w-5 shrink-0 text-[#C9F9B6]" />
    <span>{{ $contactPhone }}</span>
</span>

                    <div class="h-5 w-px bg-white/20"></div>

                    <span class="inline-flex items-center gap-2 text-sm">
    <x-email-ico class="h-5 w-5 text-[#C9F9B6]" />
    <span>{{ $contactEmail }}</span>
</span>

                </div>

                <!-- Right: Search, Cart, Login -->
                <div class="ml-auto flex items-center gap-5">

                    <div class="hidden lg:block relative">
                        <input
                            type="text"
                            placeholder="Search"
                            class="h-9 w-44 rounded-full bg-[#2d2d2d] pl-4 pr-10 text-sm text-white placeholder-gray-400 focus:outline-none"
                        >
                        <svg
                            class="absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
                        </svg>
                    </div>

                    <a href="#cart" class="hover:text-[#C9F9B6]">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5" />
                        </svg>
                    </a>

                    <div class="hidden lg:flex items-center gap-2 text-sm">
                        <svg class="h-5 w-5 text-[#C9F9B6]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10 2a4 4 0 100 8 4 4 0 000-8zm-7 14a7 7 0 1114 0H3z" />
                        </svg>
                        <a href="#login" class="hover:text-[#C9F9B6]">Log In / Register</a>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="bg-[#232323]">
        <div class="w-full px-8 py-3">

            <div class="flex items-center justify-between gap-2">

                <!-- Logo -->
                <a href="/" class="flex-shrink-0 flex items-center justify-center rounded-[30px] border-2 border-[#C9F9B6] px-4 py-2">
                    <img
                        src="{{ asset('images/logo-6.avif') }}"
                        alt="ICE"
                        class="h-[18px] w-auto block"
                    >
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex ms-1 items-center gap-3">

                    @foreach ($headerMenu as $item)

                        @if(strtolower($item->title) === 'intro')
                            <div class="relative group">
                                <a
                                    href="{{ $item->url }}"
                                    class="inline-flex flex-shrink-0 whitespace-nowrap items-center gap-1 rounded-[30px] border-2 border-[#C9F9B6] px-4 py-[5px] text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
                                >
                                    <span>{{ $item->title }}</span>
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                                <div class="absolute left-0 top-full z-50 invisible group-hover:visible pt-5">
                                    <div class="bg-[#232323] min-w-[200px] px-5 py-3">
                                        <a href="{{ route('new-subject') }}" class="relative inline-block text-white text-[14px] font-medium
                                            after:absolute after:bottom-0 after:left-0 after:h-[1px] after:w-0
                                            after:bg-[#C9F9B6] after:transition-all after:duration-300
                                            hover:after:w-full">New Subject</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a
                                href="{{ $item->url }}"
                                class="inline-flex flex-shrink-0 whitespace-nowrap items-center gap-1 rounded-[30px] border-2 border-[#C9F9B6] px-4 py-[5px] text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
                            >
                                <span>{{ $item->title }}</span>

                                @if ($item->children->isNotEmpty())
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                @endif
                            </a>
                        @endif

                    @endforeach

                </nav>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="lg:hidden p-2 text-white hover:text-[#C9F9B6]">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="hidden lg:hidden mt-4 pb-4">
                <nav class="flex flex-col gap-3">
                    @foreach ($headerMenu as $item)
                        <a
                            href="{{ $item->url }}"
                            class="inline-flex items-center gap-2 rounded-[30px] border-2 border-[#C9F9B6] px-4 py-3 text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
                        >
                            <span>{{ $item->title }}</span>

                            @if ($item->children->isNotEmpty())
                                <svg class="h-3 w-3 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            @endif

                        </a>
                    @endforeach

                    <!-- Mobile-only login link -->
                    <div class="lg:hidden flex items-center gap-2 text-white pt-2">
                        <svg class="h-5 w-5 text-[#C9F9B6]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10 2a4 4 0 100 8 4 4 0 000-8zm-7 14a7 7 0 1114 0H3z" />
                        </svg>
                        <a href="#login" class="hover:text-[#C9F9B6]">Log In / Register</a>
                    </div>
                </nav>
            </div>

        </div>
    </div>

</header>
