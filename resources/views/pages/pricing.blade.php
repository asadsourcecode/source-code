@extends('layouts.app')

@section('title', 'Pricing | ICE')

@section('body-bg', 'bg-white')

@section('content')
<div class="pricing-bg min-h-screen">

    {{-- Title --}}
    <div class="text-center px-2 pt-16 pb-10 sm:px-4 sm:pt-20 sm:pb-12 md:px-6 md:pt-24 md:pb-14">
        <button class="font-raleway-extrabold custom-btn">Pricing</button>
    </div>

    @foreach($sections as $section)
    @php $products = $section->paginatedProducts; @endphp
    {{-- TEMP DEBUG --}}
{{--    @php dd(['section' => $section->toArray(), 'products' => $products->toArray()]); @endphp--}}

    {{-- ─── Rows-style section ─── --}}
    @if($section->layout === 'rows')
    <div class="mx-4 sm:mx-12 md:mx-24 lg:mx-40 pt-10 pb-8 px-4 sm:px-6 rounded-xl mb-6"
         style="background-color: {{ $section->bg_color }};">

        {{-- Section heading: stacks on mobile, 3-col on desktop --}}
        <div class="flex flex-col md:grid md:grid-cols-12 gap-6">

            {{-- Section image — always shown in left column --}}
            <div class="md:col-span-3 flex justify-center p-[15px]">
                @if($section->image)
                <div class="box-image">
                    <img src="{{ asset('admin-storage/' . $section->image) }}"
                         alt="{{ $section->title }}"
                         class="w-full h-full object-contain block{{ $section->is_available ? '' : ' opacity-[0.55]' }}">
                </div>
                @endif
            </div>

            {{-- Title + description --}}
            <div class="md:col-span-6 min-w-0 flex flex-col justify-center py-4 md:pr-4">
                <h2 class="font-['Raleway',sans-serif] text-[24px] sm:text-[28px] md:text-[32px] font-bold text-black text-center mb-3">{{ $section->title }}</h2>

                @if(!$section->is_available)
                <div class="flex justify-center mb-[14px]">
                    <span class="not-available-badge text-[12px] py-[5px] px-[16px]">
                        {{ $section->unavailable_text }}
                    </span>
                </div>
                @endif

                @if($section->description)
                <p class="font-['Raleway',sans-serif] text-[14px] sm:text-[15px] font-normal leading-[1.6] text-[#374151] mt-4">
                    {{ $section->description }}
                </p>
                @endif

                @if($products->total() > 0)
                <div class="pt-[30px] flex items-center gap-3">
                    <div class="flex-1 h-px bg-black {{ $section->is_available ? 'opacity-40' : 'opacity-30' }}"></div>
                    @if($section->is_available)
                    <a href="#section-{{ $section->id }}-items"
                       class="font-['Raleway',sans-serif] text-[13px] font-normal text-black underline whitespace-nowrap">
                        {{ $section->separator_text }}
                    </a>
                    @else
                    <span class="font-['Raleway',sans-serif] text-[13px] font-normal text-[#888] whitespace-nowrap">
                        Individual Items
                    </span>
                    @endif
                    <div class="flex-1 h-px bg-black {{ $section->is_available ? 'opacity-40' : 'opacity-30' }}"></div>
                </div>
                @endif
            </div>

            {{-- Section-level Price / CTA --}}
            <div class="md:col-span-3 md:-mt-[30px] flex flex-col items-center justify-center py-4 px-4 gap-3">
                @if($section->is_available)
                    @if($section->price)
                    @php
                        $secSale = $section->sale_price && (float)$section->sale_price < (float)$section->price;
                        $discountPct = $secSale
                            ? round((1 - (float)$section->sale_price / (float)$section->price) * 100)
                            : 0;
                    @endphp
                    @if($secSale && $discountPct > 0)
                    <span class="discount-badge">{{ $discountPct }}% OFF</span>
                    @endif
                    <div class="flex flex-col items-center gap-1 mb-2">
                        @if($secSale)
                        <span class="font-['Raleway',sans-serif] text-[20px] font-bold text-[#e53e3e] line-through leading-none">
                            ${{ number_format($section->price, 0) }}
                        </span>
                        @endif
                        <span class="font-['Raleway',sans-serif] text-[36px] font-bold text-black leading-none">
                            ${{ number_format($secSale ? $section->sale_price : $section->price, 0) }}
                        </span>
                    </div>
                    <a href="{{ $section->btn_url ?: '#' }}" class="buy-price-btn-cus">{{ $section->buy_btn_text }}</a>
                    @endif
                @else
                <p class="font-['Raleway',sans-serif] text-[14px] font-bold text-[#e53e3e] text-center m-0">
                    {{ $section->unavailable_text }}
                </p>
                <span class="buy-price-btn-sec">{{ $section->coming_soon_text }}</span>
                @endif
            </div>

        </div>

        {{-- Individual product rows --}}
        @if($products->total() > 0)
        <div id="section-{{ $section->id }}-items" class="mt-8 border-t border-black/10 pt-6">
            @foreach($products->getCollection()->chunk(2) as $pair)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-3 px-2 md:pl-4 md:pr-10">
                @foreach($pair as $item)
                <div class="col-span-1">
                    <div class="grid grid-cols-12 gap-2 items-center rounded-xl p-3">
                        <div class="col-span-2 flex items-center justify-center">
                            <div class="sec-block-img">
                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}"
                                     class="w-full h-full object-contain">
                            </div>
                        </div>
                        <div class="col-span-6 flex flex-col justify-center">
                            <p class="font-['Raleway',sans-serif] text-[14px] sm:text-[15px] font-semibold text-black m-0 break-words">{{ $item->title }}</p>
                            @if($item->display_price > 0)
                            <p class="font-['Raleway',sans-serif] text-[16px] sm:text-[18px] font-bold text-black mt-1">${{ number_format($item->display_price, 0) }}</p>
                            @endif
                        </div>
                        <div class="col-span-4 flex items-center justify-end">
                            @if($item->available)
                            <a href="{{ route('product.show', $item->slug) }}" class="buy-price-btn-sec">{{ $item->btn_label ?: $section->buy_btn_text }}</a>
                            @elseif($item->stock <= 0 && $item->status)
                            <span class="buy-price-btn-sec">{{ $section->coming_soon_text }}</span>
                            @else
                            <span class="not-available-badge text-[11px] py-[4px] px-[12px]">{{ $section->unavailable_text }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach

            {{-- Pagination for this section --}}
            @if($products->hasPages())
            <div class="flex justify-end mt-4 pb-2 pr-2 md:pr-10 text-sm">
                {{ $products->links() }}
            </div>
            @endif
        </div>
        @endif

    </div>

    {{-- ─── Grid-style section ─── --}}
    @else
    <div class="mx-4 sm:mx-10 md:mx-20 lg:mx-32 pt-10 pb-10 px-4 sm:px-6 mb-6 rounded-xl"
         style="background-color: {{ $section->bg_color }};">

        <h2 class="font-['Raleway',sans-serif] text-center text-[24px] sm:text-[28px] md:text-[32px] font-bold text-black mb-4">{{ $section->title }}</h2>

        @if($section->description)
        <p class="text-center font-['Raleway',sans-serif] text-[14px] sm:text-[15px] font-normal text-[#374151] mb-[40px]">
            {{ $section->description }}
        </p>
        @endif

        @if($products->total() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $item)
            <div class="rounded-2xl overflow-hidden shadow-[0_2px_12px_rgba(0,0,0,0.08)]">
                <div class="h-[200px] bg-white flex items-center justify-center overflow-hidden p-4">
                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-contain block">
                </div>
                <div class="px-5 pt-5 pb-6 text-left" style="background-color: {{ $section->bg_color }};">
                    <p class="font-['Raleway',sans-serif] text-[15px] sm:text-[16px] font-bold text-black uppercase leading-[1.3] mb-[10px]">
                        {{ $item->title }}
                    </p>
                    @if($item->short_desc)
                    <p class="font-['Raleway',sans-serif] text-[12px] sm:text-[13px] font-normal text-[#374151] leading-[1.6] mb-[18px]">
                        {{ $item->short_desc }}
                    </p>
                    @endif
                    @if($item->available)
                    <a href="{{ route('product.show', $item->slug) }}" class="buy-price-btn-cus">{{ $item->btn_label ?: $section->buy_btn_text }}</a>
                    @elseif($item->stock <= 0 && $item->status)
                    <span class="buy-price-btn-sec">{{ $section->coming_soon_text }}</span>
                    @else
                    <span class="not-available-badge">{{ $section->unavailable_text }}</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination for this section --}}
        @if($products->hasPages())
        <div class="flex justify-end mt-6 text-sm">
            {{ $products->links() }}
        </div>
        @endif
        @endif

    </div>
    @endif

    @endforeach

    {{-- Big Orders Banner --}}
    <div class="mx-4 sm:mx-10 md:mx-20 lg:mx-32 rounded-xl mb-8 overflow-hidden">
        <div class="py-8 px-4 sm:px-8 text-center">
            <h1 class="font-['Raleway',sans-serif] text-[22px] sm:text-[28px] md:text-[32px] lg:text-[36px] font-bold text-black mb-[6px]">
                For big orders above 30kg, contact<br>customer service
            </h1>
            <p class="font-['Raleway',sans-serif] text-[13px] sm:text-[14px] font-normal text-[#374151] pb-[70px]">
                Please Convert USD price into the required currency.
            </p>
        </div>
    </div>

</div>
@endsection
