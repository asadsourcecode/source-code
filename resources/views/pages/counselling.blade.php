@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Counselling') . ' | ICE')

@section('content')

<div style="background-color: white; display: flex; flex-direction: column; gap: 0;">

{{-- Section 1: Bulb background with Counselling title --}}
<div style="position: relative; display: block; margin: 0; line-height: 0;">
    <img src="{{ asset('images/bulb-3.webp') }}" alt="" style="width: 100%; display: block; min-height: 200px; object-fit: fill;">
    <div style="position: absolute; top: 40px; left: 0; right: 0; display: flex; justify-content: center; padding: 0 12px;">
        <button class="font-['Raleway',sans-serif] font-extrabold bg-white text-black
            text-[18px] sm:text-[24px] md:text-[28px] lg:text-[32px]
            px-[14px] sm:px-[28px] md:px-[40px] lg:px-[58px]
            py-[8px] sm:py-[12px] md:py-[16px] lg:py-[22px]
            rounded-[8px] sm:rounded-[10px] md:rounded-[14px]
            shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
            border-none capitalize leading-[1.2]
            [text-shadow:0px_2px_0px_#8A8C8E]
            whitespace-nowrap">
            Counselling
        </button>
    </div>
</div>

{{-- Section 2: List of credentials --}}
<div style="background-image: url('{{ asset('images/conselling_1_small.webp') }}'); background-size: 100% 100%; background-position: center; background-repeat: no-repeat; min-height: 400px; display: block; margin: 0;">

    <div class="counseling text1raw font-comic-regular flex flex-col items-center pb-8 sm:pb-10 px-4 sm:px-8 md:px-12" style="padding-top: 0;">

        <ul class="space-y-3 sm:space-y-4 w-full max-w-3xl" style="list-style: none; padding: 0; padding-left: 4px; margin: 0;">
            @foreach([
                'Educational Psychologist from the Danish University of Education with a major in Psychological Counselling and an international diploma in Logotherapy and Existentialistic Analysis.',
                'Sofia Adeem is an accredited member of the International Association of Logotherapy and Existentialistic Analysis.',
                'Counselling Psychologist with over 20 years of experience dealing with the Muslim community.',
                'Therapist. Focus on helping women, children, and youngsters develop better emotional skills and confidence in problem-solving.',
                'Faith-based therapy. Guidance on coping with issues and challenges of life in coherence with Islamic guidelines and help of faith.',
                'Consultancy in children\'s systematic development and training (tarbiyyah) using favourable pedagogical approaches.',
                'Author of Character Building school course for Muslims in English and Urdu. Logotherapy and existential analysis for people of any faith or those seeking to connect with the core of their spirituality.',
            ] as $item)
            <li style="display: flex; align-items: flex-start; gap: 4px;">
                <span style="flex-shrink: 0; width: 14px; height: 14px; border-radius: 50%; border: 1px solid #555; background: #fff; display: inline-block; margin-top: 8px;"></span>
                <p style="margin: 0; flex: 1; padding-left: 5px;" class="text-[14px] sm:text-[16px] md:text-[18px] lg:text-[20px]">{{ $item }}</p>
            </li>
            @endforeach
        </ul>

        <div class="mt-6 sm:mt-10 w-full flex justify-center">
            <img src="{{ asset('images/BUTTON_1.avif') }}" alt="" class="max-w-[80%] sm:max-w-full h-auto">
        </div>

        <div class="mt-4 sm:mt-6 w-full flex justify-center">
            <img src="{{ asset('images/Man.webp') }}" alt="" class="max-w-[80%] sm:max-w-full h-auto">
        </div>

    </div>

</div>

{{-- Section 3: Sometimes quote --}}
<div class="counselling-sometimes-white-bg" style="background-color: white;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-[16px] sm:text-[18px] md:text-[20px] lg:text-[24px]"
           style="font-family: 'Comic Sans MS', sans-serif; font-weight: bold; text-align: start; margin: 0; margin-left: 20px;">
            Sometimes, being let down by a human being is the direct cause of you finding your own strength and depending only on Allah.
        </p>
    </div>
</div>

{{-- Section 4: Life-does background with two-column row --}}
<div style="background-image: url('{{ asset('images/conselling_1_small.webp') }}'); background-size: 100% 100%; background-position: center; background-repeat: no-repeat; display: block; margin: 0; padding: 40px 16px 100px 16px;">

    {{-- Life-does image centered --}}
    <div style="display: flex; justify-content: center; margin-bottom: 30px;">
        <img src="{{ asset('images/Life-does.webp') }}" alt="" style="max-width: 100%; height: auto; display: block;">
    </div>

    {{-- Two column row --}}
    <div class="left-image-text-section max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">

            {{-- Column 1: 3/12 on md+, full width on mobile --}}
            <div class="md:col-span-3 flex justify-center items-center">
                <img src="{{ asset('images/icon_medium.avif') }}" alt="" class="w-[60%] md:w-full h-auto block">
            </div>

            {{-- Column 2: 9/12 on md+, full width on mobile --}}
            <div class="md:col-span-9">
                <p class="font-con font-comic-bold text-[14px] sm:text-[16px] md:text-[18px] lg:text-[20px]"
                   style="color: #215083; text-align: justify; line-height: 1.5; margin-bottom: 20px;">
                    The number one rule of successful psychological therapy is that you can only help the ones who want to help themselves. Practically it means that unless the client wants to be helped, change and restore mental health, no one can change him/her. Therapists are there to listen, support, mirror, analyse, guide, motivate, and help you through the process, but you will have to walk the path yourself. Ultimately, you decide what you want out of it.
                </p>

                <button onclick="window.location.href='/pages/counselling-or-logotherapy'" class="font-comic-bold custom-faith text-[14px] sm:text-[18px] md:text-[20px] lg:text-[24px]">
                    Faith-based counselling and personal sessions
                </button>
            </div>

        </div>
    </div>

</div>

</div>{{-- end white wrapper --}}

@endsection
