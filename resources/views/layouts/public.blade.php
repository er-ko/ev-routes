<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.head')
    </head>
    <body class="font-sans antialiased">
        @isset($search)
            {{ $search }}
        @endisset
        <div class="z-0 wallpaper-top block absolute top-0 left-0 w-full h-full max-h-[600px] xl:shadow-xl"></div>
        <div id="wrapper" class="z-10 min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
            <div class="w-full min-h-screen max-w-2xl px-6 lg:max-w-7xl flex flex-col">
                @if(request()->routeIs('welcome') || request()->path() == 'search')
                    <div class="flex items-center justify-center my-16 z-10">
                @elseif (request()->routeIs(['route.show']))
                    <div class="fixed bottom-6 md:bottom-auto top-auto md:top-9 right-6 md:right-4 lg:bottom-6 lg:top-auto lg:right-6 xl:bottom-auto xl:top-6 flex items-center justify-center z-50">
                @else
                    <div class="absolute top-6 right-6 flex items-center justify-center">
                @endif
                    @if (!request()->routeIs(['route.show']))
                        @if (request()->path() === 'search')
                            <a href="{{ url('/') }}" type="button" class="search-close py-2.5 px-3 text-sm rounded-l-full duration-300 text-white bg-pink-600 hover:bg-pink-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </a>
                        @else
                            <button type="button" class="search-close py-2.5 px-3 text-sm rounded-l-full duration-300 text-white bg-pink-600 hover:bg-pink-700 hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        @endif
                        <button id="search-toggle" type="button" class="py-2.5 px-3 text-sm rounded-l-full duration-300 text-gray-500 bg-white hover:bg-gray-200 hover:text-black dark:bg-black dark:hover:text-white dark:hover:bg-gray-800 {{ request()->path() === 'search' ? 'hidden' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                        <div id="search-area" class="relative w-[250px] {{ request()->path() !== 'search' ? 'hidden' : '' }}">
                            <form method="get" action="/search">
                                <div class="flex items-center justify-between">
                                    <x-search-input id="finder" type="text" class="block w-full rounded-none" name="search" value="{{ request()->query('search') }}" placeholder="{{ __('messages.try_to_find_some_route') }}.." required />
                                    <button id="search" type="submit" class="absolute right-4 py-1 px-2 rounded duration-300 text-teal-600 bg-teal-600/10 hover:text-white hover:bg-teal-600 dark:text-teal-600 dark:hover:text-white dark:bg-transparent dark:hover:bg-teal-600 dark:border dark:border-teal-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.49 12 3.75 3.75m0 0-3.75 3.75m3.75-3.75H3.74V4.499" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        @guest
                            <button
                                type="button"
                                class="py-2.5 px-3 text-sm duration-300 text-gray-500 bg-white hover:bg-gray-200 hover:text-black dark:bg-black dark:hover:text-white dark:hover:bg-gray-800"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'setting-area')"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                                </svg>
                            </button>
                        @endguest
                    @endif
                    @guest
                        @if(!request()->routeIs(['route.show']))
                            <a href="{{ route('login') }}" type="button" class="py-2.5 px-3 text-sm duration-300 text-gray-500 bg-white hover:bg-gray-200 dark:bg-black dark:hover:text-white dark:hover:bg-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                        @endif
                    @endguest
                    @auth
                        <a href="{{ route('dashboard') }}" type="button" class="py-2.5 px-3 text-sm duration-300 text-gray-500 bg-white hover:bg-gray-200 dark:bg-black dark:hover:text-white dark:hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                            </svg>
                        </a>
                    @endauth
                    <button id="theme-toggle" type="button" class="py-2.5 px-3 text-sm duration-300 bg-white hover:bg-gray-200 dark:bg-black dark:hover:bg-gray-800 {{ request()->routeIs(['route.show']) ? 'rounded-full' : 'rounded-r-full' }}">
                        <svg id="theme-toggle-dark-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 hidden text-blue-300">
                            <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" />
                        </svg>
                        <svg id="theme-toggle-light-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 hidden dark:text-yellow-300/75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                        </svg>
                    </button>
                </div>
                @isset($header)
                    <header class="z-10 mt-6 mb-auto shadow rounded-xl bg-white/25 dark:bg-gray-900/40">
                        <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <main class="mb-auto z-10">
                    {{ $slot }}
                </main>

                <footer class="flex items-center justify-between mt-12 py-6 text-center text-sm border-t border-dashed text-black border-gray-200 dark:border-slate-700">
                    <small class="text-gray-600 dark:text-slate-500">
                        &copy; {{ date('Y') }}
                        <span class="ms-2 ps-2 border-l text-gray-400 border-gray-300 dark:text-slate-500 dark:border-slate-700">ev-routes.com</span>
                    </small>
                    <ul class="flex text-xs text-gray-400 dark:text-slate-500">
                        <li class="px-1"><a href="/locale/en" class="{{ app()->getLocale() == 'en' ? 'text-gray-800 dark:text-slate-400' : '' }}">en</a></li>
                        <li class="px-1"><a href="/locale/es" class="{{ app()->getLocale() == 'es' ? 'text-gray-800 dark:text-slate-400' : '' }}">es</a></li>
                    </ul>
                </footer>
            </div>
        </div>
        <x-modal name="setting-area">
            <div class="p-8">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('messages.units.unit_settings') }}
                </h2>
    
                <p class="mt-1 mb-6 pb-6 text-sm text-gray-600 dark:text-gray-400 border-b border-b-gray-100 dark:border-b-gray-700/50">
                    {{ __('messages.units.change_the_units_settings_for_this_route') }}
                </p>


                <form method="POST" action="{{ route('welcome.settings') }}">
                    @csrf
                    @method('patch')
                    <div class="mb-4">
						<x-input-label for="date-format">{{ __('messages.units.date_format') }}</x-input-label>
						<select
							name="date_format"
							id="date-format"
							class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:focus:border-teal-600 dark:focus:ring-teal-600 rounded-md shadow-sm"
						>
							<option value="m/d/y" {{ session('date_format') == 'm/d/y' ? 'selected' : '' }}>m/d/y</option>
							<option value="d/m/y" {{ session('date_format') == 'd/m/y' ? 'selected' : '' }}>d/m/y</option>
							<option value="d.m.y" {{ session('date_format') == 'd.m.y' ? 'selected' : '' }}>d.m.y</option>
							<option value="y.m.d" {{ session('date_format') == 'y.m.d' ? 'selected' : '' }}>y.m.d</option>
							<option value="y-m-d" {{ session('date_format') == 'y-m-d' ? 'selected' : '' }}>y-m-d</option>
						</select>
						<x-input-error class="mt-2" :messages="$errors->get('date_format')" />
					</div>
                    <div class="mb-4">
                        <x-input-label for="unit-distance">{{ __('messages.units.distance') }}</x-input-label>
                        <select
                            name="distance"
                            id="unit-distance"
                            class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                        >
                            <option value="mi" {{ session('distance') == 'mi' ? 'selected' : '' }}>{{ __('messages.units.miles') }} (mi)</option>
                            <option value="km" {{ session('distance') == 'km' ? 'selected' : '' }}>{{ __('messages.units.kilometers') }} (km)</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-input-label for="unit-consumption">{{ __('messages.units.consumption') }}</x-input-label>
                        <select
                            name="consumption"
                            id="unit-consumption"
                            class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                        >
                            <option value="Wh" {{ session('consumption') == 'Wh' ? 'selected' : '' }}>Wh</option>
                            <option value="kWh" {{ session('consumption') == 'kWh' ? 'selected' : '' }}>kWh</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-input-label for="unit-weight">{{ __('messages.units.weight') }}</x-input-label>
                        <select
                            name="weight"
                            id="unit-weight"
                            class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                        >
                            <option value="lb" {{ session('weight') == 'lb' ? 'selected' : '' }}>{{ __('messages.units.pounds') }} (lb)</option>
                            <option value="kg" {{ session('weight') == 'kg' ? 'selected' : '' }}>{{ __('messages.units.kilograms') }} (kg)</option>
                        </select>
                    </div>        
                    <div class="mb-4">
                        <x-input-label for="unit-temperature">{{ __('messages.units.temperature') }}</x-input-label>
                        <select
                            name="temperature"
                            id="unit-temperature"
                            class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                        >
                            <option value="F" {{ session('temperature') == 'F' ? 'selected' : '' }}>{{ __('messages.units.fahrenheit') }} (°F)</option>
                            <option value="C" {{ session('temperature') == 'C' ? 'selected' : '' }}>{{ __('messages.units.celsius') }} (°C)</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-input-label for="currency">{{ __('messages.units.currency') }}</x-input-label>
                        <select
                            name="currency"
                            id="currency"
                            class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                        >
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->iso_4217 }}" {{ session('currency') == $currency->iso_4217 ? 'selected' : '' }}>{{ $currency->iso_4217 }} ({{ $currency->symbol }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-8 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('messages.cancel') }}
                        </x-secondary-button>
        
                        <x-primary-button id="btn-unit-setting" class="ms-3" x-on:click="$dispatch('close')">
                            {{ __('messages.update') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </x-modal>
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