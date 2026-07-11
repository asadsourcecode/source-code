@extends('layouts.app')

@section('title', 'Your Shopping Cart | ICE')

@section('content')
<div class="min-h-screen bg-white pt-8 pb-16">
    <div class="container mx-auto px-4 max-w-6xl">

        <h1 class="cart-page-title">Your Cart</h1>

        <div class="flex flex-col md:flex-row gap-8 mt-6">

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
            <div class="w-full md:w-[420px] flex-shrink-0">

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
                <p class="text-[11px] text-gray-500 text-center mb-2">We accept</p>
                <div class="flex flex-wrap gap-[6px] justify-center items-center">
                    @php $base = 'https://cdn.jsdelivr.net/gh/aaronfagan/svg-credit-card-payment-icons@main/flat/'; @endphp

                    {{-- 1. American Express --}}
                    <div class="payment-icon-wrap">
                        <img src="{{ $base }}amex.svg" alt="American Express" class="h-7 w-auto rounded-sm shadow-sm" onerror="this.closest('.payment-icon-wrap').style.display='none'">
                        <span class="payment-tooltip">American Express</span>
                    </div>

                    {{-- 2. Apple Pay --}}
                    <div class="payment-icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 30" class="h-7 w-auto rounded-sm shadow-sm">
                            <rect width="46" height="30" rx="4" fill="#000"/>
                            <g transform="translate(11,3)">
                                <svg viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="#fff" d="M2.15 4.318a42.16 42.16 0 0 0-.454.003c-.15.005-.303.013-.452.04a1.44 1.44 0 0 0-1.06.772c-.07.138-.114.278-.14.43-.028.148-.037.3-.04.45A10.2 10.2 0 0 0 0 6.222v11.557c0 .07.002.138.003.207.004.15.013.303.04.452.027.15.072.291.142.429a1.436 1.436 0 0 0 .63.63c.138.07.278.115.43.142.148.027.3.036.45.04l.208.003h20.194l.207-.003c.15-.004.303-.013.452-.04.15-.027.291-.071.428-.141a1.432 1.432 0 0 0 .631-.631c.07-.138.115-.278.141-.43.027-.148.036-.3.04-.45.002-.07.003-.138.003-.208l.001-.246V6.221c0-.07-.002-.138-.004-.207a2.995 2.995 0 0 0-.04-.452 1.446 1.446 0 0 0-1.2-1.201 3.022 3.022 0 0 0-.452-.04 10.448 10.448 0 0 0-.453-.003zm4.71 3.7c-.3.016-.668.199-.88.456-.191.22-.36.58-.316.918.338.03.675-.169.888-.418.205-.258.345-.603.308-.955zm2.207.42v5.493h.852v-1.877h1.18c1.078 0 1.835-.739 1.835-1.812 0-1.07-.742-1.805-1.808-1.805zm.852.719h.982c.739 0 1.161.396 1.161 1.089 0 .692-.422 1.092-1.164 1.092h-.979zm-3.154.3c-.45.01-.83.28-1.05.28-.235 0-.593-.264-.981-.257a1.446 1.446 0 0 0-1.23.747c-.527.908-.139 2.255.374 2.995.249.366.549.769.944.754.373-.014.52-.242.973-.242.454 0 .586.242.98.235.41-.007.667-.366.915-.733.286-.417.403-.82.41-.841-.007-.008-.79-.308-.797-1.209-.008-.754.615-1.113.644-1.135-.352-.52-.9-.578-1.09-.593zm8.204.397c-.99 0-1.606.533-1.652 1.256h.777c.072-.358.369-.586.845-.586.502 0 .803.266.803.711v.309l-1.097.064c-.951.054-1.488.484-1.488 1.184 0 .72.548 1.207 1.332 1.207.526 0 1.032-.281 1.264-.727h.019v.659h.788v-2.76c0-.803-.62-1.317-1.591-1.317zm1.94.072l1.446 4.009c0 .003-.073.24-.073.247-.125.41-.33.571-.711.571-.069 0-.206 0-.267-.015v.666c.06.011.267.019.335.019.83 0 1.226-.312 1.568-1.283l1.5-4.214h-.868l-1.012 3.259h-.015l-1.013-3.26zm-1.167 2.189v.316c0 .521-.45.917-1.024.917-.442 0-.731-.228-.731-.579 0-.342.278-.56.769-.593z"/>
                                </svg>
                            </g>
                        </svg>
                        <span class="payment-tooltip">Apple Pay</span>
                    </div>

                    {{-- 3. Diners Club --}}
                    <div class="payment-icon-wrap">
                        <img src="{{ $base }}diners.svg" alt="Diners Club" class="h-7 w-auto rounded-sm shadow-sm" onerror="this.closest('.payment-icon-wrap').style.display='none'">
                        <span class="payment-tooltip">Diners Club</span>
                    </div>

                    {{-- 4. Discover --}}
                    <div class="payment-icon-wrap">
                        <img src="{{ $base }}discover.svg" alt="Discover" class="h-7 w-auto rounded-sm shadow-sm" onerror="this.closest('.payment-icon-wrap').style.display='none'">
                        <span class="payment-tooltip">Discover</span>
                    </div>

                    {{-- 5. Google Pay --}}
                    <div class="payment-icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 30" class="h-7 w-auto rounded-sm shadow-sm">
                            <rect width="46" height="30" rx="4" fill="#fff" stroke="#E0E0E0" stroke-width="1"/>
                            <g transform="translate(11,3)">
                                <svg viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="#5F6368" d="M3.963 7.235A3.963 3.963 0 00.422 9.419a3.963 3.963 0 000 3.559 3.963 3.963 0 003.541 2.184c1.07 0 1.97-.352 2.627-.957.748-.69 1.18-1.71 1.18-2.916a4.722 4.722 0 00-.07-.806H3.964v1.526h2.14a1.835 1.835 0 01-.79 1.205c-.356.241-.814.379-1.35.379-1.034 0-1.911-.697-2.225-1.636a2.375 2.375 0 010-1.517c.314-.94 1.191-1.636 2.225-1.636a2.152 2.152 0 011.52.594l1.132-1.13a3.808 3.808 0 00-2.652-1.033zm6.501.55v6.9h.886V11.89h1.465c.603 0 1.11-.196 1.522-.588a1.911 1.911 0 00.635-1.464 1.92 1.92 0 00-.635-1.456 2.125 2.125 0 00-1.522-.598zm2.427.85a1.156 1.156 0 01.823.365 1.176 1.176 0 010 1.686 1.171 1.171 0 01-.877.357H11.35V8.635h1.487zm4.124 1.175c-.842 0-1.477.308-1.907.925l.781.491c.288-.417.68-.626 1.175-.626a1.255 1.255 0 01.856.323 1.009 1.009 0 01.366.785v.202c-.34-.193-.774-.289-1.3-.289-.617 0-1.11.145-1.479.434-.37.288-.554.677-.554 1.165a1.476 1.476 0 00.525 1.156c.35.308.785.463 1.305.463.61 0 1.098-.27 1.465-.81h.038v.655h.848v-2.909c0-.61-.19-1.09-.568-1.44-.38-.35-.896-.525-1.551-.525zm2.263.154l1.946 4.422-1.098 2.38h.915L24 9.963h-.965l-1.368 3.391h-.02l-1.406-3.39zm-2.146 2.368c.494 0 .88.11 1.156.33 0 .372-.147.696-.44.973a1.413 1.413 0 01-.997.414 1.081 1.081 0 01-.69-.232.708.708 0 01-.293-.578c0-.257.12-.47.363-.647.24-.173.54-.26.9-.26z"/>
                                </svg>
                            </g>
                        </svg>
                        <span class="payment-tooltip">Google Pay</span>
                    </div>

                    {{-- 6. Maestro --}}
                    <div class="payment-icon-wrap">
                        <img src="{{ $base }}maestro.svg" alt="Maestro" class="h-7 w-auto rounded-sm shadow-sm" onerror="this.closest('.payment-icon-wrap').style.display='none'">
                        <span class="payment-tooltip">Maestro</span>
                    </div>

                    {{-- 7. Mastercard --}}
                    <div class="payment-icon-wrap">
                        <img src="{{ $base }}mastercard.svg" alt="Mastercard" class="h-7 w-auto rounded-sm shadow-sm" onerror="this.closest('.payment-icon-wrap').style.display='none'">
                        <span class="payment-tooltip">Mastercard</span>
                    </div>

                    {{-- 8. Shop Pay --}}
                    <div class="payment-icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 30" class="h-7 w-auto rounded-sm shadow-sm">
                            <rect width="46" height="30" rx="4" fill="#5A31F4"/>
                            <g transform="translate(15,4) scale(0.75)">
                                <svg viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="#fff" d="M15.337 23.979l7.216-1.561s-2.604-17.613-2.625-17.73c-.018-.116-.114-.192-.211-.192s-1.929-.136-1.929-.136-1.275-1.274-1.439-1.411c-.045-.037-.075-.057-.121-.074l-.914 21.104h.023zM11.71 11.305s-.81-.424-1.774-.424c-1.447 0-1.504.906-1.504 1.141 0 1.232 3.24 1.715 3.24 4.629 0 2.295-1.44 3.76-3.406 3.76-2.354 0-3.54-1.465-3.54-1.465l.646-2.086s1.245 1.066 2.28 1.066c.675 0 .975-.545.975-.932 0-1.619-2.654-1.694-2.654-4.359-.034-2.237 1.571-4.416 4.827-4.416 1.257 0 1.875.361 1.875.361l-.945 2.715-.02.01zM11.17.83c.136 0 .271.038.405.135-.984.465-2.064 1.639-2.508 3.992-.656.213-1.293.405-1.889.578C7.697 3.75 8.951.84 11.17.84V.83zm1.235 2.949v.135c-.754.232-1.583.484-2.394.736.466-1.777 1.333-2.645 2.085-2.971.193.501.309 1.176.309 2.1zm.539-2.234c.694.074 1.141.867 1.429 1.755-.349.114-.735.231-1.158.366v-.252c0-.752-.096-1.371-.271-1.871v.002zm2.992 1.289c-.02 0-.06.021-.078.021s-.289.075-.714.21c-.423-1.233-1.176-2.37-2.508-2.37h-.115C12.135.209 11.669 0 11.265 0 8.159 0 6.675 3.877 6.21 5.846c-1.194.365-2.063.636-2.16.674-.675.213-.694.232-.772.87-.075.462-1.83 14.063-1.83 14.063L15.009 24l.927-21.166z"/>
                                </svg>
                            </g>
                        </svg>
                        <span class="payment-tooltip">Shop Pay</span>
                    </div>

                    {{-- 9. Union Pay --}}
                    <div class="payment-icon-wrap">
                        <img src="{{ $base }}unionpay.svg" alt="Union Pay" class="h-7 w-auto rounded-sm shadow-sm" onerror="this.closest('.payment-icon-wrap').style.display='none'">
                        <span class="payment-tooltip">Union Pay</span>
                    </div>

                    {{-- 10. Visa --}}
                    <div class="payment-icon-wrap">
                        <img src="{{ $base }}visa.svg" alt="Visa" class="h-7 w-auto rounded-sm shadow-sm" onerror="this.closest('.payment-icon-wrap').style.display='none'">
                        <span class="payment-tooltip">Visa</span>
                    </div>
                </div>

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
        alert('Checkout coming soon!');
    }

    renderCart();
</script>
@endsection
