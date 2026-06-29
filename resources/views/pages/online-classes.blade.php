@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Online Classes') . ' | ICE')

@section('content')
    <div class="online_classes_bg min-h-screen">

        {{-- Title button --}}
        <div class="text-center">
            <button class="font-raleway-extrabold custom-btn page_ebook-2">{{ $page?->title ?? 'Online Classes' }}</button>
        </div>

        {{-- First content block --}}
        <div class="flex justify-center mt-10">
            <div class="w-11/12 md:w-10/12 lg:w-8/12">

                <p class="oc-body-text">The digital books are reserved for our professional online teachers to ensure quality and supervision. The online Textbooks include digital features and some extra activities.</p>

                <p class="oc-body-text oc-launching-soon">LAUNCHING SOON!</p>

                <div class="mb-[10px]">
                    <strong class="pages-heading-bottom-border oc-online-teachers">ONLINE TEACHERS</strong>
                </div>

                <div class="w-fit mb-[10px]">
                    <span class="oc-heading oc-heading-spaced">Teach with Us</span>
                </div>

                <p class="oc-body-text">All educators who want to teach our Character Building Course professionally must enrol in a short Teacher Training Programme before being licensed to teach our digital books online from our platform.</p>

                <p class="oc-body-text">Join the ranks of our esteemed instructors at ICE Publishers and become a driving force in the global effort to enhance Muslim competency. As a member of our community, you will have the opportunity to make a real difference in the lives of students around the world and be a part of a movement that is working towards the progress of our Ummah by adding value to schooling through Character Education. Together, we can promote Islamic values and strengthen the Muslim identity of youth.</p>

            </div>
        </div>

        {{-- Banner image section --}}
        <div class="online-classes-banner"></div>

        {{-- Second content block --}}
        <div class="flex justify-center mt-10">
            <div class="w-11/12 md:w-10/12 lg:w-8/12">

                <div class="w-fit mt-5 mb-4"><span class="oc-heading">Flexible Scheduling</span></div>
                <p class="oc-body-text">Teach at weekends, evenings or during summer vacations.</p>

                <div class="w-fit mt-5 mb-4"><span class="oc-heading">Remote Teaching</span></div>
                <p class="oc-body-text">Efficient, online learning opportunities that allow you to work from the comfort of your own home through our digital platform.</p>

                <div class="w-fit mt-5 mb-4"><span class="oc-heading">Forum</span></div>
                <p class="oc-body-text">Virtual teaching through 1-hour Zoom or Microsoft Teams classes 2 to 3 times weekly covering one grade per year. One grade can be covered in half a year or through intensive classes during summer vacations.</p>
                <p class="oc-body-text">You are also encouraged to create platforms where the character-building Course can reach its target audience, such as a home-schooling classroom of a maximum of 10 students, Muslim community centres, summer camps, or other programmes held by Islamic schools or private organisations.</p>

                <div class="w-fit mt-5 mb-4"><span class="oc-heading">Selection and Hiring</span></div>
                <p class="oc-body-text">Qualified teachers with a teaching background (Group A) and volunteers (Group C) who wish to offer their services to welfare programmes through community centres, etc., are both welcome to apply for a post as a Character Building teacher. Degree holders in Education, Psychology or Sociology will be in an advantageous situation. All teachers of ICE Publishers will receive basic training upon selection to ensure our objectives are met. Degree holders of Education or Psychology are not bound to participate but are encouraged to do so.</p>
                <p class="oc-body-text">We need dedicated and competent teachers with passion and talent for teaching kids from all over the world – where Muslim communities are found, and the demand for Character Education is present.</p>

                <div class="w-fit mt-5 mb-4"><span class="oc-heading">Income Opportunities for Professional Teachers</span></div>
                <p class="oc-body-text">Experienced home-school teachers without a relevant degree will also be considered (Group B) if they pass our criteria and interviews, but with a lesser wage than qualified teachers.</p>
                <p class="oc-body-text">Share your passion and expertise while making a difference in the community on a professional platform.</p>

                <div class="w-fit mt-5 mb-4"><span class="oc-heading">Teacher Onboarding Training Programme</span></div>
                <p class="oc-body-text">Our specialised onboarding training is a crucial process that sets the tone for a teacher's teaching career. It not only helps new hires settle into their roles but also equips them with the necessary skills and knowledge to excel in the classroom (virtual on-prem or in-person). The carefully designed onboarding programme will help:</p>
                <ul class="oc-list">
                    <li>Ensure that our main approaches to teaching are understood.</li>
                    <li>Act as a change agent.</li>
                    <li>Enhance the teacher's performance through an interactive, dynamic teaching style to maximise student's learning outcomes.</li>
                    <li>Foster a positive learning culture and optimum application.</li>
                    <li>Serve for teachers' growth and development, both at a personal and professional level.</li>
                </ul>
                <p class="oc-body-text">ICE Publishers aims to empower teachers to reach their full potential and make a lasting impact on their students' lives.</p>

                <div class="w-fit mt-5 mb-4"><span class="oc-heading">Key Highlights</span></div>
                <ul class="oc-list">
                    <li>Training through professional trainers.</li>
                    <li>Interactive sessions to make learning fun with a lasting impact.</li>
                    <li>Ensuring that our pedagogical approach is well perceived and the philosophy correctly delivered to attain meaningful results.</li>
                    <li>Reviews through a feedback loop.</li>
                </ul>

            </div>
        </div>

        {{-- Classroom image --}}
        <div class="flex justify-center mt-10">
            <img src="{{ asset('images/classroom.webp') }}" alt="Classroom" class="w-full max-w-5xl h-auto">
        </div>

    </div>
@endsection
