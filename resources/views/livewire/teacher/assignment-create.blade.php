<div class="p-6 max-w-2xl">

    <h1 class="font-['Montserrat',sans-serif] font-bold text-[24px] text-[#1B1C1C] mb-6">Create Assignment</h1>

    <form wire:submit="save" class="flex flex-col gap-4 bg-white border border-[#C0C9B94D] rounded-[16px] p-6">

        <div>
            <label class="block font-['Work_Sans',sans-serif] font-semibold text-[13px] text-[#40493D] mb-1">Book</label>
            <select wire:model="productId" class="w-full border border-[#C0C9B9] rounded-[8px] text-[14px] font-['Work_Sans',sans-serif] py-2 px-3">
                <option value="">Select a book…</option>
                @foreach ($books as $book)
                    <option value="{{ $book['id'] }}">{{ $book['title'] }}</option>
                @endforeach
            </select>
            @error('productId') <p class="text-red-600 text-[12px] mt-1">{{ $message }}</p> @enderror
            @if (empty($books))
                <p class="text-[12px] text-[#8A9490] mt-1">
                    None of your assigned students have purchased a book yet — build exercises from the dashboard once they have.
                </p>
            @endif
        </div>

        <div>
            <label class="block font-['Work_Sans',sans-serif] font-semibold text-[13px] text-[#40493D] mb-1">Title</label>
            <input type="text" wire:model="title" placeholder="e.g. Chapter 1 Reading Check"
                class="w-full border border-[#C0C9B9] rounded-[8px] text-[14px] font-['Work_Sans',sans-serif] py-2 px-3">
            @error('title') <p class="text-red-600 text-[12px] mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-['Work_Sans',sans-serif] font-semibold text-[13px] text-[#40493D] mb-1">Instructions (optional)</label>
            <textarea wire:model="instructions" rows="3"
                class="w-full border border-[#C0C9B9] rounded-[8px] text-[14px] font-['Work_Sans',sans-serif] py-2 px-3"></textarea>
        </div>

        <div>
            <label class="block font-['Work_Sans',sans-serif] font-semibold text-[13px] text-[#40493D] mb-2">Assign to</label>
            <div class="flex flex-col gap-1.5 max-h-[200px] overflow-y-auto border border-[#C0C9B94D] rounded-[8px] p-3">
                @forelse ($students as $student)
                <label class="flex items-center gap-2 text-[13px] font-['Work_Sans',sans-serif] text-[#1B1C1C]">
                    <input type="checkbox" wire:model="selectedStudentIds" value="{{ $student['id'] }}">
                    {{ $student['name'] }}
                </label>
                @empty
                <p class="text-[12px] text-[#8A9490]">No students assigned to you yet.</p>
                @endforelse
            </div>
            @error('selectedStudentIds') <p class="text-red-600 text-[12px] mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit"
            class="bg-[#216C22] text-white font-['Work_Sans',sans-serif] font-semibold text-[14px] py-2.5 rounded-full hover:bg-green-900 transition">
            Create & Assign
        </button>

    </form>

</div>
