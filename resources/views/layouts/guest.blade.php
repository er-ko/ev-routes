<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ev-routes.com') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="favicon.ico">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .bg-img { background-image: url("/img/world_map_light.png"); background-size: 100% 100% }
            .dark .dark\:bg-img-dark { background-image: url("/img/world_map_dark.png"); background-size: 100% 100% }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col items-center sm:justify-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="fixed bottom-6 right-6 z-50">
                <button id="theme-toggle" type="button" class="p-2.5 text-sm rounded-full duration-300 bg-white hover:bg-gray-200 dark:bg-black dark:hover:bg-slate-800">
                    <svg id="theme-toggle-dark-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 hidden text-blue-300">
                        <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" />
                    </svg>
                    <svg id="theme-toggle-light-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 hidden dark:text-yellow-300/75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                </button>
            </div>
            <div>
                <a href="/" class="block mb-4 w-[413px] h-[200px] bg-img dark:bg-img-dark">{{-- <x-application-logo /> --}}</a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
            @if (Route::has('login'))
                @if (Route::has('register'))
                    @if (request()->routeIs('login'))
                        <div class="w-full sm:max-w-md mt-2 px-6 py-4 flex justify-end">
                            <span class="mr-2 text-sm text-gray-500 dark:text-gray-500">{{ __('messages.auth.dont_have_an_account') }}?</span>
                            <a
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-teal-600 dark:focus:ring-offset-gray-800"
                                href="{{ route('register') }}">
                                {{ __('messages.auth.register_now') }}!
                            </a>
                    @endif
                @endif
            @endif
        </div>
        <script>
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
        <script src="{{ asset('js/darkmode.js') }}"></script>
    </body>
</html>
