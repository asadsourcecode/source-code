@php
    $address     = $siteSettings?->address     ?? '124-128, City Road London EC1V 2NX';
    $facebookUrl = $siteSettings?->facebook_url  ?? '#';
    $instagramUrl= $siteSettings?->instagram_url ?? '#';
    $youtubeUrl  = $siteSettings?->youtube_url   ?? '#';
@endphp

<footer class="footer-bg text-white bg-cover bg-top bg-no-repeat">

    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">

        <div class="grid gap-12 lg:grid-cols-[350px_1fr] lg:items-center">

            <!-- Logo / About -->
            <div>

                <a href="/" aria-label="ICE home" class="inline-block mb-6">
                    <img
                        src="{{ asset('images/logo-Nw.webp') }}"
                        alt="Integrated Character Education"
                        class="h-36 w-auto"
                    >
                </a>

                <p class="max-w-sm text-sm leading-8 text-white/80">
                    No part of this website may be reproduced or utilized in any form
                    or by any means, electronic or mechanical, including photocopying
                    and recording or by information storage and retrieval system,
                    without permission from the publisher.
                </p>

                <p class="mt-6 text-sm font-medium text-white/90">{{ $address }}</p>

                <!-- Social Icons -->
                <div class="mt-5 flex items-center gap-4">

                    @if ($facebookUrl !== '#')
                        <a href="{{ $facebookUrl }}" aria-label="Facebook" target="_blank" rel="noopener"
                           class="text-white/60 hover:text-[#C9F9B6] transition-colors duration-200">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                    @endif

                    @if ($instagramUrl !== '#')
                        <a href="{{ $instagramUrl }}" aria-label="Instagram" target="_blank" rel="noopener"
                           class="text-white/60 hover:text-[#C9F9B6] transition-colors duration-200">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    @endif

                    @if ($youtubeUrl !== '#')
                        <a href="{{ $youtubeUrl }}" aria-label="YouTube" target="_blank" rel="noopener"
                           class="text-white/60 hover:text-[#C9F9B6] transition-colors duration-200">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    @endif

                </div>

            </div>

            <!-- Footer Menu Columns -->
            @php $columns = $footerMenu->chunk(ceil($footerMenu->count() / 4)); @endphp

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4 font-bold">

                @forelse ($columns as $col)

                    <ul class="space-y-4">

                        @foreach ($col as $link)
                            <li>
                                <a
                                    href="{{ $link->url }}"
                                    class="text-sm text-white/85 transition duration-200 hover:text-[#f2c94c]"
                                >
                                    {{ $link->title }}
                                </a>
                            </li>
                        @endforeach

                    </ul>

                @empty

                    <div class="col-span-4 text-white/40 text-sm">
                        Footer menu not configured yet. Add items under Footer menu in admin.
                    </div>

                @endforelse

            </div>

        </div>

    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-white/10">

        <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6 lg:px-8">

            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                <p class="text-sm text-white/80">
                    &copy; {{ date('Y') }} ICE Publishers (Integrated Character Education).
                    All Rights Reserved.
                </p>

                <div class="flex flex-wrap items-center gap-3 text-sm text-white/70">
                    <span>American Express</span>
                    <span>Apple Pay</span>
                    <span>Mastercard</span>
                    <span>Visa</span>
                </div>

            </div>

        </div>

    </div>

</footer>
