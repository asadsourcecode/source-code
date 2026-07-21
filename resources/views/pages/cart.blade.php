@extends('layouts.app')

@section('title', 'Your Shopping Cart | ICE')

@section('content')
<div class="min-h-screen bg-white pt-8 pb-16">
    <div class="container mx-auto px-4 max-w-6xl">

        <h1 class="cart-page-title">Your Cart</h1>

        {{-- Checkout success banner (shown inline, no redirect) --}}
        <div id="checkout-success" class="hidden mt-6 rounded-xl border border-green-200 bg-green-50 px-6 py-4 flex items-center justify-between gap-4">
            <p class="text-[15px] text-green-800">
                <span class="font-bold">Purchase successful!</span> Your book has been added to your library.
            </p>
            <a id="checkout-success-link" href="#" class="cart-checkout-btn whitespace-nowrap">
                Go to My Books
            </a>
        </div>

        <div id="cart-content" class="flex flex-col md:flex-row gap-8 mt-6">

            {{-- LEFT: Cart Items --}}
            <div class="flex-1">

                {{-- Table Header --}}
                <div class="cart-table-header grid grid-cols-12 pb-3 mb-2 border-b border-gray-300">
                    <div class="col-span-6 cart-col-label">Product</div>
                    <div class="col-span-3 cart-col-label text-center">Quantity</div>
                    <div class="col-span-3 cart-col-label text-right">Total</div>
                </div>

                {{-- Cart Items (rendered by JS) --}}
                <div id="cart-items-container">
                    {{-- empty state --}}
                    <div id="cart-empty" class="py-16 text-center text-gray-400 text-[18px] font-['Comic_Sans_MS',sans-serif] hidden">
                        Your cart is empty.
                        <div class="mt-4">
                            <a href="{{ route('pricing') }}" class="text-blue-600 underline text-[16px]">Browse products</a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- RIGHT: Order Summary --}}
            <div class="cart-right w-full md:w-[420px] flex-shrink-0">

                <a href="{{ route('pricing') }}" class="cart-continue-btn block text-center mb-3">
                    Continue Shopping
                </a>

                <div class="bg-gray-01 rounded-xl p-8">

                {{-- Special Instructions --}}
                <div class="mb-4">
                    <label class="block mb-1 text-[14px] text-gray-500">Special instructions for seller</label>
                    <textarea rows="3" class="cart-textarea w-full" placeholder="Add a note..."></textarea>
                </div>
                    <div class="mt-3">
                        <p class="text-[14px] text-gray-500 font-semibold mb-3">List Coupon</p>
                        <p class="text-[14px] text-gray-500 mb-3"><span class="font-bold text-black">Pose</span> → 20% off all collections</p>
                        <p class="text-[14px] text-gray-500">Coupon code will work on checkout page</p>
                        <hr class="border-t border-gray-300 my-4">
                    </div>
                {{-- Coupon --}}
                <div class="mb-5">
                    <label class="cart-label block mb-1">Coupon</label>
                    <div class="flex gap-2">
                        <input type="text" id="coupon-input" placeholder="Coupon code" class="cart-coupon-input flex-1">
                        <button onclick="applyCoupon()" class="cart-save-btn">Save</button>
                    </div>

                </div>

                {{-- Note --}}
                <p class="text-[11px] text-gray-500 mb-4">
                    Note: Free Shipping calculated at checkout
                </p>

                {{-- Total --}}
                <div class="flex items-center justify-between mb-4">
                    <span class="cart-total-label">Total</span>
                    <span class="cart-total-value" id="cart-total">$0.00</span>
                </div>

                <button onclick="checkout()" class="cart-checkout-btn w-full">
                    Check Out
                </button>

                {{-- Payment Icons --}}
                <p class="text-[11px] text-gray-500 text-center mt-6 mb-2">We accept</p>
                <x-payment-icons />

                </div>{{-- end bg-gray-01 --}}
            </div>

        </div>

    </div>
</div>

<script>
    const CART_KEY = 'ice_cart';

    function getCart() {
        return JSON.parse(localStorage.getItem(CART_KEY) || '[]');
    }

    function saveCart(cart) {
        localStorage.setItem(CART_KEY, JSON.stringify(cart));
    }

    function formatPrice(num) {
        return '$' + parseFloat(num).toFixed(2);
    }

    function renderCart() {
        const cart = getCart();
        const container = document.getElementById('cart-items-container');
        const emptyEl   = document.getElementById('cart-empty');
        const totalEl   = document.getElementById('cart-total');

        // Remove old rows
        container.querySelectorAll('.cart-item-row').forEach(el => el.remove());

        if (cart.length === 0) {
            emptyEl.classList.remove('hidden');
            totalEl.textContent = '$0.00';
            return;
        }

        emptyEl.classList.add('hidden');

        let total = 0;

        cart.forEach((item, index) => {
            const lineTotal = item.price * item.qty;
            total += lineTotal;

            const row = document.createElement('div');
            row.className = 'cart-item-row grid grid-cols-12 gap-2 items-center py-4 border-b border-gray-100';
            row.innerHTML = `
                <div class="col-span-6 flex items-start gap-3">
                    <img src="${item.image}" alt="${item.title}" class="w-[60px] h-[72px] object-contain flex-shrink-0 rounded">
                    <div>
                        <p class="cart-item-title">${item.title}</p>
                        ${item.subtitle ? `<p class="cart-item-subtitle">${item.subtitle}</p>` : ''}
                        ${item.type ? `<p class="cart-item-type">${item.type}</p>` : ''}
                        <button onclick="removeItem(${index})" class="cart-remove-btn mt-1">Remove</button>
                    </div>
                </div>
                <div class="col-span-3 flex justify-center">
                    <div class="js-qty flex items-center justify-center border border-gray-400 rounded-[8px]">
                        <button onclick="changeQty(${index}, -1)" class="px-2 py-1 text-[16px] font-bold">−</button>
                        <span class="px-3 text-[14px] font-['Comic_Sans_MS',sans-serif] cart-qty-val">${item.qty}</span>
                        <button onclick="changeQty(${index}, 1)" class="px-2 py-1 text-[16px] font-bold">+</button>
                    </div>
                </div>
                <div class="col-span-3 text-right cart-item-price">${formatPrice(lineTotal)}</div>
            `;
            container.appendChild(row);
        });

        totalEl.textContent = formatPrice(total);
    }

    function removeItem(index) {
        let cart = getCart();
        cart.splice(index, 1);
        saveCart(cart);
        renderCart();
    }

    function changeQty(index, delta) {
        let cart = getCart();
        cart[index].qty = Math.max(1, cart[index].qty + delta);
        saveCart(cart);
        renderCart();
    }

    function applyCoupon() {
        const code = document.getElementById('coupon-input').value.trim();
        if (code) alert('Coupon "' + code + '" will be applied at checkout.');
    }

    function checkout() {
        const cart = getCart();
        if (cart.length === 0) {
            alert('Your cart is empty.');
            return;
        }

        fetch('{{ route('checkout') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({
                items: cart.map(item => ({
                    product_id: item.product_id,
                    quantity: item.qty,
                    type: item.type,
                })),
            }),
        })
        .then(async response => {
            if (response.status === 401) {
                window.location.href = '{{ route('login') }}';
                return;
            }

            const data = await response.json();

            if (!response.ok) {
                alert(data.message || 'Checkout failed. Please try again.');
                return;
            }

            saveCart([]);
            renderCart();

            document.getElementById('checkout-success-link').href = data.dashboard_url;
            document.getElementById('checkout-success').classList.remove('hidden');
            document.getElementById('checkout-success').scrollIntoView({ behavior: 'smooth', block: 'start' });
        })
        .catch(() => alert('Something went wrong. Please try again.'));
    }

    renderCart();
</script>
@endsection
