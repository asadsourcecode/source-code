<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Dummy checkout: marks the order paid immediately, no real payment gateway yet.
     * Swap the 'paid'/'paid_at' assignment for a real Stripe flow later.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'integer'],
            'items.*.quantity' => ['nullable', 'integer', 'min:1'],
            'items.*.type' => ['nullable', 'string'],
        ]);

        $products = Product::whereIn('id', collect($validated['items'])->pluck('product_id')->unique())
            ->where('status', true)
            ->get()
            ->keyBy('id');

        $lineItems = [];

        foreach ($validated['items'] as $item) {
            $product = $products->get($item['product_id']);

            if (! $product) {
                continue; // unknown or inactive product id — skip rather than fail the whole order
            }

            $lineItems[] = [
                'product_id' => $product->id,
                'product_title' => $product->title,
                'product_type' => $item['type'] ?? null,
                'price' => (float) ($product->sale_price ?: $product->price ?: 0),
                'quantity' => max(1, (int) ($item['quantity'] ?? 1)),
            ];
        }

        if (empty($lineItems)) {
            return response()->json(['message' => 'No valid items in cart.'], 422);
        }

        $order = DB::transaction(function () use ($lineItems, $request) {
            $order = $request->user()->orders()->create([
                'status' => 'paid',
                'total' => collect($lineItems)->sum(fn (array $item) => $item['price'] * $item['quantity']),
                'payment_method' => 'dummy',
                'paid_at' => now(),
            ]);

            foreach ($lineItems as $item) {
                $order->items()->create($item);
            }

            return $order;
        });

        $dashboardUrl = match ($request->user()->role) {
            'student' => route('student.dashboard'),
            'teacher' => route('teacher.dashboard'),
            default => route('account'),
        };

        return response()->json([
            'order_id' => $order->id,
            'dashboard_url' => $dashboardUrl,
        ]);
    }
}
