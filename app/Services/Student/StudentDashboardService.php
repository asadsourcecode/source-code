<?php

namespace App\Services\Student;

use App\Models\ReadingProgress;
use Illuminate\Support\Facades\Auth;

class StudentDashboardService
{
    private const STATIC_BOOKS = [
        ['title' => 'Astrophysics For Everyone', 'image' => 'book1.webp', 'type' => 'Ebook', 'progress' => 65],
        ['title' => 'The Art Of Storytelling',    'image' => 'book2.webp', 'type' => 'Ebook', 'progress' => 40],
        ['title' => 'Culinary Delights',          'image' => 'book3.webp', 'type' => 'Ebook', 'progress' => 80],
        ['title' => 'Character Building',         'image' => 'book4.webp', 'type' => 'Ebook', 'progress' => 25],
    ];

    public function getData(): array
    {
        $user = Auth::user();

        if (! $user) {
            return ['books' => $this->staticBooks()];
        }

        $progressByProduct = ReadingProgress::where('user_id', $user->id)
            ->get()
            ->keyBy('product_id');

        $books = $user->orders()
            ->where('status', 'paid')
            ->with('items.product')
            ->latest()
            ->get()
            ->flatMap(fn ($order) => $order->items)
            ->unique('product_id')
            ->map(function ($item) use ($progressByProduct) {
                $product = $item->product;
                $totalPages = $product?->pdf_page_count ?: 0;
                $currentPage = $progressByProduct->get($item->product_id)?->current_page ?? 0;

                return [
                    'title' => $item->product_title,
                    'image' => $product?->imageUrl() ?? asset('images/book1.webp'),
                    'type' => $item->product_type,
                    'purchased_at' => $item->created_at->format('M j, Y'),
                    'slug' => $product?->slug,
                    'progress' => $totalPages > 0 ? (int) round(min($currentPage / $totalPages, 1) * 100) : 0,
                ];
            })
            ->values()
            ->all();

        return ['books' => $books ?: $this->staticBooks()];
    }

    // Placeholder catalog shown until a student has any real purchases to display.
    private function staticBooks(): array
    {
        return array_map(fn (array $book) => [
            ...$book,
            'image' => asset('images/' . $book['image']),
            'purchased_at' => null,
            'slug' => null,
        ], self::STATIC_BOOKS);
    }
}
