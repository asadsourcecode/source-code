@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | ICE')

@section('content')
    <div class="full section-start bg-white">
        <div class="section-block section-top-padding">
            <!-- bg-methodology Container -->
            <div class="bg-methodology !bg-cover !bg-center !bg-no-repeat px-[16px] sm:px-[28px] md:px-[40px] py-[30px] sm:py-[45px] md:py-[60px] w-full" style="{{ $bgStyle }}">
                <!-- Methodology Button -->
                <div class="top-button text-center mb-5">
                    <button class="font-raleway-extrabold custom-btn page_Methodology methodology-btn-text-shadow
                           bg-white text-black
                           px-[16px] sm:px-[28px] md:px-[40px] lg:px-[58px]
                           py-[10px] sm:py-[14px] md:py-[18px] lg:py-[22px]
                           text-[16px] sm:text-[22px] md:text-[28px] lg:text-[36px]
                           shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
                           rounded-[8px] sm:rounded-[10px] md:rounded-[14px]
                           font-bold
                           leading-[1.2]
                           capitalize
                           border-none
                           cursor-pointer
                           hover:bg-gray-50
                           transition-all
                           duration-300
                           break-words whitespace-normal max-w-full">
                        {{ $page->title }}
                    </button>
                </div>

                <!-- Preface Section -->
                <div class="col-lg-12 mb-4 mb-sm-0 align-self- custom-blk-innertextraw_GmqBV6">
                    <div class="grid__item-inner grid__item-inner--innertextraw">
                        <div class="flex justify-center">
                            <div class="w-full sm:w-10/12 lg:w-8/12">
                                <div class="flex justify-center">
                                    <span class="child-heading methodology-heading font-['Poppins',sans-serif]">{{ $prefaceHeading }}</span>
                                </div>
                                <div class="text1raw">
                                    <p>{{ $prefaceSubtext }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hidden Images Section -->
            <div class="custom-image-div w-100 hidden">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <img src="https://cdn.shopify.com/s/files/1/0613/9661/5233/files/home.png?v=1725521090" alt="Chairs" class="image-tag-homeschooling hidden">
                        <img src="https://cdn.shopify.com/s/files/1/0613/9661/5233/files/book_2.jpg?v=1725538933c" alt="Chairs" class="image-tag-aboutus hidden">
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="row m-0 p-0">
                <!-- Three Hypotheses Section -->
                <div class="col-lg-12 m-0 p-0 custom-blk-customliquid_TdiRjT">
                    <div class="grid__item-inner grid__item-inner--customliquid">
                        <div class="metha_1 p-8 relative overflow-hidden" @if($metha1Image) style="background-image: none;" @endif>
                            @if($metha1Image)
                                <img src="{{ $metha1Image }}" class="absolute inset-0 w-full h-full object-cover" alt="" aria-hidden="true">
                            @endif
                            <div class="custom_class container mx-auto relative z-10">

                                @foreach($hypotheses as $hypothesis)
                                    <div class="font-comic-regular hypothesis-item {{ $loop->first ? 'mt-[120px]' : 'mt-6' }}">
                                        <span class="hypothesis-num bg-white rounded-full py-[6px] px-[15px] opacity-90 mr-[17px]">{{ $loop->iteration }}.</span>
                                        <div class="hypothesis-body">{!! $hypothesis !!}</div>
                                    </div>
                                @endforeach

                                <p class="font-comic-regular text-[#626363]">{{ $hypothesesClose }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Block 1 -->
                <div class="col-lg-12 mb-4 mb-sm-0 align-self-auto custom-blk-image_Y3wibb">
                    <div class="grid__item-inner grid__item-inner--image">
                        <div class="aos-init aos-animate" data-aos="" data-aos-delay="800">
                            <div class="block-image image-content__image-container block-image-image_Y3wibb">
                                <div class="d-block image-content__image-wrapper">
                                    <img src="{{ $image1 }}" alt="Course illustration" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Objective Section -->
                <div class="col-lg-12 mb-4 mb-sm-0 align-self- custom-blk-innertextraw_TdYQ8r">
                    <div class="grid__item-inner grid__item-inner--innertextraw">
                        <div class="flex justify-center max-w-[1000px] mx-auto py-10 px-5">
                            <p class="text-center text-2xl leading-[1.4] pb-3 font-['Comic_Sans_MS',sans-serif] font-normal">
                                {{ $objectiveText }}
                                <span class="font-bold text-[#636466]">
                                    {{ $objectiveHighlight }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Image Block 2 -->
                <div class="col-lg-12 mb-4 mb-sm-0 align-self-center custom-blk-image_fzpWXN pb-[106px]">
                    <div class="grid__item-inner grid__item-inner--image">
                        <div class="aos-init aos-animate" data-aos="" data-aos-delay="1200">
                            <div class="block-image image-content__image-container block-image-image_fzpWXN">
                                <div class="d-block image-content__image-wrapper">
                                    <img src="{{ $image2 }}" alt="Course illustration" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

