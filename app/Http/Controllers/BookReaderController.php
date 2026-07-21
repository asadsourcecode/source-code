<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ReadingProgress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookReaderController extends Controller
{
    public function show(Request $request, Product $product): View
    {
        abort_unless($this->owns($request, $product), 403, 'You have not purchased this book.');
        abort_unless($product->pdf_conversion_status === 'ready', 404, 'This book is not available to read yet.');

        $totalPages = $product->pdfPages->count();

        abort_if($totalPages === 0, 404, 'This book has no pages yet.');

        $allowedPages = $product->allowedPagesFor($request->user());
        $pages = $product->pdfPages->take($allowedPages);

        $progress = ReadingProgress::firstOrCreate(
            ['user_id' => $request->user()->id, 'product_id' => $product->id],
            ['current_page' => 1],
        );

        $initialPage = min(max($progress->current_page, 1), max($allowedPages, 1));
        $embed = $request->boolean('embed');

        // A middle page is a more reliable size reference than page 1 — many books
        // have a differently-proportioned cover/title page that isn't representative
        // of the actual content pages making up the bulk of the book.
        $referencePage = $pages->get(intdiv($pages->count(), 2)) ?? $pages->first();
        $pageAspect = ($referencePage && $referencePage->width && $referencePage->height)
            ? $referencePage->width / $referencePage->height
            : 5 / 7;

        return view('pages.book-reader', compact('product', 'pages', 'initialPage', 'embed', 'allowedPages', 'totalPages', 'pageAspect'));
    }

    public function updateProgress(Request $request, Product $product): JsonResponse
    {
        abort_unless($this->owns($request, $product), 403);

        $validated = $request->validate([
            'page' => ['required', 'integer', 'min:1'],
        ]);

        $totalPages = max($product->pdf_page_count, 1);
        $allowedPages = max($product->allowedPagesFor($request->user()), 1);
        $page = min($validated['page'], $allowedPages);

        $progress = ReadingProgress::firstOrCreate(
            ['user_id' => $request->user()->id, 'product_id' => $product->id],
            ['current_page' => 1],
        );

        if ($page > $progress->current_page) {
            $progress->update(['current_page' => $page]);
        }

        return response()->json([
            'current_page' => $progress->current_page,
            'progress_percent' => (int) round(($progress->current_page / $totalPages) * 100),
        ]);
    }

    private function owns(Request $request, Product $product): bool
    {
        return $request->user()->orders()
            ->where('status', 'paid')
            ->whereHas('items', fn ($query) => $query->where('product_id', $product->id))
            ->exists();
    }
}
