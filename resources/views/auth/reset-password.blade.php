@extends('layouts.app')

@section('title', 'Reset Password | ICE')

@section('content')
<div class="bg-white">
<div class="flex flex-col items-center justify-center pt-16 pb-40">
    <h1 class="text-4xl font-medium font-['Raleway',sans-serif]">RESET PASSWORD</h1>
    <p class="mt-3 text-base font-['Raleway',sans-serif]">Please enter your new password below.</p>

    <form method="POST" action="{{ route('password.store') }}" class="w-full max-w-2xl mt-8 flex flex-col gap-8">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <input type="email" name="email" id="email" placeholder="Email" autofocus
                value="{{ old('email', $request->email) }}"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="email" class="sr-only">Email</label>
            @error('email')
                <p style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="password" name="password" id="password" placeholder="New password"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="password" class="sr-only">New password</label>
            @error('password')
                <p style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm new password"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="password_confirmation" class="sr-only">Confirm new password</label>
        </div>

        <div>
            <button type="submit"
                style="width:100%;display:block;background-color:#a8f58d;color:#fff;border:none;border-radius:30px;padding:16px 15px;font-size:16px;font-weight:600;font-family:'Raleway',sans-serif;cursor:pointer;text-align:center;transition:0.4s;">
                Reset Password
            </button>
        </div>
    </form>
</div>
</div>
@endsection
