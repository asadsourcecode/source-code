@extends($embed ? 'layouts.embed' : 'livewire.student.layouts.app', ['title' => $product->title . ' | ICE Student Portal', 'fullBleed' => true])

@section('portal-content')
<div class="{{ $embed ? 'h-screen' : 'flex-1 min-h-0 w-full' }} bg-[#1B1C1C] flex flex-col overflow-hidden">

    @if($allowedPages === 0)

    @unless($embed)
    <div class="flex-shrink-0 w-full max-w-5xl mx-auto px-4 pt-4 flex items-center justify-between">
        <a href="{{ route('student.dashboard') }}" class="text-white/70 hover:text-white text-sm font-['Work_Sans',sans-serif]">
            &larr; Back to My Books
        </a>
        <h1 class="text-white font-bold text-lg font-['Work_Sans',sans-serif]">{{ $product->title }}</h1>
        <div class="w-32"></div>
    </div>
    @endunless

    <div class="flex-1 flex flex-col items-center justify-center px-4 text-center">
        <p class="text-white font-semibold text-lg font-['Work_Sans',sans-serif] mb-2">
            Your teacher hasn't unlocked this book yet.
        </p>
        <p class="text-white/60 text-sm font-['Work_Sans',sans-serif]">
            Check back once your teacher has started this book in class.
        </p>
    </div>

    @else

    {{-- Book viewer — title, progress bar, and controls float on top of the book
         instead of taking their own rows, so the book itself gets the full
         available height. --}}
    <div class="relative flex-1 min-h-0 overflow-hidden">
        <div id="book-flip-wrapper" class="absolute inset-0 flex items-center justify-center overflow-hidden">
            <div id="book-flip-backdrop" class="absolute inset-0 bg-cover bg-center scale-125 blur-2xl opacity-40"></div>
            <div id="book-flip" class="relative z-10 shadow-2xl max-w-full max-h-full"></div>
        </div>

        <div class="absolute top-0 left-0 right-0 z-20 w-full max-w-2xl mx-auto px-4 py-2 bg-gradient-to-b from-black/70 to-transparent pointer-events-none">
            @unless($embed)
            <div class="flex items-center justify-between mb-1.5">
                <a href="{{ route('student.dashboard') }}" class="pointer-events-auto text-white/70 hover:text-white text-xs font-['Work_Sans',sans-serif]">
                    &larr; Back to My Books
                </a>
                <h1 class="text-white font-bold text-sm font-['Work_Sans',sans-serif]">{{ $product->title }}</h1>
                <div class="w-32"></div>
            </div>
            @endunless
            <div class="flex items-center justify-between mb-1">
                <span class="text-white/70 text-xs font-['Work_Sans',sans-serif]">Reading progress</span>
                <span id="book-progress-percent" class="text-white/70 text-xs font-['Work_Sans',sans-serif]">0%</span>
            </div>
            <div class="w-full h-1.5 bg-white/10 rounded-full overflow-hidden">
                <div id="book-progress-bar" class="h-full bg-[#2FE432] rounded-full transition-all duration-300" style="width: 0%"></div>
            </div>
            @if($allowedPages < $totalPages)
            <p class="text-white/50 text-xs font-['Work_Sans',sans-serif] mt-1">
                You've unlocked {{ $allowedPages }} of {{ $totalPages }} pages — ask your teacher to unlock more.
            </p>
            @endif
        </div>

        <div class="absolute bottom-0 left-0 right-0 z-20 flex items-center justify-center gap-6 py-3 bg-gradient-to-t from-black/70 to-transparent pointer-events-none">
            <button id="book-prev" type="button"
                class="pointer-events-auto bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[13px] px-5 py-2 rounded-full hover:bg-green-900 transition disabled:opacity-40 disabled:cursor-not-allowed">
                &larr; Prev
            </button>
            <span id="book-page-indicator" class="text-white/80 text-sm font-['Work_Sans',sans-serif]"></span>
            <button id="book-next" type="button"
                class="pointer-events-auto bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[13px] px-5 py-2 rounded-full hover:bg-green-900 transition disabled:opacity-40 disabled:cursor-not-allowed">
                Next &rarr;
            </button>
        </div>
    </div>

    @endif

</div>

@if($allowedPages > 0)
<script>
    window.__bookPages = @json($pages->map(fn ($page) => $page->imageUrl())->values());
    window.__bookPageAspect = {{ $pageAspect }};
    window.__bookInitialPage = {{ $initialPage }};
    window.__bookProgressUrl = @json(route('books.progress', $product->slug));
</script>
@vite('resources/js/book-reader.js')
@endif
@endsection
