<?php

namespace App\Http\Controllers;

use App\Models\ProductPage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BookPageImageController extends Controller
{
    public function show(Request $request, ProductPage $page): BinaryFileResponse
    {
        $product = $page->product;

        abort_unless($product->canViewPage($request->user(), $page->page_number), 403);

        $absolutePath = rtrim(config('services.characterbuilding.storage_path'), '/\\')
            .DIRECTORY_SEPARATOR.str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $page->image_path);

        abort_unless(is_file($absolutePath), 404);

        return response()->file($absolutePath, ['Content-Type' => 'image/png']);
    }
}
