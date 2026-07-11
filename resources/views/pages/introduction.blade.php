@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Introduction') . ' | ICE')

@section('content')
<div class="intro-bg min-h-screen">

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
            {{ $page?->title ?? 'Introduction' }}
        </button>
    </div>

    {{-- Text Content --}}
    <div class="text1raw">
            <p>The Character-Building school course has been initiated to impart ethics to children effectively</p>
            <p><span class="intro-highlight">The curriculum aims</span> to provide the modern Muslim world with a comprehensive ethical programme that enlightens and boosts the values of school-aged children. An educational setting that can equip them with the necessary moral, emotional, and social skills to develop into the best version of themselves. These three areas complement one another in developing moral characters delicately but efficiently.</p>
            <p>"Character Building" is a complementary subject founded on fundamental Islamic and universal values. It can be taught alongside traditional school courses or in other combinations, such as home-schooling, as an intensive online class, in after-school clubs or Sunday schools, as a Summer school programme, in Islamic centres, etc.</p>
            <p>It is designed to educate Muslim children in the spirit of Islam and teach them necessary attitudes and qualities such as self-awareness, empathy, self-control, moral reasoning, self-reflection, problem-solving and self-regulation of behaviour that minimises wrong and destructive choices and encourages treating others righteously.</p>
            <p>These "personal tools" and skill sets will strengthen their character and lay the foundation for becoming more enlightened, God-conscious, God-fearing, and righteous human beings, which will help them succeed in the test of life. In this way, we hope to accomplish our overarching mission to motivate children towards righteousness throughout their developmental years and provide them guidance and moral support along the way.</p>
            <p><span class="intro-highlight">The uniqueness</span> of the subject is that it combines Islamic values with psychology through the science of Character Education, which is the teaching of values and virtues that support moral decision-making. It falls under the art of Educational Psychology and should not be viewed as another Islamic Studies curriculum. The advanced pedagogical methods behind the Course and the adopted eclectic approach distinguish it significantly from traditional approaches to religious teachings. These teach the students the history of Islam and list the rules of halal and haram. While the intention is more or less the same - to strengthen their Muslim identity - conventional methods do not always manage to gain the students' interest as they are not able to relate. For this very reason, pedagogical methods and approaches are crucial when we approach children and youngsters. If the teaching methods and style are perceived as dry preaching by the youth and ineffective by the parents, it suggests that they are either inadequately implemented or require more attention within Muslim communities. Many Muslim countries have already implemented smaller programmes of moral education. However, these efforts often focus solely on a few skill-training techniques that are insufficient to bring about significant change. A systematic and extensive course is essential, which trains children in ethical reasoning, resulting in better ethical judgment, and educates them about the underlying concepts behind the rules of life and defined virtues, enabling them to grasp the true essence of what life is all about. A temporary journey full of trials to pass and a qualification round to determine our true position in the life of the Hereafter.</p>
    </div>

    {{-- Image --}}
    <div class="pb-10 w-[90%] max-w-[1100px] mx-auto">
        <img src="{{ asset('images/join_1.webp') }}" alt="" class="block w-full">
    </div>

</div>
@endsection
