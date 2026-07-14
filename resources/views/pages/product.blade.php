@extends('layouts.app')

@section('title', ($product->meta_title ?: $product->title) . ' | ICE')

@section('content')

<div class="product-page-bg min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
        <div class="flex items-start mb-[70px]">

            {{-- Left: Product Image --}}
            <div class="w-5/12 p-4 relative" id="img-wrapper">
                <img src="{{ $product->imageUrl() }}" alt="{{ $product->title }}"
                     class="w-full object-contain h-[95vh] cursor-none" id="zoom-trigger">
                <div id="custom-cursor" class="product-cursor pointer-events-none fixed hidden items-center justify-center text-white font-bold text-xl">+</div>
            </div>

            {{-- Right: Product Info --}}
            <div class="w-7/12 p-4 flex items-start min-h-[95vh] pt-[160px]">
                <div>

                    {{-- Title + Subtitle --}}
                    <h1 itemprop="name" class="product-single__title">
                        {{ $product->title }}
                        @if($product->subtitle)
                        <span class="ages"> {{ $product->subtitle }}</span>
                        @endif
                    </h1>

                    {{-- Info Alert --}}
                    <div class="product-alert product-alert-info mb-4 text-[14px]">
                        <p>Learn more about eBooks and Hard Copies before choosing!</p>
                    </div>

                    {{-- eBook / Hardcopy Radio --}}
                    <div class="flex gap-3">
                        @if($ebookPrice)
                        <div class="single-option-radio">
                            <input type="radio" name="product-type" id="ebook"
                                   data-price="{{ $ebookPrice }}" checked>
                            <label for="ebook">eBook - 1 Year Subscription</label>
                        </div>
                        @endif
                        @if($hardcopyPrice)
                        <div class="single-option-radio">
                            <input type="radio" name="product-type" id="hardcopy"
                                   data-price="{{ $hardcopyPrice }}" {{ !$ebookPrice ? 'checked' : '' }}>
                            <label for="hardcopy">Hardcopy</label>
                        </div>
                        @endif
                    </div>

                    {{-- Price --}}
                    @if($defaultPrice)
                    <div class="mt-6 flex items-center gap-3">
                        @if($originalPrice ?? null)
                        <span class="product-original-price">${{ $originalPrice }}</span>
                        @endif
                        <div class="product-single__price" id="product-price">${{ $defaultPrice }}</div>
                    </div>
                    @endif

                    {{-- Pages --}}
                    @if($product->pages)
                    <p class="font-comic-bolds mt-3">Pages: {{ $product->pages }}</p>
                    @endif

                    {{-- Description --}}
                    @if($product->description)
                    <div class="shortdescription mt-3">
                        {!! $product->description !!}
                    </div>
                    @endif

                    {{-- Quantity --}}
                    <div class="productqqty product-form__item product-form__item--quantity mb-2 mt-3">
                        <p class="text-black mb-2 font-black text-[20px]">Quantity</p>
                        <div class="js-qty">
                            <button type="button" class="js-qty__adjust js-qty__adjust--minus" aria-label="Reduce item quantity by one">
                                <x-icon-minus />
                                <span class="icon__fallback-text">−</span>
                            </button>
                            <input type="text" value="1" id="Quantity" name="quantity" pattern="[0-9]*" data-line="" class="js-qty__input" aria-live="polite">
                            <button type="button" class="js-qty__adjust js-qty__adjust--plus" aria-label="Increase item quantity by one">
                                <x-icon-plus />
                                <span class="icon__fallback-text">+</span>
                            </button>
                        </div>
                    </div>

                    {{-- Add to Cart --}}
                    <button type="button" id="add-to-cart-btn"
                        class="addtocart_cus_coming product-form__cart-submit btn-theme"
                        data-title="{{ $product->title }}"
                        data-subtitle="{{ $product->subtitle }}"
                        data-image="{{ $product->imageUrl() }}"
                        data-price="{{ $defaultPrice }}"
                        data-ebook-price="{{ $ebookPrice }}"
                        data-hardcopy-price="{{ $hardcopyPrice }}">
                        Add to Cart
                    </button>

                    {{-- Textbook Icon + Label --}}
                    <div class="mt-3 flex items-center ml-1">
                        <x-textbook-icon />
                        <div class="icontextsd flex items-center gap-2 ml-5">
                            <span class="text-[#0066cc] uppercase font-bold">TEXTBOOK</span>
                            <span class="text-black">(To be purchased for students)</span>
                        </div>
                    </div>

                    {{-- Truck Icon + Delivery --}}
                    <div class="mt-2 flex items-center ml-1">
                        <x-truck-icon />
                        <div class="icontextsd ml-5">
                            <span class="text-black">Delivery time: One week</span>
                        </div>
                    </div>

                    {{-- Sample Lesson Button --}}
                    @if($product->sample_pdf)
                    <a href="{{ $product->sample_pdf }}" target="_blank" class="sample-lesson-btn-key mt-[60px] mb-[100px]">
                        Sample lesson {{ $product->title }}
                    </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Lightbox --}}
<div id="lightbox" class="product-lightbox fixed inset-0 hidden items-center justify-center z-[9999]">
    <button id="lightbox-close" class="absolute top-5 right-7 text-white text-4xl font-bold leading-none">&times;</button>
    <img id="lightbox-img" src="" alt="" class="h-[90vh] w-[90vw] object-contain">
</div>

<script>
    // Image zoom cursor
    const img = document.getElementById('zoom-trigger');
    const cursor = document.getElementById('custom-cursor');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const closeBtn = document.getElementById('lightbox-close');

    img.addEventListener('mouseenter', () => cursor.classList.replace('hidden', 'flex'));
    img.addEventListener('mouseleave', () => cursor.classList.replace('flex', 'hidden'));
    img.addEventListener('mousemove', (e) => {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
    });
    img.addEventListener('click', () => {
        lightboxImg.src = img.src;
        lightbox.classList.replace('hidden', 'flex');
        document.body.style.overflow = 'hidden';
    });

    function closeLightbox() {
        lightbox.classList.replace('flex', 'hidden');
        document.body.style.overflow = '';
    }
    closeBtn.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', (e) => { if (e.target === lightbox) closeLightbox(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeLightbox(); });

    // Dynamic price on radio change
    const radios = document.querySelectorAll('input[name="product-type"]');
    const priceEl = document.getElementById('product-price');
    radios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (priceEl && radio.dataset.price) {
                priceEl.textContent = '$' + radio.dataset.price;
            }
        });
    });

    // Quantity +/-
    document.querySelectorAll('.js-qty__adjust').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.closest('.js-qty').querySelector('.js-qty__input');
            let val = parseInt(input.value) || 1;
            if (btn.classList.contains('js-qty__adjust--plus')) val++;
            else if (val > 1) val--;
            input.value = val;
        });
    });

    // Add to Cart
    document.getElementById('add-to-cart-btn').addEventListener('click', function () {
        const btn       = this;
        const qtyInput  = document.querySelector('.js-qty__input');
        const qty       = qtyInput ? parseInt(qtyInput.value) || 1 : 1;
        const checkedRadio = document.querySelector('input[name="product-type"]:checked');
        const type      = checkedRadio ? checkedRadio.nextElementSibling.textContent.trim() : '';
        const price     = document.getElementById('product-price')
                            ? document.getElementById('product-price').textContent.replace('$','').trim()
                            : btn.dataset.price;

        const item = {
            id:       Date.now(),
            title:    btn.dataset.title,
            subtitle: btn.dataset.subtitle,
            image:    btn.dataset.image,
            type:     type,
            price:    parseFloat(price),
            qty:      qty,
        };

        let cart = JSON.parse(localStorage.getItem('ice_cart') || '[]');
        const existing = cart.find(i => i.title === item.title && i.type === item.type);
        if (existing) {
            existing.qty += item.qty;
        } else {
            cart.push(item);
        }
        localStorage.setItem('ice_cart', JSON.stringify(cart));
        window.location.href = '{{ route("cart") }}';
    });
</script>
@endsection
