<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'ICE | Integrated Character Education')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>

    <body class="min-h-screen bg-[#f7f3e8] font-sans text-[#24372f] antialiased">
        <div class="flex min-h-screen flex-col">
            @include('layouts.navbar')

            <main class="flex-1">
                @yield('content')
            </main>

            @include('layouts.footer')
        </div>
    </body>
</html>
