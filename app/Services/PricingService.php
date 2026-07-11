<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductSection;
use Illuminate\Support\Str;

class PricingService
{
    public function getData(bool $preview = false): array
    {
        $query = ProductSection::orderBy('sort_order');

        if (! $preview) {
            $query->where('is_published', true);
        }

        $sections = $query->get()
            ->map(function ($section) {
                $pageKey = 's' . $section->id;
                $paginator = $section->products()
                    ->where('status', true)
                    ->orderBy('id')
                    ->paginate(10, ['*'], $pageKey);
                $paginator->getCollection()->transform(fn($p) => $this->prepareProduct($p));
                $section->paginatedProducts = $paginator;
                return $section;
            })
            ->values();

        return compact('sections');
    }

    private function prepareProduct(Product $product): Product
    {
        $product->image_url  = $product->imageUrl();
        $product->short_desc = $product->description
            ? Str::limit(strip_tags($product->description), 160)
            : null;

        $price     = (float) $product->price;
        $salePrice = (float) $product->sale_price;
        $hasSale   = $product->sale_price && $salePrice > 0 && $salePrice < $price;

        $product->has_sale      = $hasSale;
        $product->display_price = $hasSale ? $salePrice : $price;
        $product->orig_price    = $hasSale ? $price : null;

        $product->available = (bool) $product->status
            && ($product->stock > 0 || (bool) $product->allow_oversell);

        return $product;
    }
}
