<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-2">
            {{ __('messages.dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($my['driver'] < 1)
                <div class="mb-8 bg-orange-100 dark:bg-yellow-950 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6 text-orange-800 dark:text-gray-100">
                        {!! Str::replace(['driver', 'conductor'], '<a class="font-bold lowercase dark:text-white hover:underline" href="'. route('driver.index') .'">'. __('messages.driver.driver') .'</a>', __('messages.go_to_the_driver_and_create_your_first_person')) !!}!
                    </div>
                </div>
            @else
                @if ($my['garage'] < 1)
                    <div class="mb-8 bg-orange-100 dark:bg-yellow-950 overflow-hidden shadow sm:rounded-lg">
                        <div class="p-6 text-orange-800 dark:text-gray-100">
                            {!! Str::replace(['garage', 'garaje'], '<a class="font-bold lowercase dark:text-white hover:underline" href="'. route('garage.index') .'">'. __('messages.garage.garage') .'</a>', __('messages.go_to_the_garage_and_create_your_first_car')) !!}!
                        </div>
                    </div>
                @endif
            @endif
            <div class="grid gap-8 grid-cols-1 md:grid-cols-2">
                
                {{-- my data --}}
                @include('dashboard.partials.my')


                {{-- all data --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center justify-start mt-4 mb-8 px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            <h2 class="font-semibold text-xl">{{ __('messages.all_data') }}</h2>
                        </div>
                        <table class="w-full">
                            <tbody>
                                <tr class="hover:cursor-pointer bg-gray-50 hover:bg-gray-50/50 dark:bg-gray-900/50 dark:hover:bg-gray-900/25">
                                    <td class="px-4 py-2">
                                        <span class="flex items-center justify-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                            </svg>
                                            number of cars
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 font-bold">{{ $all['garage'] }} <span class="font-normal text-xs">x</span></td>
                                </tr>
                                <tr class="hover:cursor-pointer hover:bg-gray-50/50 dark:hover:bg-gray-900/25">
                                    <td class="px-4 py-2">
                                        <span class="flex items-center justify-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                            </svg>
                                            number of routes
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 font-bold">{{ $all['routes_no'] }} <span class="font-normal text-xs">x</span></td>
                                </tr>
                                <tr class="hover:cursor-pointer bg-gray-50 hover:bg-gray-50/50 dark:bg-gray-900/50 dark:hover:bg-gray-900/25">
                                    <td class="px-4 py-2">
                                        <span class="flex items-center justify-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                            </svg>
                                            total distance
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 font-bold">{{ number_format($all['routes_distance'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings['distance'] }}</span></td>
                                </tr>
                                <tr class="hover:cursor-pointer hover:bg-gray-50/50 dark:hover:bg-gray-900/25">
                                    <td class="px-4 py-2">
                                        <span class="flex items-center justify-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                                            </svg>
                                            avg. temperature
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 font-bold">{{ number_format($all['routes_avg_temp'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings->temperature }}</span></td>
                                </tr>
                                <tr class="hover:cursor-pointer bg-gray-50 hover:bg-gray-50/50 dark:bg-gray-900/50 dark:hover:bg-gray-900/25">
                                    <td class="px-4 py-2">
                                        <span class="flex items-center justify-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.745 3A23.933 23.933 0 0 0 3 12c0 3.183.62 6.22 1.745 9M19.5 3c.967 2.78 1.5 5.817 1.5 9s-.533 6.22-1.5 9M8.25 8.885l1.444-.89a.75.75 0 0 1 1.105.402l2.402 7.206a.75.75 0 0 0 1.104.401l1.445-.889m-8.25.75.213.09a1.687 1.687 0 0 0 2.062-.617l4.45-6.676a1.688 1.688 0 0 1 2.062-.618l.213.09" />
                                            </svg>
                                            avg. speed
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 font-bold">{{ number_format($all['routes_avg_speed'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings->distance == 'mi' ? 'mph' : 'km/h' }}</span></td>
                                </tr>
                                <tr class="hover:cursor-pointer hover:bg-gray-50/50 dark:hover:bg-gray-900/25">
                                    <td class="px-4 py-2">
                                        <span class="flex items-center justify-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5h6.75V15H4.5v-4.5ZM3.75 18h15A2.25 2.25 0 0 0 21 15.75v-6a2.25 2.25 0 0 0-2.25-2.25h-15A2.25 2.25 0 0 0 1.5 9.75v6A2.25 2.25 0 0 0 3.75 18Z" />
                                            </svg>
                                            avg. consumption
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 font-bold">{{ number_format($all['routes_avg_consumption'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings['consumption'] == 'Wh' ? 'Wh/mi' : 'kWh / 100 km' }}</span></td>
                                </tr>
                                <tr class="hover:cursor-pointer bg-gray-50 hover:bg-gray-50/50 dark:bg-gray-900/50 dark:hover:bg-gray-900/25">
                                    <td class="px-4 py-2">
                                        <span class="flex items-center justify-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                                            </svg>
                                            total consumption
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 font-bold">{{ number_format($all['routes_total_consumption'], 0) }} <span class="font-normal text-xs">kW</span></td>
                                </tr>
                                <tr class="hover:cursor-pointer hover:bg-gray-50/50 dark:hover:bg-gray-900/25">
                                    <td class="px-4 py-2">
                                        <span class="flex items-center justify-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                            </svg>
                                            supplied energy
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 font-bold">{{ $all['routes_supplied_energy'] }} <span class="font-normal text-xs">kW</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
