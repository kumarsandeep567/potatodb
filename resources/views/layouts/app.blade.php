<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel-App') }}</title>

        <!-- App Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Livewire Styles -->
        @livewireStyles

        <!-- Alpine JS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>
    <body class="font-sans bg-gray-100">
        {{-- Include the navbar --}}
        @include('layouts.nav')

        {{-- Yield the content --}}
        @yield('content')

        {{-- Import the livewire scripts --}}
        @livewireScripts

        {{-- Yeild the infinite-scroll script --}}
        @yield('scripts')
    </body>
    <script>
        /*
            Prevent the images and other items from
            being draggable
        */
        window.ondragstart = function() {
            return false;
        } 
    </script>
</html>
