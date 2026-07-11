@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center gap-1">

    {{-- Previous --}}
    @if ($paginator->onFirstPage())
        <span class="inline-flex items-center px-2 py-1 text-xs text-gray-400 bg-white border border-gray-200 rounded cursor-not-allowed">
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-50 transition">
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
        </a>
    @endif

    {{-- Page numbers --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="px-2 py-1 text-xs text-gray-400">{{ $element }}</span>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-semibold text-white bg-gray-700 border border-gray-700 rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="inline-flex items-center px-2.5 py-1 text-xs text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-50 transition">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-50 transition">
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
        </a>
    @else
        <span class="inline-flex items-center px-2 py-1 text-xs text-gray-400 bg-white border border-gray-200 rounded cursor-not-allowed">
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
        </span>
    @endif

</nav>
@endif
