@extends('layouts.app')

@section('title', 'Login | ICE')

@section('content')
<div class="bg-white">
<div class="flex flex-col items-center justify-center pt-16 pb-40">
    <h1 class="text-4xl font-medium font-['Raleway',sans-serif]">LOGIN</h1>
    <p class="mt-3 text-base font-['Raleway',sans-serif]">Please enter your e-mail and password:</p>

    @if (session('status'))
        <div class="w-full max-w-2xl mt-6">
            <p style="color:#16a34a;font-size:0.9rem;text-align:center;font-family:'Raleway',sans-serif;">{{ session('status') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="w-full max-w-2xl mt-8 flex flex-col gap-8">
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
            <input type="password" name="password" id="password" placeholder="Password"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="password" class="sr-only">Password</label>
            <div style="text-align:right;margin-top:8px;">
                <a href="{{ route('password.request') }}" style="font-size:0.875rem;font-family:'Raleway',sans-serif;text-decoration:none;color:#333;">Forgot your password?</a>
            </div>
        </div>

        <div>
            <button type="submit"
                style="width:100%;display:block;background-color:#a8f58d;color:#fff;border:none;border-radius:30px;padding:16px 15px;font-size:16px;font-weight:600;font-family:'Raleway',sans-serif;cursor:pointer;text-align:center;transition:0.4s;">
                Login
            </button>
        </div>

        <p class="text-center text-sm font-['Raleway',sans-serif]">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-semibold hover:underline">Register</a>
        </p>
    </form>
</div>
</div>
@endsection
