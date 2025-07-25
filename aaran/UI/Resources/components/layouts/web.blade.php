<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('/favicon.ico') }}" sizes="any">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('custom-style')

    <!-- Styles -->
    @fluxAppearance
</head>
<body class="font-sans antialiased ">

<div class="w-full">

{{--    <x-Ui::menu.web.top-menu/>--}}
    <x-Ui::menu.web.top-menu/>

    <!-- Page Content -->
    <main class="w-full dark:bg-dark">
        {{ $slot }}
    </main>
</div>

@stack('modals')

@fluxScripts

@stack('custom-scripts')
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>

</body>
</html>
