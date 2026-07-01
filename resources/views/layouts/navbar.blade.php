@php
    $contactPhone = $siteSettings?->phone ?? '+45 50106941';
    $contactEmail = $siteSettings?->email ?? 'Info@characterbuilding.education';
@endphp

<!-- Mobile Drawer Overlay -->
<div id="drawer-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

<!-- Mobile Drawer -->
<div id="mobile-drawer" class="fixed top-0 left-0 h-full w-[85%] max-w-[340px] bg-white z-50 overflow-y-auto lg:hidden" style="transform: translateX(-100%); transition: transform 0.3s ease-in-out;">

    <!-- Close Button -->
    <div class="flex justify-end p-4 border-b border-gray-200">
        <button id="drawer-close" class="text-gray-600 hover:text-black">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Nav Items -->
    <nav>
        @foreach ($headerMenu as $item)
            @php
                $hasChildren       = $item->children->isNotEmpty();
                $isIntro           = strtolower($item->title) === 'intro';
                $isBooks           = strtolower($item->title) === 'books';
                $isHomeschooling   = str_replace(' ', '', strtolower($item->title)) === 'homeschooling';
                $isOnlineClasses   = str_replace(' ', '', strtolower($item->title)) === 'onlineclasses';
                $isAudioStories      = str_replace(' ', '', strtolower($item->title)) === 'audiostories';
                $titleSlug           = preg_replace('/[^a-z]/', '', strtolower($item->title));
                $isTeachersTraining  = $titleSlug === 'teacherstraining';
                $isContact           = str_contains(strtolower($item->title), 'contact');
            @endphp

            @if ($isContact)
                <a href="{{ route('contact') }}" class="flex items-center px-5 py-4 text-[15px] font-medium text-gray-900 border-b border-gray-200 hover:bg-gray-50">
                    {{ $item->title }}
                </a>
            @elseif ($isTeachersTraining)
                <a href="{{ route('teachers-training') }}" class="flex items-center px-5 py-4 text-[15px] font-medium text-gray-900 border-b border-gray-200 hover:bg-gray-50">
                    {{ $item->title }}
                </a>
            @elseif ($isOnlineClasses)
                <a href="{{ route('online-classes') }}" class="flex items-center px-5 py-4 text-[15px] font-medium text-gray-900 border-b border-gray-200 hover:bg-gray-50">
                    {{ $item->title }}
                </a>
            @elseif ($isAudioStories)
                <a href="{{ route('audio-stories') }}" class="flex items-center px-5 py-4 text-[15px] font-medium text-gray-900 border-b border-gray-200 hover:bg-gray-50">
                    {{ $item->title }}
                </a>
            @elseif ($isHomeschooling)
                <a href="{{ route('homeschooling') }}" class="flex items-center px-5 py-4 text-[15px] font-medium text-gray-900 border-b border-gray-200 hover:bg-gray-50">
                    {{ $item->title }}
                </a>
            @elseif ($hasChildren || $isIntro || $isBooks || str_replace(' ', '', strtolower($item->title)) === 'counselling')
                <div class="drawer-accordion">
                    <button class="drawer-accordion-btn w-full flex items-center justify-between px-5 py-4 text-[15px] font-medium text-gray-900 border-b border-gray-200 hover:bg-gray-50">
                        <span>{{ $item->title }}</span>
                        <svg class="drawer-plus h-4 w-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>
                    <div class="drawer-accordion-content hidden bg-gray-50">
                        @if ($isIntro)
                            <a href="{{ route('new-subject') }}" class="block px-8 py-3 text-[14px] text-gray-700 border-b border-gray-100 hover:bg-gray-100">New Subject</a>
                        @elseif ($isBooks)
                            <a href="{{ route('ebooks') }}" class="block px-8 py-3 text-[14px] text-gray-700 border-b border-gray-100 hover:bg-gray-100">E-books</a>
                            <a href="{{ route('hard-copies') }}" class="block px-8 py-3 text-[14px] text-gray-700 border-b border-gray-100 hover:bg-gray-100">Hard Copies</a>
                        @elseif(str_replace(' ', '', strtolower($item->title)) === 'counselling')
                            <a href="{{ route('logotherapy') }}" class="block px-8 py-3 text-[14px] text-gray-700 border-b border-gray-100 hover:bg-gray-100">Logotherapy</a>
                        @else
                            @foreach ($item->children as $child)
                                <a href="{{ $child->url }}" class="block px-8 py-3 text-[14px] text-gray-700 border-b border-gray-100 hover:bg-gray-100">
                                    {{ $child->title }}
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            @else
                <a href="{{ $item->url }}" class="flex items-center px-5 py-4 text-[15px] font-medium text-gray-900 border-b border-gray-200 hover:bg-gray-50">
                    {{ $item->title }}
                </a>
            @endif
        @endforeach
        <a href="{{ route('online-classes') }}" class="flex items-center px-5 py-4 text-[15px] font-medium text-gray-900 border-b border-gray-200 hover:bg-gray-50">
            Online Classes
        </a>
        <a href="{{ route('homeschooling') }}" class="flex items-center px-5 py-4 text-[15px] font-medium text-gray-900 border-b border-gray-200 hover:bg-gray-50">
            Homeschooling
        </a>
    </nav>

    <!-- Contact Info -->
    <div class="px-5 pt-5 pb-2 border-b border-gray-200">
        <a href="tel:{{ $contactPhone }}" class="flex items-center gap-3 py-3 text-[14px] text-gray-800 border-b border-gray-100">
            <x-whatsapp-ico class="h-5 w-5 shrink-0 text-[#C9F9B6]" />
            <span>{{ $contactPhone }}</span>
        </a>
        <a href="mailto:{{ $contactEmail }}" class="flex items-center gap-3 py-3 text-[14px] text-gray-800 border-b border-gray-100">
            <x-email-ico class="h-5 w-5 shrink-0 text-[#C9F9B6]" />
            <span>{{ $contactEmail }}</span>
        </a>
        <a href="#login" class="flex items-center gap-3 py-3 text-[14px] text-gray-800">
            <svg class="h-5 w-5 text-[#C9F9B6]" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2a4 4 0 100 8 4 4 0 000-8zm-7 14a7 7 0 1114 0H3z" />
            </svg>
            <span>Login / Register</span>
        </a>
    </div>

    <!-- Currency / Language -->
    <div class="flex items-center gap-4 px-5 py-4 text-[14px] text-gray-700">
        <button class="flex items-center gap-1 hover:text-black">
            USD $
            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <button class="flex items-center gap-1 hover:text-black">
            English
            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    </div>

</div>

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

                    <a href="#cart" class="hidden lg:block hover:text-[#C9F9B6]">
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
        <div class="w-full px-2 py-3">

            <div class="flex items-center w-full">

                <!-- Left column: Hamburger (mobile) + Logo -->
                <div class="flex items-center flex-shrink-0 ml-4">
                    <!-- Mobile Hamburger Button -->
                    <button id="mobile-menu-button" class="lg:hidden p-2 text-white hover:text-[#C9F9B6]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Logo -->
                    <a href="/" class="flex flex-shrink-0 items-center justify-center rounded-[30px] border-2 border-[#C9F9B6] px-2 py-1 lg:static absolute left-1/2 -translate-x-1/2 lg:translate-x-0">
                        <img
                            src="{{ asset('images/logo-6.avif') }}"
                            alt="ICE"
                            class="h-[28px] w-auto block"
                        >
                    </a>
                </div>

                <!-- Right column: Desktop Navigation (starts from left, wraps overflow) -->
                <nav class="hidden lg:flex flex-1 flex-wrap items-center gap-1 justify-start ml-[40px]">

                    @foreach ($headerMenu as $item)

                        @if(str_contains(strtolower($item->title), 'contact'))
                            <a
                                href="{{ route('contact') }}"
                                class="inline-flex flex-shrink-0 whitespace-nowrap items-center gap-1 rounded-[30px] border-2 border-[#C9F9B6] px-3 py-[6px] text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
                            >
                                <span>{{ $item->title }}</span>
                            </a>
                        @elseif(preg_replace('/[^a-z]/', '', strtolower($item->title)) === 'teacherstraining')
                            <a
                                href="{{ route('teachers-training') }}"
                                class="inline-flex flex-shrink-0 whitespace-nowrap items-center gap-1 rounded-[30px] border-2 border-[#C9F9B6] px-3 py-[6px] text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
                            >
                                <span>{{ $item->title }}</span>
                            </a>
                        @elseif(str_replace(' ', '', strtolower($item->title)) === 'audiostories')
                            <a
                                href="{{ route('audio-stories') }}"
                                class="inline-flex flex-shrink-0 whitespace-nowrap items-center gap-1 rounded-[30px] border-2 border-[#C9F9B6] px-3 py-[6px] text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
                            >
                                <span>{{ $item->title }}</span>
                            </a>
                        @elseif(str_replace(' ', '', strtolower($item->title)) === 'onlineclasses')
                            <a
                                href="{{ route('online-classes') }}"
                                class="inline-flex flex-shrink-0 whitespace-nowrap items-center gap-1 rounded-[30px] border-2 border-[#C9F9B6] px-3 py-[6px] text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
                            >
                                <span>{{ $item->title }}</span>
                            </a>
                        @elseif(str_replace(' ', '', strtolower($item->title)) === 'homeschooling')
                            <a
                                href="{{ route('homeschooling') }}"
                                class="inline-flex flex-shrink-0 whitespace-nowrap items-center gap-1 rounded-[30px] border-2 border-[#C9F9B6] px-3 py-[6px] text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
                            >
                                <span>{{ $item->title }}</span>
                            </a>
                        @elseif(str_replace(' ', '', strtolower($item->title)) === 'counselling')
                            <div class="relative desktop-dropdown-parent">
                                <a
                                    href="{{ route('counselling') }}"
                                    class="inline-flex flex-shrink-0 whitespace-nowrap items-center gap-1 rounded-[30px] border-2 border-[#C9F9B6] px-3 py-[6px] text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
                                >
                                    <span>{{ $item->title }}</span>
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                                <div class="desktop-dropdown">
                                    <div class="bg-[#232323] min-w-[200px] px-5 py-3">
                                        <a href="{{ route('logotherapy') }}" class="relative inline-block text-white text-[14px] font-medium
                                            after:absolute after:bottom-0 after:left-0 after:h-[1px] after:w-0
                                            after:bg-[#C9F9B6] after:transition-all after:duration-300
                                            hover:after:w-full">Logotherapy</a>
                                    </div>
                                </div>
                            </div>
                        @elseif(strtolower($item->title) === 'intro')
                            <div class="relative desktop-dropdown-parent">
                                <a
                                    href="{{ route('introduction') }}"
                                    class="inline-flex flex-shrink-0 whitespace-nowrap items-center gap-1 rounded-[30px] border-2 border-[#C9F9B6] px-3 py-[6px] text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
                                >
                                    <span>{{ $item->title }}</span>
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                                <div class="desktop-dropdown">
                                    <div class="bg-[#232323] min-w-[200px] px-5 py-3">
                                        <a href="{{ route('new-subject') }}" class="relative inline-block text-white text-[14px] font-medium
                                            after:absolute after:bottom-0 after:left-0 after:h-[1px] after:w-0
                                            after:bg-[#C9F9B6] after:transition-all after:duration-300
                                            hover:after:w-full">New Subject</a>
                                    </div>
                                </div>
                            </div>
                        @elseif(strtolower($item->title) === 'books')
                            <div class="relative desktop-dropdown-parent">
                                <a
                                    href="{{ $item->url }}"
                                    class="inline-flex flex-shrink-0 whitespace-nowrap items-center gap-1 rounded-[30px] border-2 border-[#C9F9B6] px-3 py-[6px] text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
                                >
                                    <span>{{ $item->title }}</span>
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                                <div class="desktop-dropdown">
                                    <div class="bg-[#3B1A07] min-w-[200px] px-5 py-3 flex flex-col gap-3 items-start">
                                        <a href="{{ route('ebooks') }}" class="relative inline-block text-white text-[14px] font-medium
                                            after:absolute after:bottom-0 after:left-0 after:h-[1px] after:w-0
                                            after:bg-[#C9F9B6] after:transition-all after:duration-300
                                            hover:after:w-full">E-books</a>
                                        <a href="{{ route('hard-copies') }}" class="relative inline-block text-white text-[14px] font-medium
                                            after:absolute after:bottom-0 after:left-0 after:h-[1px] after:w-0
                                            after:bg-[#C9F9B6] after:transition-all after:duration-300
                                            hover:after:w-full">Hard Copies</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a
                                href="{{ $item->url }}"
                                class="inline-flex flex-shrink-0 whitespace-nowrap items-center gap-1 rounded-[30px] border-2 border-[#C9F9B6] px-3 py-[6px] text-[15px] font-medium text-white transition-all duration-200 hover:bg-[#C9F9B6] hover:text-black"
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


            </div>

        </div>
    </div>

</header>
