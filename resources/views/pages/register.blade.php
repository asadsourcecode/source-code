@extends('layouts.app')

@section('title', 'Login / Register | ICE')

@section('content')
<div class="bg-white">
<div class="flex flex-col items-center justify-center pt-16 pb-40">
    <h1 class="text-4xl font-medium font-['Raleway',sans-serif]">REGISTER</h1>
    <p class="mt-3 text-base font-['Raleway',sans-serif]">Please fill in the fields below</p>

    <!-- Tabs -->
    <div class="flex gap-4 mt-8 w-full max-w-2xl">
        <button type="button" onclick="switchTab('user')" id="tab-user" class="tab-btn flex-1 py-3 px-4 text-center font-['Raleway',sans-serif] font-medium border-2 border-[#a8f58d] rounded-full transition-all duration-300 bg-[#a8f58d] text-black">
            User
        </button>
        <button type="button" onclick="switchTab('student')" id="tab-student" class="tab-btn flex-1 py-3 px-4 text-center font-['Raleway',sans-serif] font-medium border-2 border-[#a8f58d] rounded-full transition-all duration-300 bg-white text-black hover:bg-[#a8f58d]">
            Student
        </button>
        <button type="button" onclick="switchTab('teacher')" id="tab-teacher" class="tab-btn flex-1 py-3 px-4 text-center font-['Raleway',sans-serif] font-medium border-2 border-[#a8f58d] rounded-full transition-all duration-300 bg-white text-black hover:bg-[#a8f58d]">
            Teacher
        </button>
    </div>

    @if ($errors->any() && !$errors->has('login_email'))
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

        <!-- Hidden field for user type -->
        <input type="hidden" name="user_type" id="user_type" value="user">

        <div>
            <input type="text" name="first_name" id="FirstName" placeholder="First name" autofocus
                value="{{ old('first_name') }}"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="FirstName" class="sr-only">First name</label>
        </div>

        <div>
            <input type="text" name="last_name" id="LastName" placeholder="Last name"
                value="{{ old('last_name') }}"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="LastName" class="sr-only">Last name</label>
        </div>

        <div>
            <input type="email" name="email" id="Email" placeholder="Email"
                value="{{ old('email') }}"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="Email" class="sr-only">Email</label>
        </div>

        <div>
            <input type="password" name="password" id="Password" placeholder="Password"
                style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
            <label for="Password" class="sr-only">Password</label>
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
        <a href="javascript:void(0)" onclick="openLoginModal()" class="font-semibold hover:underline">Login</a>
    </p>
</div>
</div>

<script>
function switchTab(type) {
    // Reset all tabs
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('bg-[#a8f58d]');
        btn.classList.add('bg-white');
    });

    // Activate selected tab
    const activeTab = document.getElementById('tab-' + type);
    activeTab.classList.remove('bg-white');
    activeTab.classList.add('bg-[#a8f58d]');

    // Update hidden field
    document.getElementById('user_type').value = type;
}

// Set initial value from old input if exists
document.addEventListener('DOMContentLoaded', function() {
    const oldType = '{{ old('user_type') }}';
    if (oldType) {
        switchTab(oldType);
    }
});
</script>
@endsection
