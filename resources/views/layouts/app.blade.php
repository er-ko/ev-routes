<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.head')

        <!-- Styles -->
        @stack('slotstyle')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .checkbox-wrapper-toggle input[type="checkbox"] { visibility: hidden; display: none }
            .checkbox-wrapper-toggle .toggle { display: flex; cursor: pointer; -webkit-tap-highlight-color: transparent; transform: translate3d(0, 0, 0) }
            .checkbox-wrapper-toggle .toggle:before { content: ""; position: relative; top: 3px; left: 3px; width: 34px; height: 14px; display: block; background: #9A9999; border-radius: 8px; transition: background 0.2s ease }
            .checkbox-wrapper-toggle .toggle span { position: absolute; top: 0; left: 0; width: 20px; height: 20px; display: block; background: white; border-radius: 10px; box-shadow: 0 3px 8px rgba(154, 153, 153, 0.5); transition: all 0.2s ease }
            .checkbox-wrapper-toggle .toggle span:before { content: ""; position: absolute; display: block; margin: -18px; width: 56px; height: 56px; background: rgba(79, 46, 220, 0.5); border-radius: 50%; transform: scale(0); opacity: 1; pointer-events: none }
            .checkbox-wrapper-toggle #toggle:checked + .toggle:before { background: #bfdbfe }
            .checkbox-wrapper-toggle #toggle:checked + .toggle span { background: #3b82f6; transform: translateX(20px); transition: all 0.2s cubic-bezier(0.8, 0.4, 0.3, 1.25), background 0.15s ease; box-shadow: 0 3px 8px rgba(79, 46, 220, 0.2) }
            .checkbox-wrapper-toggle #toggle:checked + .toggle span:before { transform: scale(1); opacity: 0; transition: all 0.4s ease }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <div class="absolute top-3 right-14 md:right-3">
                <button id="theme-toggle" type="button" class="p-2.5 text-sm rounded-lg duration-300 text-gray-500 bg-gray-100 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-black">
                    <svg id="theme-toggle-dark-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 hidden text-blue-300">
                        <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" />
                    </svg>
                    <svg id="theme-toggle-light-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 hidden dark:text-yellow-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                </button>
            </div>
            @if (!request()->routeIs(['route.create', 'route.show', 'route.edit']))
                @include('layouts.navigation')
            @endif

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @if (in_array(session('status'), ['created', 'updated']))
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 30000)"
                        class="mb-8 bg-orange-100 dark:bg-yellow-950 overflow-hidden shadow sm:rounded-lg"
                    >
                        {{ __('messages.'. session('status')) }}
                    </p>
                @endif
                {{ $slot }}
            </main>
        </div>
        @stack('slotscript')
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
