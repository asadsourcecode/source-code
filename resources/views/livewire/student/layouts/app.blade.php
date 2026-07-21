<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Student Portal | ICE' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-[#FBF9F8] font-sans antialiased">

<div class="min-h-screen flex flex-col">

    @include('livewire.student.layouts.navbar')

    <main class="flex-1 min-h-0 {{ $fullBleed ?? false ? 'flex flex-col overflow-hidden' : 'portal-main' }}">
        @yield('portal-content')
    </main>

</div>

</body>
</html>
