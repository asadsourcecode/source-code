@extends('layouts.app')

@section('title', 'Register | ICE')

@section('content')
<div class="bg-white">
<div class="flex flex-col items-center justify-center pt-16 pb-40">

    <h1 class="text-4xl font-medium font-['Raleway',sans-serif]">REGISTER</h1>
    <p class="mt-3 text-base font-['Raleway',sans-serif]">Create your student account</p>

    @if ($errors->any())
    <div class="w-full max-w-2xl mt-6">
        <ul class="text-red-600 text-sm font-['Raleway',sans-serif] space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST" class="w-full max-w-2xl mt-8 flex flex-col gap-8">
        @csrf

        <div>
            <input type="text" name="first_name" id="FirstName" placeholder="First name" autofocus
                value="{{ old('first_name') }}"
                class="auth-form-input">
            <label for="FirstName" class="sr-only">First name</label>
        </div>

        <div>
            <input type="text" name="last_name" id="LastName" placeholder="Last name"
                value="{{ old('last_name') }}"
                class="auth-form-input">
            <label for="LastName" class="sr-only">Last name</label>
        </div>

        <div>
            <input type="email" name="email" id="Email" placeholder="Email"
                value="{{ old('email') }}"
                class="auth-form-input">
            <label for="Email" class="sr-only">Email</label>
        </div>

        <div>
            <input type="password" name="password" id="Password" placeholder="Password"
                class="auth-form-input">
            <label for="Password" class="sr-only">Password</label>
        </div>

        <div>
            <input type="password" name="password_confirmation" id="PasswordConfirm" placeholder="Confirm password"
                class="auth-form-input">
            <label for="PasswordConfirm" class="sr-only">Confirm password</label>
        </div>

        <div>
            <button type="submit" class="auth-form-submit">
                Create Account
            </button>
        </div>
    </form>

    <p class="mt-6 text-center text-sm font-['Raleway',sans-serif]">
        Already have an account?
        <a href="javascript:void(0)" onclick="openLoginModal()" class="font-semibold hover:underline">Login</a>
    </p>

</div>
</div>
@endsection
