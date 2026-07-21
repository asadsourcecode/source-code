@extends('livewire.teacher.layouts.app', ['title' => 'Build Exercises — ' . $product->title . ' | ICE Teacher Portal', 'fullBleed' => true])

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
            <a href="{{ route('teacher.dashboard') }}" class="pointer-events-auto text-white/70 hover:text-white text-xs font-['Work_Sans',sans-serif]">
                &larr; Back to Dashboard
            </a>
            <h1 class="text-white font-bold text-sm font-['Work_Sans',sans-serif]">{{ $product->title }} — Exercise Builder</h1>
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

    {{-- Add-field panel --}}
    <div class="w-[300px] flex-shrink-0 bg-white flex flex-col overflow-hidden">

        <div class="p-4">
            <h2 class="font-['Work_Sans',sans-serif] font-bold text-[15px] text-[#1B1C1C] mb-3">Add a field</h2>

            <div class="flex flex-col gap-2">
                <select id="new-field-type" class="border border-[#C0C9B9] rounded-[6px] text-[13px] font-['Work_Sans',sans-serif] py-1.5 px-2">
                    <option value="text">Short text</option>
                    <option value="textarea">Paragraph</option>
                    <option value="radio">Multiple choice (single answer)</option>
                    <option value="checkbox">Checkboxes (multiple answers)</option>
                </select>

                <input id="new-field-label" type="text" placeholder="Question text"
                    class="border border-[#C0C9B9] rounded-[6px] text-[13px] font-['Work_Sans',sans-serif] py-1.5 px-2">

                <textarea id="new-field-options" rows="3" placeholder="One option per line (for multiple choice / checkboxes)"
                    class="border border-[#C0C9B9] rounded-[6px] text-[13px] font-['Work_Sans',sans-serif] py-1.5 px-2 hidden"></textarea>

                <div class="flex gap-2">
                    <select id="new-field-font-family" class="flex-1 border border-[#C0C9B9] rounded-[6px] text-[12px] font-['Work_Sans',sans-serif] py-1.5 px-2">
                        @foreach ($fontFamilies as $family)
                            <option value="{{ $family }}" style="font-family: {{ $family }}">{{ explode(',', $family)[0] }}</option>
                        @endforeach
                    </select>
                    <select id="new-field-font-weight" class="border border-[#C0C9B9] rounded-[6px] text-[12px] font-['Work_Sans',sans-serif] py-1.5 px-2">
                        <option value="normal">Normal</option>
                        <option value="bold">Bold</option>
                    </select>
                    <input id="new-field-font-size" type="number" min="8" max="48" value="14"
                        class="w-16 border border-[#C0C9B9] rounded-[6px] text-[12px] font-['Work_Sans',sans-serif] py-1.5 px-2" title="Font size (px)">
                </div>

                <button id="place-field-btn" type="button"
                    class="bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[13px] py-2 rounded-[8px] hover:bg-green-900 transition">
                    Click page to place
                </button>
                <p id="placement-hint" class="text-[11px] text-[#8A9490] font-['Work_Sans',sans-serif] hidden">
                    Now click anywhere on the page to drop this field there.
                </p>
                <p class="text-[11px] text-[#8A9490] font-['Work_Sans',sans-serif]">
                    Placed fields show a live preview directly on the page — use its Move / Delete buttons to manage it.
                </p>
            </div>
        </div>

    </div>

</div>

<div id="pin-layer" style="position: fixed; inset: 0; pointer-events: none; z-index: 20;"></div>

<script>
    window.__bookPages = @json($pages->map(fn ($page) => $page->imageUrl())->values());
    window.__bookPageAspect = {{ $pageAspect }};
    window.__exerciseFields = @json($fields->values());
    window.__fontFamilies = @json($fontFamilies);
    window.__exerciseFieldRoutes = {
        store: @json(route('teacher.exercise-fields.store', $product->id)),
        update: @json(url('/teacher/exercise-fields')),
        destroy: @json(url('/teacher/exercise-fields')),
    };
</script>
@vite('resources/js/exercise-builder.js')
@endsection
