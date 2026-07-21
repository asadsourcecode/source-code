<div>

<div class="flex items-end justify-between mb-4">
    <div>
        <h2 class="font-['Work_Sans',sans-serif] font-bold text-xl leading-[28px] tracking-normal text-[#1B1C1C]">
            My Books
        </h2>
        <p class="font-['Work_Sans',sans-serif] font-normal text-sm text-[#8A9490] mt-0.5">
            Quickly access the books you Learn
        </p>
    </div>
</div>

@if (empty($books))
    <div class="flex flex-col items-center justify-center py-16 text-center bg-white border-2 border-[#C0C9B94D] rounded-[16px]">
        <p class="font-['Work_Sans',sans-serif] font-semibold text-[15px] text-[#1B1C1C]">
            You haven't purchased any books yet.
        </p>
        <a href="{{ route('pricing') }}"
           class="mt-4 bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[13px] px-5 py-2.5 rounded-full hover:bg-green-900 transition">
            Browse Books
        </a>
    </div>
@else
<div class="portal-books-grid">
    @foreach ($books as $book)

    <div class="flex flex-col bg-white border-2 border-[#C0C9B94D] rounded-[16px] overflow-hidden">

        <div class="flex items-center justify-center h-[293px] p-[10px] gap-[10px] bg-[#F5F7F5] portal-book-img">
            <img src="{{ $book['image'] }}"
                 alt="{{ $book['title'] }}"
                 class="h-full w-full object-contain rounded-[8px]">
        </div>

        <div class="flex flex-col gap-3 p-4">

            <div>
                <p class="font-['Work_Sans',sans-serif] font-bold text-[14px] leading-[19.6px] tracking-normal text-[#1B1C1C]">
                    {{ $book['title'] }}
                </p>
                <p class="font-['Work_Sans',sans-serif] font-normal text-[12px] text-[#8A9490] mt-0.5">
                    {{ $book['type'] ?? 'Purchased ' . $book['purchased_at'] }}
                </p>
            </div>

            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <span class="font-['Work_Sans',sans-serif] font-semibold text-[11px] text-[#8A9490]">Read</span>
                    <span class="font-['Work_Sans',sans-serif] font-bold text-[11px] text-[#2FE432]">{{ $book['progress'] }}%</span>
                </div>
                <div class="w-full h-1.5 bg-[#E5EAE3] rounded-full overflow-hidden">
                    <div class="h-full bg-[#2FE432] rounded-full" style="width: {{ $book['progress'] }}%"></div>
                </div>
            </div>

            <button type="button"
               @if($book['slug']) onclick="openBookModal('{{ route('books.show', $book['slug']) }}?embed=1')" @endif
               class="w-full bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[13px] leading-[18.2px] tracking-normal py-2.5 rounded-full hover:bg-green-900 transition">
                Open Book
            </button>

        </div>
    </div>

    @endforeach
</div>
@endif

{{-- Book reader modal --}}
<div id="book-modal" class="hidden fixed inset-0 z-[999] bg-black/70 flex items-center justify-center p-4">
    <div class="relative w-full h-full max-w-5xl max-h-[90vh] bg-[#1B1C1C] rounded-2xl overflow-hidden">
        <button type="button" onclick="closeBookModal()"
            class="absolute top-3 right-3 z-10 w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-lg">
            &times;
        </button>
        <iframe id="book-modal-iframe" src="" class="w-full h-full border-0"></iframe>
    </div>
</div>

<script>
    function openBookModal(url) {
        document.getElementById('book-modal-iframe').src = url;
        document.getElementById('book-modal').classList.remove('hidden');
    }

    function closeBookModal() {
        document.getElementById('book-modal').classList.add('hidden');
        document.getElementById('book-modal-iframe').src = '';
    }
</script>

</div>
