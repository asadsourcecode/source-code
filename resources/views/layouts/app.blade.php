<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'ICE | Integrated Character Education')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>

    <body class="min-h-screen @yield('body-bg', 'bg-[#f7f3e8]') font-sans text-[#24372f] antialiased">
        <div class="flex min-h-screen flex-col">
            @include('layouts.navbar')

            <main class="flex-1">
                @yield('content')
            </main>

            @include('layouts.footer')
        </div>

        @guest
        <div id="loginModal"
            style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,0.5);align-items:center;justify-content:center;"
            onclick="if(event.target===this)closeLoginModal()">
            <div style="background:#fff;width:100%;max-width:600px;padding:48px 40px;position:relative;margin:0 16px;">

                <button onclick="closeLoginModal()"
                    style="position:absolute;top:16px;right:20px;background:none;border:none;font-size:22px;cursor:pointer;color:#333;"
                    aria-label="Close">&times;</button>

                <h2 style="text-align:center;font-size:2rem;font-weight:500;font-family:'Raleway',sans-serif;">LOGIN</h2>
                <p style="text-align:center;margin-top:12px;font-size:1rem;font-family:'Raleway',sans-serif;">Please enter your e-mail and password:</p>

                @if ($errors->has('email'))
                <p style="margin-top:16px;text-align:center;color:#dc2626;font-size:0.875rem;font-family:'Raleway',sans-serif;">
                    {{ $errors->first('email') }}
                </p>
                @endif

                <form action="{{ route('login') }}" method="POST" style="margin-top:32px;display:flex;flex-direction:column;gap:32px;">
                    @csrf

                    <div>
                        <input type="email" name="email" id="LoginEmail" placeholder="Email"
                            value="{{ old('email') }}"
                            style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
                        <label for="LoginEmail" class="sr-only">Email</label>
                    </div>

                    <div>
                        <input type="password" name="password" id="LoginPassword" placeholder="Password"
                            style="width:100%;background-color:#fff;color:#333;border:1px solid #ccc;border-radius:0;padding:16px 15px;font-size:14px;line-height:1.5;outline:none;box-shadow:none;display:block;">
                        <label for="LoginPassword" class="sr-only">Password</label>
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
                </form>
            </div>
        </div>

        <script>
            function openLoginModal()  { document.getElementById('loginModal').style.display='flex'; document.body.style.overflow='hidden'; }
            function closeLoginModal() { document.getElementById('loginModal').style.display='none'; document.body.style.overflow=''; }
            document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeLoginModal(); });
            @if ($errors->has('email'))
                openLoginModal();
            @endif
        </script>
        @endguest

        @stack('modals')
        @stack('scripts')
    </body>
</html>
