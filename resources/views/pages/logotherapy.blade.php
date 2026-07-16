@extends('layouts.app')

@section('title', ($page?->meta_title ?: $page?->title ?: 'Online Logotherapy') . ' | ICE')
@section('meta_description', $page?->meta_description)
@section('meta_keywords', $page?->meta_keywords)

@section('content')
    <div class="logotherapy-bg min-h-screen">

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
                {{ $page?->title ?? 'Online Logotherapy' }}
            </button>
        </div>

        {{-- Paint image section --}}
        <div class="mt-6 sm:mt-10 mx-4 sm:mx-8 lg:mx-16 flex justify-center">
            <img src="{{ asset('images/paint.webp') }}" alt="Logotherapy" class="w-full sm:w-[500px] lg:w-[650px] max-w-full h-auto">
        </div>

        {{-- Welcome text --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto mb-8 mt-6">
            <p class="font-['Raleway',sans-serif] font-normal text-[14px] sm:text-[16px] lg:text-[24px] text-center leading-[1.5] mt-4 mb-4 p-[10px] bg-[#b7e7db]">We welcome you on board to a journey of self-realization and progressive self-development.</p>
        </div>

        {{-- Body text --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto mb-10">
            <ul class="w-full font-['Comic_Sans_MS',sans-serif] font-normal text-[14px] sm:text-[16px] md:text-[18px] lg:text-[24px] leading-[1.5] list-none p-0 pl-1 m-0 space-y-4 sm:space-y-5">
                <li class="flex items-start gap-1">
                    <span class="flex-shrink-0 w-[14px] h-[14px] rounded-full border border-[#555] bg-white inline-block mt-2"></span>
                    <span class="m-0 flex-1 pl-[5px]">Logotherapy focuses on searching for one's unique meaning in life. It teaches us that it is not we who ask the questions of life: Why me? Why this? Why now? Rather, LIFE asks us questions, and it is our responsibility to answer them. We are here to utilize and become the best versions of ourselves.</span>
                </li>
                <li class="flex items-start gap-1">
                    <span class="flex-shrink-0 w-[14px] h-[14px] rounded-full border border-[#555] bg-white inline-block mt-2"></span>
                    <span class="m-0 flex-1 pl-[5px]">Sofia Adeem is an accredited member of the International Association of Logotherapy and Existentialistic Analysis with a Diploma in Logotherapy and major in Psychological Counselling.</span>
                </li>
                <li class="flex items-start gap-1">
                    <span class="flex-shrink-0 w-[14px] h-[14px] rounded-full border border-[#555] bg-white inline-block mt-2"></span>
                    <span class="m-0 flex-1 pl-[5px]">I look forward to being of service to you on Logotherapy Online.</span>
                </li>
                <li class="flex items-start gap-1">
                    <span class="flex-shrink-0 w-[14px] h-[14px] rounded-full border border-[#555] bg-white inline-block mt-2"></span>
                    <span class="m-0 flex-1 pl-[5px]">Logotherapy Online Counselling is OPEN. Please email your preferred date and time, and we will confirm availability.</span>
                </li>
            </ul>
        </div>

        {{-- Text image --}}
        <div class="mt-8 mb-8">
            <img src="{{ asset('images/text.webp') }}" alt="Logotherapy" class="w-full h-auto block">
        </div>

        {{-- Danish Time section --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto mb-10">
            <div class="w-full">

                <div class="w-fit mt-5 mb-4"><span class="oc-heading">Danish Time:</span></div>

                <p class="oc-body-text">Monday - Sunday: 12:00PM to 14:00PM and 21:00PM to 23:00PM (UTC + 2)</p>

                <p class="oc-body-text">
                    <a href="#" class="text-[color:rgba(var(--color-body-text-rgb),0.7)] hover:underline">Time conversion to Danish Time</a>
                </p>

                <p class="oc-body-text">
                    Book Your Session <a href="#" class="text-[color:rgba(var(--color-body-text-rgb),0.7)] hover:underline">Click here</a>
                </p>

                <p class="oc-body-text text-[color:rgba(var(--color-body-text-rgb),0.7)]">
                    Contact us via e mail or whatsapp Cluster Manager on 0092 325 5662668 for booking of session time after purchase.
                </p>

            </div>
        </div>

        {{-- Introduction to Logotherapy --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto mb-10">
            <div class="w-full">

                <div class="w-fit mt-5 mb-4"><span class="oc-heading">Introduction to Logotherapy and Background</span></div>

                <p class="oc-body-text">The findings of Dr Victor Frankl MD, PhD, the founder of Logotherapy, are based on comprehensive experiences beyond usual lap setups, theory reflecting a specific time period, and small control groups. Dr Frankl himself, is a survivor of three concentration camps. His significant findings are supported by logo therapists worldwide both then and today and seem forever relevant when therapy is needed to help people restore mental health. The belief is that the desire and will to find meaning is humans' most essential, powerful driving force. Life can, therefore, have meaning even in the most miserable circumstances. The greatest motivation for living comes from finding that meaning.</p>

                <p class="oc-body-text mb-6"><strong>Logotherapy</strong> is the first truly holistic and complete system in the history of psychotherapy, called the third force falling under humanistic and existentialistic therapies, that also provides an opportunity to integrate other methods aligned with its core (Marshall &amp; Marshall:23), including spirituality and religion. This makes it both unique, practicable, and timeless, unlike many therapy traditions, which can be rigid and one-eyed.</p>

                <p class="oc-body-text mb-6">Logotherapy is more than therapy. It is logo/ "meaning" philosophy - a view about ourselves and our place in life that will help us make sense of it despite tragedies and tumult. <span class="text-[13px] sm:text-[16px]">(Fabry:16)</span></p>

                <p class="oc-body-text mb-6">Logo philosophy is based on much of the wisdom of the ages, common sense, and the findings of modern psychology in a systematic and methodologically refined way so we can apply them to our lives. It has contributed to the advancement of psychotherapy, which focuses mostly on the past, the primitive drives and destructive powers within us. Logotherapy focuses less on the past or only as much as is required, and more on the future - what to do about your situation, actively and progressively.</p>

            </div>
        </div>

        {{-- your-are image centered --}}
        <div class="container mx-auto px-4 mt-8 mb-8">
            <div class="flex justify-center">
                <div class="w-full sm:w-full md:w-11/12 lg:w-10/12">
                    <img src="{{ asset('images/your-are.webp') }}" alt="You Are" class="w-full h-auto block">
                </div>
            </div>
        </div>

        {{-- problem image full width --}}
        <div class="mt-10 mb-10 sm:mt-16 sm:mb-16">
            <img src="{{ asset('images/problem.webp') }}" alt="Problem" class="w-full h-auto block">
        </div>

        {{-- Characteristics heading --}}
        <div class="flex justify-center mb-6 sm:mb-10 mt-4 sm:mt-6 px-4">
            <div class="w-fit"><span class="oc-heading text-center">For the overview, the characteristics of Logotherapy are:</span></div>
        </div>

        {{-- Characteristics list --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto mt-10 sm:mt-16 lg:mt-[90px] mb-10 sm:mb-16 lg:mb-[90px]">
            <ul class="w-full font-['Comic_Sans_MS',sans-serif] font-normal text-[13px] sm:text-[16px] md:text-[20px] lg:text-[27px] leading-[1.5] list-none p-0 space-y-5 sm:space-y-8">

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[7px] inline-block flex-shrink-0"></span>
                    <span>It is a therapeutic approach that <strong>helps people find personal meaning and purpose in life.</strong></span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[7px] inline-block flex-shrink-0"></span>
                    <span>Logotherapy's concept of humankind is based on three pillars: <strong>The freedom of will, the will to meaning, and the meaning of life.</strong></span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[7px] inline-block flex-shrink-0"></span>
                    <span>It <strong>helps individuals find the answers to their questions by reconnecting with their Self</strong> through their Conscience and by facing and accepting universal truths.</span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[7px] inline-block flex-shrink-0"></span>
                    <span>It <strong>strengthens our assurance that we have choices, are unique,</strong> and have the power to defy limitations by overcoming them or changing our attitudes where they cannot be overcome.</span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[7px] inline-block flex-shrink-0"></span>
                    <span>Your mindset determines your experience of reality, which is why you must ensure it is healthy and constructive. Logotherapy <strong>teaches you to utilise your inner medicine chest and restore your balance</strong> by adopting the right perspective in the given situation.</span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[7px] inline-block flex-shrink-0"></span>
                    <span><strong>It reinforces our inclination toward self-realisation</strong> (self-transcendence), which is believed to nurture and strengthen our Spirit towards selfless, outstanding, and unmatchable human achievements. <span class="text-[11px] sm:text-[14px] lg:text-[16px]">(Fabry.1994. P.16-17,170)</span></span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[7px] inline-block flex-shrink-0"></span>
                    <span>This orientation <strong>believes in the good in people. We can always change for the better.</strong> A constructive approach and a positive mindset are crucial foundations that the therapist will encourage and support.</span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[7px] inline-block flex-shrink-0"></span>
                    <span>The <strong>human Spirit is considered superior to any emotional challenge or disease.</strong> Thus, the spiritual person can be distressed and disturbed but not destroyed. <span class="text-[11px] sm:text-[14px] lg:text-[20px]">(These two principles are known as Frankl's psychological creed.)</span></span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[7px] inline-block flex-shrink-0"></span>
                    <span>Logo philosophy believes that life is all about facing whatever comes your way in the best possible way. <strong>We can grow from distressed situations instead of being defeated by them and discover potential.</strong></span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[7px] inline-block flex-shrink-0"></span>
                    <span>Logo therapists <strong>help you utilise your inner resources to heal yourself</strong> by finding meaning, value, purpose, worthwhile activities, and goals in life.</span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[7px] inline-block flex-shrink-0"></span>
                    <span>Logo-education <strong>teaches us to become independent</strong> (even from the therapist) and to take responsibility for our decisions.</span>
                </li>

            </ul>
        </div>

        {{-- boy-logoth image --}}
        <div class="mt-8 mb-8">
            <img src="{{ asset('images/boy-logoth.webp') }}" alt="Logotherapy" class="w-full h-auto block">
        </div>

        {{-- Body text below boy image --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto mt-8 sm:mt-12 mb-10 sm:mb-14">
            <div class="w-full">

                <p class="oc-body-text">Logo therapists are of the belief that we are not merely driven by primitive instincts or psychologically driven behaviour patterns. We are far more than that. <span class="text-[12px] sm:text-[16px] lg:text-[18px]">(Lukas:23-24)</span> There is the body, the mind and the Spirit, and the Spirit can overpower the other two to a great extent if you will it.</p>

                <p class="oc-body-text">Our primary concern is not to satisfy drives, reduce stress and gratify pleasures, as older theories assumed. The part of us that we call the Spirit or the Soul is motivated by our will to meaning, which makes us reach out for activities and experiences that are meaningful to us. We have the ability to disregard drives or forego pleasures, though they are great influencers. Simultaneously, we also possess the ability to make sacrifices of all kinds IF we set a self-chosen goal which we are determined to reach, devote ourselves to a task, make a cause our own, or lovingly reach out to another person. Even while suffering deprivations, we can be at peace if we see meaning behind what we have given up and sacrificed. On the other hand, if we satisfy all our drives and reach a point where nothing more is demanded of us, we will become existentially frustrated and depressed. <span class="text-[12px] sm:text-[16px] lg:text-[18px]">(Lukas:22-23)</span> The need to satisfy our spiritual dimension is what differentiates and advances us from animals. Animals are pleased with satisfying their primitive basic needs. <strong>We humans have a higher purpose, responsibility, and Conscience to hunt us when we do not live according to universal values and are not true to our inner call. Because we are meaning-seekers, our systems will seek to utilise and actualise ourselves until we do justice to our potential.</strong> As Frankl also states: "As long as a human being breathes, as long as they are conscious, he carries responsibility for answering life's questions." <span class="text-[12px] sm:text-[16px] lg:text-[18px]">(Marshall &amp; Marshall:93)</span></p>

                <p class="oc-body-text">"We cannot choose our emotions any more than animals, but we can take a stand; we can control the reaction we make to our emotions by our will." <span class="text-[12px] sm:text-[16px] lg:text-[18px]">(Lukas:78)</span> Thus, the environment does not make a person even though it will influence us. <strong>Everything ultimately depends on what the person makes of it, on one's attitude toward it. Life can be hard on us, but it is never made unbearable by circumstances - only by lack of meaning and purpose.</strong> Thus, "Man's freedom is not freedom from conditions but rather freedom to take a stand on whatever conditions might confront him," as Frankl states. <span class="text-[12px] sm:text-[16px] lg:text-[18px]">(Frankl.The Will to Meaning.P.16)</span></p>

                <p class="oc-body-text">In this area of free will, human beings can become superior to their circumstances if they learn to utilise their inner strength. This worldview is essentially constructive and an expression of faith in a Divine Force, even though people from different cultures or belief systems address the force differently.</p>

            </div>
        </div>

        {{-- frank_1 image centered --}}
        <div class="container mx-auto px-4 mt-8 mb-8">
            <div class="flex justify-center">
                <div class="w-full sm:w-full md:w-10/12 lg:w-8/12">
                    <img src="{{ asset('images/frank_1.webp') }}" alt="Viktor Frankl" class="w-full h-auto block">
                </div>
            </div>
        </div>

        {{-- Guilt / Life transitions text --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto text-center mb-10 sm:mb-14 mt-8 sm:mt-10">
            <div class="w-full oc-body-text">

                <p class="mb-4 sm:mb-5"><strong class="underline decoration-white decoration-[3px]">Guilt</strong> is viewed as an opportunity to change oneself for the better.</p>

                <p class="mb-4 sm:mb-5"><strong class="underline decoration-white decoration-[3px]">Life transitions</strong> are viewed as the chance to take responsible action aligned with your purpose.</p>

                <p class="mb-4 sm:mb-5">In this way, Logotherapy is aimed at helping you to make better use of your "spiritual" resources to withstand adversity. Our inner resources need to be found, acknowledged, nurtured and put into practice.</p>

                <p class="mb-4 sm:mb-5">The client decides in which direction he or she wants to go. For example, do you want to focus on psychological techniques to restore your inner balance? Or do you want to understand the big picture by applying the religious angle to your issues and receive guidance about specific practices that need to be "updated" and implemented?</p>

            </div>
        </div>

        {{-- wisdom image centered --}}
        <div class="flex justify-center mt-8 mb-8">
            <img src="{{ asset('images/wisdom.avif') }}" alt="Wisdom" class="w-[250px] sm:w-[320px] lg:w-[400px] max-w-full h-auto">
        </div>

        {{-- Techniques section --}}
        <div class="w-full mt-8 sm:mt-10 bg-no-repeat dabba-section-bg pt-10 pb-5">
            <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto">
                <div class="w-full">

                    <div class="w-fit mb-4"><span class="oc-heading">Techniques</span></div>

                    <p class="oc-body-text">Different techniques are used during therapy depending on the client's specific needs. Some common methods of Logotherapy are listed below. Finding and defining <strong>creative, experiential, and attitudinal values</strong> are believed to enhance the quality of life.</p>

                </div>
            </div>
        </div>

        {{-- an-individual image centered --}}
        <div class="flex justify-center mt-8 mb-8">
            <img src="{{ asset('images/an-individual.webp') }}" alt="An Individual" class="w-[350px] sm:w-[450px] lg:w-[550px] max-w-full h-auto">
        </div>

        {{-- Techniques paragraphs --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto mt-8 sm:mt-12 mb-10 sm:mb-14">
            <div class="w-full oc-body-text space-y-5 sm:space-y-6">

                <p><strong class="underline decoration-white decoration-[3px]">De-reflection</strong> occurs when a person hyper-reflects on a problem to an extent which is out of proportion and unhealthy. The client needs to combat focus on an anxiety-provoking situation or object by being de-reflected from the disturbance and <strong>reoriented</strong>.</p>

                <p><strong class="underline decoration-white decoration-[3px]">Paradoxical intention</strong> is a technique that invites you to wish for the thing you fear most. It is used in cases of anxiety or phobias, in which humour is applied when fear is out of proportion and paralysing.</p>

                <p><strong class="underline decoration-white decoration-[3px]">Socratic dialogue</strong> is a tool used to help the client through the process of self-discovery by noticing and interpreting your own words. During the dialogue, your therapist listens closely to how you describe things and points out your word patterns, helping you see their underlying meaning. This process is believed to help you realise your own answers as they are often already present within you and just waiting to be discovered.</p>

            </div>
        </div>

        {{-- Modification of Attitudes --}}
        <div class="w-full bg-no-repeat dabba-section-bg pt-10 pb-10">
            <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto">
                <div class="w-full oc-body-text space-y-5 sm:space-y-6">

                    <div class="w-fit mb-2"><span class="oc-heading">Modification of Attitudes</span></div>

                    <p>Understanding underlying causes and venting frustrations can be an important step towards healing and often how the process of therapy starts. However, endlessly mulling over the negative aspects or drowning in self-pity does not break the cycle. The cure is self-commitment and a renewed faith in oneself that 'I control it.' Did you know that the difference between neurotics and healthy beings is that neurotics misunderstand their existence as "this is the way I have to be." Healthy persons have the attitude of "I can always change."</p>

                    <p>Sometimes, we need not dig up childhood traumas or focus on an unhappy past. Once we know why we react as we do, we must take charge of the direction in which we are going. By modifying our attitude head-on and viewing what is happening from a different angle, we can rearrange the furniture in our mind, after which the world will look very different. A common example of "change in attitude" can be: "I am not losing a daughter; I am gaining a son-in-law." <span class="text-[12px] sm:text-[16px] lg:text-[18px]">(Fabry.2021:42)</span> We have the power to choose to look at things positively and healthily.</p>

                </div>
            </div>
        </div>

        {{-- we-do-not-have image centered --}}
        <div class="flex justify-center mt-8 mb-8">
            <img src="{{ asset('images/we-do-not-have.webp') }}" alt="We Do Not Have" class="w-[350px] sm:w-[450px] lg:w-[550px] max-w-full h-auto">
        </div>

        {{-- What Logotherapy Can Help With --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto mt-8 sm:mt-10 mb-10 sm:mb-12">
            <div class="w-full">

                <div class="w-fit mb-4"><span class="oc-heading">What Logotherapy Can Help With</span></div>

                <div class="oc-body-text">

                    <p>It is believed that the right perspective and attitude can set you free. However, when we are indulged in a crisis, we can have a hard time seeing things as they truly are. We might have adopted a negative, pessimistic angle or might just be confused about things. One thing is sure: when things are not working out for us, we need to do something differently and "see beyond". Sometimes, all we need is another perspective â€“ one that is constructive and makes sense in the bigger picture. Other times, we need a concrete set of toolboxes to fix the engine, one part at a time.</p>

                    <br>

                    <p>Regardless of the issue or crises, when life seems like a dark jungle in which we have lost our way and are on our own, we can benefit from human interaction in the form of a guide and some enlightenment to find a way out. The logo therapist will try to candlelight for you during the journey, help you see possibilities by adopting a bird's perspective whenever you are stuck in a blind alley, and together reach clarity about where you ultimately want to reach.</p>

                    <br>

                    <p>Logotherapy can be useful for most types of challenges, blocks and disorders that hinder mental health. Examples are: Depression, Grief, Guilt, Pain, Restlessness, Phobias, Schizophrenia, Substance abuse, Anxiety, Panic attacks, Suicidal ideation, Behavioural problems such as excessive aggression, and many more.</p>

                    <br>

                    <p>It is never about what you have done but all about your willingness to change. Neither is the most essential what has happened to you, as much as what you can learn from it.</p>

                </div>

            </div>
        </div>

        {{-- through-the-lens image centered --}}
        <div class="flex justify-center mt-8 mb-8">
            <img src="{{ asset('images/through-the-lens.webp') }}" alt="Through The Lens" class="w-[350px] sm:w-[450px] lg:w-[550px] max-w-full h-auto">
        </div>

        {{-- Dark bullet list --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto mt-8 sm:mt-10 mb-10 sm:mb-14">
            <ul class="w-full font-['Comic_Sans_MS',sans-serif] font-normal text-[13px] sm:text-[16px] md:text-[20px] lg:text-[26px] leading-[1.5] list-none p-0 space-y-5 sm:space-y-8">

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                    <span>Logo therapists focus on the dynamic core of the person as someone who can change for the better at any time IF only one sincerely intends to find and see the importance and meaning in it. <strong>Change can happen</strong> because the will to live in accordance with universal values and Conscience is inherent and fundamental to human existence. <span class="text-[11px] sm:text-[14px] lg:text-[18px]">(Marshall &amp; Marshall:525)</span></span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                    <span><strong>"The logo therapist's role consists of widening and broadening the visual field of the patient so that the whole spectrum of potential meaning becomes conscious and visible to him."</strong> <span class="text-[11px] sm:text-[14px] lg:text-[18px]">(Frankl, Man's Search for Meaning, p. 89)</span></span>
                </li>

                <li class="flex items-start gap-3 sm:gap-5 pb-3">
                    <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                    <span>"Man ultimately decides for himself! And, in the end, education must be education toward the ability to decide." <span class="text-[11px] sm:text-[14px] lg:text-[18px]">(Frankl, 2019, p. xix)</span> Thus, the client will be challenged to develop critical thinking and educate themselves so they can be skilled in overcoming the problems they are facing.</span>
                </li>

            </ul>
        </div>

        {{-- Benefits of Logotherapy section --}}
        <div class="w-full bg-no-repeat dabba-section-bg pt-10 pb-10">
            <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto">
                <div class="w-full">

                    <div class="w-fit mb-4 sm:mb-6"><span class="oc-heading">Benefits of Logotherapy:</span></div>

                    <p class="oc-body-text text-center">As Frankl says: "Suffering can be made into a triumph IF you can find meaning in it, and it changes you for the better." <span class="text-[12px] sm:text-[16px] lg:text-[18px]">(Frankl.The will to meaning.P.79)</span></p>

                </div>
            </div>
        </div>

        {{-- tough-sitution image centered --}}
        <div class="flex justify-center mb-8 sm:mb-10">
            <img src="{{ asset('images/tough-sitution.webp') }}" alt="Tough Situation" class="w-full sm:w-[500px] lg:w-[700px] max-w-full h-auto">
        </div>

        {{-- Benefits text + bullet list --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto mt-8 sm:mt-12 mb-10 sm:mb-14">
            <div class="w-full">

                <p class="oc-body-text">Logotherapy can improve your ability to withstand adversity, stress and hardship, followed by resilience. <strong>It will equip you to better tackle life challenges, whatever they might be, due to the emotional skills that this form of therapy encourages people to develop, like:</strong></p>

                <ul class="w-full font-['Comic_Sans_MS',sans-serif] font-normal text-[13px] sm:text-[16px] md:text-[20px] lg:text-[26px] leading-[1.5] list-none p-0 space-y-4 sm:space-y-6 mt-4 sm:mt-6">

                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Emotional intelligence.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Learning the power of acceptance and tawakkul.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Training yourself to adopt optimism and surrender to the Will of the Almighty, even in the face of tragedy.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Recognising and learning to utilise the power of your Spirit.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Increased mental strength to overcome whatever comes your way.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Recognising and distinguishing between constructive and destructive influencing forces, hereunder feelings and thoughts.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Learning to realign with your inner Self and use the voice of your Conscience as a guardian angel and compass.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Altruism - A selfless approach to others that nurtures your Spirit immensely.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>A conscious and active approach to life (rather than a passive one).</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Learning to reconsider the meaning of an event by adopting a constructive perspective.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Courage to face one's fears in order to overcome them.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Learning coping techniques that work for you.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>Understanding that life is all about making responsible choices.</span>
                    </li>
                    <li class="flex items-start gap-3 sm:gap-5 pb-2">
                        <span class="w-[10px] h-[10px] sm:w-[12px] sm:h-[12px] min-w-[10px] sm:min-w-[12px] rounded-full bg-black mt-[6px] sm:mt-[10px] inline-block flex-shrink-0"></span>
                        <span>A focused, values-based lifestyle in which you are the architect.</span>
                    </li>

                </ul>
            </div>
        </div>

        {{-- Effectiveness section (dabba bg) --}}
        <div class="w-full bg-no-repeat dabba-section-bg pt-10 pb-10">
            <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto">
                <div class="w-full">
                    <div class="w-fit mb-4"><span class="oc-heading">Effectiveness</span></div>
                </div>
            </div>
        </div>

        {{-- therapy-is-succesful image centered --}}
        <div class="flex justify-center mt-8 mb-8">
            <img src="{{ asset('images/therapy-is-succesful.webp') }}" alt="Therapy is Successful" class="w-full sm:w-[600px] lg:w-[850px] max-w-full h-auto">
        </div>

        {{-- Effectiveness paragraph --}}
        <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto mt-8 sm:mt-10 mb-10 sm:mb-12">
            <div class="w-full oc-body-text">
                <p>Finding meaning and purpose fuels the Spirit like no other medium. Once your Spirit is high, your motivation, willpower, energy, resilience, optimism and hope can reach their peak. However, <strong>note that the effect of the sessions depends on how badly you want positive change.</strong> As a client, you alone decide whether you will improve upon your weaknesses and negative tendencies, act upon the findings of the therapy and adopt them in practical life or just let it pass over your head and repeat the old habitual cycle. Ultimately, it is up to you how much you decide to explore and utilise your inner medicine chest and potential and live by your standards. The logo therapist is there to help you find them and support you during the process.</p>
            </div>
        </div>

        {{-- "effective at" text centered --}}
        <div class="container mx-auto px-4 mb-8 sm:mb-10">
            <div class="flex justify-center">
                <div class="w-full sm:w-11/12 md:w-10/12 lg:w-8/12 text-center font-['Comic_Sans_MS',sans-serif] font-black leading-[1.4] text-[14px] sm:text-[18px] md:text-[22px] lg:text-[26px]">
                    <p>Because Logotherapy appears to improve people's sense of meaning and connect to the core, it is effective at:</p>
                </div>
            </div>
        </div>

        {{-- smilly-img-logo-th image full width --}}
        <div class="mt-6 mb-6 sm:mt-8 sm:mb-8">
            <img src="{{ asset('images/smilly-img-logo-th.webp') }}" alt="Logotherapy" class="w-full h-auto block">
        </div>

        {{-- Helping-other image centered --}}
        <div class="flex justify-center mt-6 mb-6 sm:mt-8 sm:mb-8">
            <img src="{{ asset('images/Helping-other_10908897-ad4c-4460-b203-ededc5703d29.webp') }}" alt="Helping Others" class="w-full sm:w-[700px] lg:w-[900px] max-w-full h-auto">
        </div>

        {{-- References section (dabba bg) --}}
        <div class="w-full bg-no-repeat dabba-section-bg pt-10 pb-10">
            <div class="w-[90%] sm:w-[80%] lg:w-[65%] mx-auto">
                <div class="w-full">

                    <div class="w-fit mb-4 sm:mb-6"><span class="oc-heading">References</span></div>

                    <div class="oc-body-text space-y-3 sm:space-y-4">
                        <p>Fabry, J. (1994). <em>The Pursuit of Meaning: Viktor Frankl, Logotherapy, and Life.</em> Texas, USA: Institute of Logotherapy Press.</p>
                        <p>Fabry, J. (2021). <em>Guideposts to Meaning: Discovering What Really Matters.</em> Charlottesville, VA: Purpose Research.</p>
                        <p>Frankl, V. E. (2014). <em>Man's Search for Meaning.</em> Boston, MA: Beacon Press.</p>
                        <p>Frankl, V. (2014). <em>The Will to Meaning: Foundations and Applications of Logotherapy.</em> New York, NY: Penguin Books.</p>
                        <p>Frankl, V. E. (2019). <em>The Doctor and the Soul: From Psychotherapy to Logotherapy.</em> New York, NY: Vintage Books.</p>
                        <p>Frankl, V. (2000). <em>Man's Search for Ultimate Meaning.</em> New York, NY: Basic Books.</p>
                        <p>Lukas, E. S. (2020). <em>Meaningful Living: Introduction to Logotherapy: Theory and Practice</em> (J. B. Fabry, Trans.). USA: Purpose Research.</p>
                        <p>Marshall, M., &amp; Marshall, E. (2022). <em>Viktor E. Frankl's Logotherapy and Existential Analysis: Theory and Practice.</em> Ontario, Canada: Ottawa Institute of Logotherapy.</p>
                    </div>

                </div>
            </div>
        </div>

        {{-- sometimes image --}}
        <div class="flex justify-center mt-8 sm:mt-10">
            <img src="{{ asset('images/sometimes.webp') }}" alt="Sometimes" class="w-full sm:w-[700px] lg:w-[900px] max-w-full h-auto">
        </div>

    </div>
@endsection
