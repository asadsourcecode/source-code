@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Contact Us') . ' | ICE')

@section('content')
<div style="background-color: #fff;">

{{-- Section 1: Globe background with Contact Us button --}}
<div class="relative">
    <img src="{{ asset('images/WhatsApp_Image_2024-10-21_at_17.35.56.webp') }}" class="w-full block" alt="">
    <div class="absolute inset-0 flex flex-col items-center justify-center px-4">
        <button class="font-['Raleway',sans-serif] font-extrabold bg-white text-black
            text-[14px] sm:text-[22px] md:text-[30px] lg:text-[36px]
            px-[24px] sm:px-[48px] md:px-[64px] lg:px-[80px]
            py-[8px] sm:py-[14px] md:py-[18px] lg:py-[22px]
            mt-5 sm:mt-0
            rounded-[10px]
            shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
            border-none [text-shadow:0px_2px_0px_#8A8C8E]
            whitespace-nowrap">
            Contact Us
        </button>

        <div class="mt-8 sm:mt-10 md:mt-12 lg:mt-10 text-center">
            <div class="flex items-center justify-center gap-2 sm:gap-3">
                <img src="{{ asset('images/icon-1.avif') }}" alt="" class="w-[18px] h-[18px] sm:w-[24px] sm:h-[24px] md:w-[30px] md:h-[30px] object-contain flex-shrink-0">
                <p class="text-[13px] sm:text-[20px] md:text-[26px] lg:text-[32px]"
                   style="font-family: 'Comic Sans MS', sans-serif; font-weight: normal; line-height: 1.2; margin: 0 0 10px 0; text-align: left;">
                   Email us at: info@characterbuilding.education
                </p>
            </div>
            <p class="text-[13px] sm:text-[20px] md:text-[26px] lg:text-[32px]"
               style="font-family: 'Comic Sans MS', sans-serif; font-weight: normal; line-height: 1.2; margin: 0 0 10px 0; margin-left: 20px; padding-left: 20px; text-align: start;">
               Or use the Form below:
            </p>
        </div>
    </div>
</div>

{{-- Section 2 + 3: Three columns + Form on same background --}}
<div class="contact-section-2-bg">

    {{-- Three info columns --}}
    <div class="py-8 md:py-12 px-4 sm:px-8 lg:px-16">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 lg:gap-10 w-full font-['Raleway',sans-serif]" style="color:#333;">

            {{-- Column 1: International customers --}}
            <div class="text-center">
                <p class="font-extrabold mb-3 text-[18px] lg:text-[22px]" style="font-family: 'Comic Sans MS', sans-serif; text-transform: inherit;">International customers</p>
                <div class="flex items-center gap-2 justify-center text-[16px] lg:text-[20px]">
                    <svg class="w-5 h-5 flex-shrink-0" style="color:#25D366;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        <path d="M11.998 0C5.374 0 0 5.373 0 11.998c0 2.117.554 4.103 1.522 5.825L.057 23.854a.75.75 0 00.92.92l6.04-1.465A11.945 11.945 0 0011.998 24C18.625 24 24 18.626 24 11.998 24 5.373 18.625 0 11.998 0zm0 21.818a9.82 9.82 0 01-5.002-1.367l-.36-.214-3.716.902.924-3.61-.234-.37a9.818 9.818 0 01-1.428-5.161c0-5.42 4.41-9.83 9.816-9.83 5.408 0 9.818 4.41 9.818 9.83 0 5.419-4.41 9.82-9.818 9.82z"/>
                    </svg>
                    <span><strong>0045 50106941</strong> (Only WhatsApp calls)</span>
                </div>
            </div>

            {{-- Column 2: Pakistan --}}
            <div class="leading-relaxed text-[16px] lg:text-[20px]">
                <p class="font-extrabold mb-3 text-[18px] lg:text-[22px]" style="font-family: 'Comic Sans MS', sans-serif; text-transform: inherit;">Pakistan</p>
                <p class="mb-5">Urdu course books available on printing on demand.</p>
                <p class="mb-5">Monday to Sunday: 5pm to 9 pm.</p>
                <p><span class="font-bold">Note:</span> For pakistani customers who are unable to check out with their credit cards, please contact your Banks to enable International Transactions</p>
            </div>

            {{-- Column 3: Urdu website --}}
            <div class="leading-relaxed text-[16px] lg:text-[20px]">
                <p class="font-extrabold mb-3 text-[18px] lg:text-[22px]" style="font-family: 'Comic Sans MS', sans-serif; text-transform: inherit;">Urdu website</p>
                <p class="mb-1">Urdu website to be launched soon.</p>
                <p class="mb-1">For inquiries about Urdu syllabus or purchase</p>
                <p>contact: <strong>0092 3158200834</strong> (for Pakistani Customers)</p>
            </div>

        </div>
    </div>

    {{-- Section 3: Form card --}}
    <div class="py-8 md:py-14 px-4 sm:px-8 md:px-10">
        <div class="relative flex items-start justify-center max-w-5xl mx-auto">

            <div class="relative w-full rounded-2xl contact-form-card-bg
                px-6 py-10
                sm:px-12 sm:py-16
                lg:px-20 lg:py-24
                xl:px-24 xl:py-28
                mb-8 md:mb-10">

                <p class="font-['Raleway',sans-serif] text-[14px] sm:text-[16px] md:text-[17px] text-white mb-6 leading-snug">
                    For questions and suggestions, please get in touch with us at:
                </p>

                <form action="{{ route('contact') }}" method="POST" class="space-y-3">
                    @csrf

                    <div class="contact-input-wrap">
                        <span class="contact-input-icon">
                            <svg class="w-[24px] h-[24px] text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                        <input type="text" name="name" placeholder="Name" required class="contact-input font-['Raleway',sans-serif]">
                    </div>

                    <div class="contact-input-wrap">
                        <span class="contact-input-icon">
                            <svg class="w-[24px] h-[24px] text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                        </span>
                        <input type="email" name="email" placeholder="Email" required class="contact-input font-['Raleway',sans-serif]">
                    </div>

                    <div class="contact-input-wrap">
                        <span class="contact-input-icon">
                            <svg class="w-[24px] h-[24px] text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                        <input type="text" name="subject" placeholder="Subject" class="contact-input font-['Raleway',sans-serif]">
                    </div>

                    <div class="contact-input-wrap" style="align-items: flex-start;">
                        <span class="contact-input-icon" style="margin-top: 13px;">
                            <img src="{{ asset('images/contact-pen-icon.png') }}" alt="" class="w-[24px] h-[24px] object-contain">
                        </span>
                        <textarea name="message" placeholder="Message" required rows="5" class="contact-input font-['Raleway',sans-serif] resize-none"></textarea>
                    </div>

                    <div class="pt-1">
                        <button type="submit" class="contact-submit-btn font-['Raleway',sans-serif] font-extrabold">
                            Submit
                        </button>
                    </div>

                </form>

                <img src="{{ asset('images/contact-pen-deco.png') }}" alt=""
                     class="hidden lg:block absolute bottom-20 right-6 w-[35px] xl:w-[42px] h-auto pointer-events-none">

            </div>

        </div>
    </div>

</div>{{-- end contact-section-2-bg --}}

</div>{{-- end white wrapper --}}

@endsection
