@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: "Teacher's Training") . ' | ICE')

@section('content')
    <div class="teachers-training-bg min-h-screen">

        {{-- Title Button --}}
        <div class="flex justify-center pt-[30px] sm:pt-[40px] md:pt-[50px]">
            <button class="font-['Raleway',sans-serif] font-extrabold bg-white text-black
                text-[16px] sm:text-[22px] md:text-[28px] lg:text-[36px]
                px-[16px] sm:px-[28px] md:px-[40px] lg:px-[58px]
                py-[10px] sm:py-[14px] md:py-[18px] lg:py-[22px]
                rounded-[8px] sm:rounded-[10px] md:rounded-[14px]
                shadow-[0px_3px_6px_rgba(0,0,0,0.9)]
                border-none capitalize leading-[1.2]
                [text-shadow:0px_2px_0px_#8A8C8E]
                whitespace-nowrap">
                {{ $page?->title ?? "Teacher's Training" }}
            </button>
        </div>

        {{-- Main content --}}
        <div class="flex justify-center mt-10">
            <div class="w-11/12 md:w-10/12 lg:w-8/12">

                <p class="tt-body-text">To show commitment towards inculcating the true essence of this Course, ICE Publishers presents the option of training the teaching faculty of institutions and home school educators. The right purpose, approach, competency, and dedication are vital to meeting the course's objectives and reaching the desired effect through focused Teacher Training.</p>

                {{-- "We offer two types" heading --}}
                <div>
                    <span class="child-heading">We offer two types of training:</span>
                </div>

                <p class="tt-body-text">1) Customised Teacher's Training to institutions through Source Code Academia led by Mr.Sahil Adeem.</p>

                <p class="tt-body-text">2) Teacher Onboarding Training, which is compulsory for home-school teachers, online teachers, and other educators without a formal degree in Education or relevant teaching experience. Our training programme will ensure that both Intellectual Property (IP) as well as General Data Protection Regulation (GDPR) are respected and principally not breached.</p>

                {{-- Section 1 heading --}}
                <div>
                    <span class="child-heading">1. Customised Teacher's Training through Source Code Academia:</span>
                </div>

                <p class="tt-body-text">Raising the standards of thinking and getting the teacher to be a role model is only the beginning. Harbouring the right mindset for teaching this non-traditional subject, building competency, and enhancing the functional capacity of the whole staff is a prime duty of the institutions or educators responsible for building good character within their students.</p>

                <p class="tt-body-text">"Source Code Academy" is a professional, international training company that has joined hands with ICE Publishers to take up this venture.</p>

                <p class="tt-body-text"><strong>With over a decade of training experience and professional counselling, Source Code Academia provides Teacher's Training, emphasising areas such as:</strong></p>

                <ul class="oc-list">
                    <li>Purpose-driven teachers with the willingness to go that extra mile</li>
                    <li>Mentorship in the 21st century</li>
                    <li>Engaging and motivating children through a dynamic teaching</li>
                    <li>Effective zones of influence</li>
                    <li>Child Psychology and classification by age</li>
                    <li>Pedagogy and methods of positive reinforcement</li>
                    <li>Emotional and social intelligence</li>
                    <li>Empathy as a primary tool</li>
                    <li>Getting the best out of the Course</li>
                    <li>Thinking out of the box and Unorthodox techniques</li>
                    <li>Stress management</li>
                    <li>Personal development and self-evaluation</li>
                </ul>

                <p class="tt-body-text">We can also offer customised courses to build or fine-tune the competencies required by the faculty to reach the desired results.</p>

                {{-- Source Code Academia row --}}
                <div class="flex items-center justify-between gap-6 mt-4 mb-4">
                    <p class="tt-body-text flex-1">For customised Teacher's Training Programmes for schools led by Sahil Adeem, contact us or Source Code Academy's website directly.</p>
                    <div class="flex-shrink-0">
                        <img src="{{ asset('images/source-code-academia.png') }}" alt="Source Code Academia" class="max-h-[80px] w-auto">
                    </div>
                </div>

                {{-- Section 2 heading --}}
                <div>
                    <span class="child-heading">2. ICE Publishers Teachers' Training are booked here.</span>
                </div>

                <p class="tt-body-text">✏ <a href="{{ route('about') }}" class="charcoal-bluish-txt">Contact Us</a>. Don't forget to mention <strong class="charcoal-bluish-txt">"Teachers' Training"</strong> in subject.</p>

                <p class="tt-body-text">Educators wanting to teach our Character Building Course professionally in a classroom setup (whether virtual or physical classroom) must enrol in a short Teacher Training Programme. This will also give them access to supervision and a license to teach our digital books online from our platform.</p>

                <p class="tt-body-text">For more information, see <a href="{{ route('online-classes') }}" class="charcoal-bluish-txt"><strong>Online Teachers</strong></a>.</p>

            </div>
        </div>

        {{-- Bottom image --}}
        <div class="container mx-auto px-4 mt-10 mb-10">
            <img src="{{ asset('images/meeting.webp') }}" alt="Meeting" class="w-full h-auto">
        </div>

    </div>
@endsection
