@extends('livewire.student.layouts.app', ['title' => $assignment->title . ' | ICE Student Portal', 'fullBleed' => true])

@section('portal-content')
<div class="flex-1 min-h-0 w-full bg-[#1B1C1C] flex overflow-hidden">

    {{-- Book viewer — header/controls float on top of the book instead of taking
         their own rows, so the book itself gets the full available height. --}}
    <div class="relative flex-1 min-h-0 overflow-hidden">
        <div id="book-flip-wrapper" class="absolute inset-0 flex items-center justify-center overflow-hidden">
            <div id="book-flip-backdrop" class="absolute inset-0 bg-cover bg-center scale-125 blur-2xl opacity-40"></div>
            <div id="book-flip" class="relative z-10 shadow-2xl max-w-full max-h-full"></div>
        </div>

        <div class="absolute top-0 left-0 right-0 z-20 px-4 py-2 flex items-center justify-between bg-gradient-to-b from-black/70 to-transparent pointer-events-none">
            <a href="{{ route('student.assignments.index') }}" class="pointer-events-auto text-white/70 hover:text-white text-xs font-['Work_Sans',sans-serif]">
                &larr; All Assignments
            </a>
            <h1 class="text-white font-bold text-sm font-['Work_Sans',sans-serif]">{{ $assignment->title }}</h1>
            <div class="w-32"></div>
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

    {{-- Instructions + submit panel (answers are filled directly on the page) --}}
    <div class="w-[300px] flex-shrink-0 bg-white flex flex-col overflow-hidden">

        <div class="p-4 flex-1">
            @if ($assignment->instructions)
                <p class="text-[12px] text-[#40493D] font-['Work_Sans',sans-serif] mb-2">{{ $assignment->instructions }}</p>
            @endif
            <p class="text-[11px] text-[#8A9490] font-['Work_Sans',sans-serif]">
                Answer boxes appear directly on the page next to each question — your answers save automatically as you go.
            </p>
            <div id="submit-status" class="mt-3"></div>
        </div>

        <div class="p-4 border-t border-[#C0C9B94D]">
            <button id="submit-assignment-btn" type="button"
                class="w-full bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[14px] py-2.5 rounded-full hover:bg-green-900 transition disabled:opacity-40 disabled:cursor-not-allowed">
                Submit Assignment
            </button>
        </div>

    </div>

</div>

<div id="pin-layer" style="position: fixed; inset: 0; pointer-events: none; z-index: 20;"></div>

<script>
    window.__bookPages = @json($pages->map(fn ($page) => $page->imageUrl())->values());
    window.__bookPageAspect = {{ $pageAspect }};
    window.__exerciseFields = @json($fields->values());
    window.__existingAnswers = @json($existingAnswers->map(fn ($a) => $a->value));
    window.__assignmentStatus = @json($status);
    window.__assignmentRoutes = {
        saveAnswer: @json(route('student.assignments.answers', $assignment->id)),
        submit: @json(route('student.assignments.submit', $assignment->id)),
    };
</script>
@vite('resources/js/assignment-fill.js')
@endsection
