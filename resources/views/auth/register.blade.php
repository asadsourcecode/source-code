@extends('layouts.app')

@section('title', 'Register | ICE')

@section('content')
<div class="bg-white">
<div class="flex flex-col items-center justify-center pt-16 pb-40">
    <h1 class="text-4xl font-medium font-['Raleway',sans-serif]">REGISTER</h1>
    <p class="mt-3 text-base font-['Raleway',sans-serif]">Please fill in the fields below</p>

    <form method="POST" action="{{ route('register') }}" class="w-full max-w-2xl mt-8 flex flex-col gap-8">
        @csrf

        <div>
            <input type="text" name="first_name" id="first_name" placeholder="First name" autofocus
                value="{{ old('first_name') }}"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="first_name" class="sr-only">First name</label>
            @error('first_name')
                <p style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="text" name="last_name" id="last_name" placeholder="Last name"
                value="{{ old('last_name') }}"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="last_name" class="sr-only">Last name</label>
            @error('last_name')
                <p style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="email" name="email" id="email" placeholder="Email"
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
            @error('password')
                <p style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="password_confirmation" class="sr-only">Confirm password</label>
        </div>

        <div>
            <button type="submit"
                style="width:100%;display:block;background-color:#a8f58d;color:#fff;border:none;border-radius:30px;padding:16px 15px;font-size:16px;font-weight:600;font-family:'Raleway',sans-serif;cursor:pointer;text-align:center;transition:0.4s;">
                Create
            </button>
        </div>
    </form>

    <p class="mt-6 text-center text-sm font-['Raleway',sans-serif]">
        Already a member?
        <a href="{{ route('login') }}" class="font-semibold hover:underline">Login</a>
    </p>
</div>
</div>
@endsection
