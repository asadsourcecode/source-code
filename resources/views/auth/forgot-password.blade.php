@extends('layouts.app')

@section('title', 'Forgot Password | ICE')

@section('content')
<div class="bg-white">
<div class="flex flex-col items-center justify-center pt-16 pb-40">
    <h1 class="text-4xl font-medium font-['Raleway',sans-serif]">FORGOT PASSWORD</h1>
    <p class="mt-3 text-base text-center font-['Raleway',sans-serif]">Enter your email and we'll send you a reset link.</p>

    @if (session('status'))
        <div class="w-full max-w-2xl mt-6">
            <p style="color:#16a34a;font-size:0.9rem;text-align:center;font-family:'Raleway',sans-serif;">{{ session('status') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="w-full max-w-2xl mt-8 flex flex-col gap-8">
        @csrf

        <div>
            <input type="email" name="email" id="email" placeholder="Email" autofocus
                value="{{ old('email') }}"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="email" class="sr-only">Email</label>
            @error('email')
                <p style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                style="width:100%;display:block;background-color:#a8f58d;color:#fff;border:none;border-radius:30px;padding:16px 15px;font-size:16px;font-weight:600;font-family:'Raleway',sans-serif;cursor:pointer;text-align:center;transition:0.4s;">
                Send Reset Link
            </button>
        </div>

        <p class="text-center text-sm font-['Raleway',sans-serif]">
            Remember your password?
            <a href="javascript:void(0)" onclick="openLoginModal()" class="font-semibold hover:underline">Login</a>
        </p>
    </form>
</div>
</div>
@endsection
