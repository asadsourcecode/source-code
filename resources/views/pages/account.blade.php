@extends('layouts.app')

@section('title', 'My Account | ICE')

@section('content')
<div class="min-h-[80vh] py-[60px] px-5 bg-[#f0ecf8]">
    <div class="max-w-[1060px] mx-auto bg-white rounded-2xl px-[56px] py-[48px]">

        <div class="flex justify-between items-start flex-wrap gap-6">

            {{-- Left --}}
            <div class="flex-1 min-w-[260px]">
                <h1 class="font-['Raleway',sans-serif] text-[2rem] font-semibold text-[#111] mb-[6px]">MY ACCOUNT</h1>
                <p class="font-['Raleway',sans-serif] text-[1rem] font-bold text-[#333] mb-10">Order History</p>

                <p class="font-['Raleway',sans-serif] text-[0.95rem] text-[#111] mb-7">
                    You haven't placed any orders yet.
                </p>

                <p class="font-['Raleway',sans-serif] text-[1rem] font-semibold text-[#111] mb-2">Account Details</p>
                <p class="font-['Raleway',sans-serif] text-[0.95rem] text-[#333]">{{ $user->name }}</p>

                <div class="mt-7 flex flex-col gap-3 items-start">
                    @if(auth()->user()->role === 'student')
                    <a href="{{ route('student.dashboard') }}" class="bg-[#216C22] text-white font-['Raleway',sans-serif] text-[0.9rem] font-semibold px-[22px] py-[10px] rounded-md no-underline">
                        Student Dashboard
                    </a>
                    @endif


                    <a href="#" class="bg-[#e8f0fe] text-[#333] font-['Raleway',sans-serif] text-[0.9rem] px-[22px] py-[10px] rounded-md no-underline border border-[#d0d8f0]">
                        View Addresses
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-[#a8f58d] text-[#111] font-['Raleway',sans-serif] text-[0.9rem] font-semibold px-7 py-[10px] rounded-md border-none cursor-pointer">
                            Log out
                        </button>
                    </form>
                </div>
            </div>

            {{-- Right --}}
            <div class="text-right">
                <p class="font-['Raleway',sans-serif] text-[1.1rem] text-[#111] m-0">
                    Welcome: <strong>{{ $user->name }}</strong>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
