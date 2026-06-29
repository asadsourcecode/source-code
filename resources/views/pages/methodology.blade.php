@extends('layouts.app')

@section('title', ($page->meta_title ?: $page->title) . ' | ICE')

@section('content')
    <div class="full section-start">
        <div class="section-block section-top-padding">
            <!-- bg-methodology Container -->
            <div class="bg-methodology !bg-cover !bg-center !bg-no-repeat rounded-[20px] px-[40px] py-[60px] mb-[30px] w-full" style="{{ $bgStyle }}">
                <!-- Methodology Button -->
                <div class="top-button text-center mb-5">
                    <button class="font-raleway-extrabold custom-btn page_Methodology methodology-btn-text-shadow
                           bg-white text-black
                           px-[58px] py-[22px]
                           text-[36px]
                           shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
                           rounded-[14px]
                           font-bold
                           leading-[1.2]
                           capitalize
                           border-none
                           cursor-pointer
                           hover:bg-gray-50
                           transition-all
                           duration-300">
                        {{ $page->title }}
                    </button>
                </div>

                <!-- Preface Section -->
                <div class="col-lg-12 mb-4 mb-sm-0 align-self- custom-blk-innertextraw_GmqBV6">
                    <div class="grid__item-inner grid__item-inner--innertextraw">
                        <div class="row justify-content-center align-items-center">
                            <div class="innerText col-10 col-sm-10 col-md-10 col-lg-8">
                                <div class="flex justify-center">
                                    <span class="child-heading" style="font-family: Poppins, sans-serif !important; font-size: 25px !important;">{{ $prefaceHeading }}</span>
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
            <div class="row">
                <div class="col-lg-12 mb-4 mb-sm-0 align-self- custom-blk-heading_with_button_PVQyMH">
                    <div class="grid__item-inner grid__item-inner--heading_with_button"></div>
                </div>

                <!-- Three Hypotheses Section -->
                <div class="col-lg-12 mb-4 mb-sm-0 align-self- custom-blk-customliquid_TdiRjT">
                    <div class="grid__item-inner grid__item-inner--customliquid">
                        <div class="metha_1 p-8" style="{{ $metha1Style }}">
                            <div class="custom_class container mx-auto">

                                @if($hypothesis1)
                                    <div class="font-comic-regular hypothesis-item" style="margin-top: 120px;">
                                        <span class="hypothesis-num" style="background-color: white !important; border-radius: 50%; padding: 6px 15px; opacity: .9; margin-left: -64px; margin-right: 17px;">1.</span><div class="hypothesis-body">{!! $hypothesis1 !!}</div>
                                    </div>
                                    <br><br>
                                @endif

                                @if($hypothesis2)
                                    <div class="font-comic-regular hypothesis-item">
                                        <span class="hypothesis-num" style="background-color: white !important; border-radius: 50%; padding: 6px 13px; opacity: .9; margin-left: -64px; margin-right: 17px;">2.</span><div class="hypothesis-body">{!! $hypothesis2 !!}</div>
                                    </div>
                                    <br><br>
                                @endif

                                @if($hypothesis3)
                                    <div class="font-comic-regular hypothesis-item">
                                        <span class="hypothesis-num" style="background-color: white !important; border-radius: 50%; padding: 6px 13px; opacity: .9; margin-left: -64px; margin-right: 17px;">3.</span><div class="hypothesis-body">{!! $hypothesis3 !!}</div>
                                    </div>
                                @endif

                                <p class="font-comic-regular" style="color:#626363;">{{ $hypothesesClose }}</p>
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

