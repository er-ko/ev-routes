<x-public-layout>

    <x-slot name="search">
        <div id="search-area" class="absolute top-0 left-0 w-full min-h-screen hidden z-50 flex items-center justify-center bg-white/10 dark:bg-black/10">
            <div class="absolute top-6 right-6 flex items-center justify-center">
                <button id="search-close" type="button" class="p-2.5 text-sm rounded-full duration-300 text-white bg-pink-600 hover:bg-pink-700 dark:text-white dark:bg-pink-800 dark:hover:bg-pink-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="w-full max-w-2xl px-6 lg:max-w-7xl relative">
                <form method="get" action="/search">
                    <div class="flex items-center justify-between">
                        <x-search-input id="finder" type="text" class="block w-full p-16 text-xl" name="search" placeholder="{{ __('messages.try_to_find_some_route') }}.." required />
                        <button id="search" type="submit" class="absolute right-16 py-2 px-4 rounded-lg duration-300 text-teal-600 bg-teal-600/10 hover:text-white hover:bg-teal-600 dark:text-teal-600 dark:hover:text-white dark:bg-transparent dark:hover:bg-teal-600 dark:border dark:border-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.49 12 3.75 3.75m0 0-3.75 3.75m3.75-3.75H3.74V4.499" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="overflow-auto rounded-lg">
        <table class="table-auto w-full text-sm">
            <thead>
                <tr class="text-gray-600 bg-white border-b border-gray-200 dark:text-gray-500 dark:bg-gray-950 dark:border-gray-700">
                    <th class="px-2 pt-4 pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                    </th>
                    <th class="px-2 pt-4 pb-2 text-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </th>
                    <th class="px-2 pt-4 pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>
                    </th>
                    <th class="px-2 pt-4 pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                    </th>
                    <th class="px-2 pt-4 pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                        </svg>
                    </th>
                    <th class="px-2 pt-4 pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </th>
                    <th class="px-2 pt-4 pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto text-yellow-500 dark:text-yellow-400/75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                        </svg>
                    </th>
                    <th class="px-2 pt-4 pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.745 3A23.933 23.933 0 0 0 3 12c0 3.183.62 6.22 1.745 9M19.5 3c.967 2.78 1.5 5.817 1.5 9s-.533 6.22-1.5 9M8.25 8.885l1.444-.89a.75.75 0 0 1 1.105.402l2.402 7.206a.75.75 0 0 0 1.104.401l1.445-.889m-8.25.75.213.09a1.687 1.687 0 0 0 2.062-.617l4.45-6.676a1.688 1.688 0 0 1 2.062-.618l.213.09" />
                        </svg>
                    </th>                                      
                    <th class="px-2 pt-4 pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                        </svg>
                    </th>
                    <th class="px-2 pt-4 pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto text-teal-500 dark:text-teal-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5h6.75V15H4.5v-4.5ZM3.75 18h15A2.25 2.25 0 0 0 21 15.75v-6a2.25 2.25 0 0 0-2.25-2.25h-15A2.25 2.25 0 0 0 1.5 9.75v6A2.25 2.25 0 0 0 3.75 18Z" />
                        </svg>
                    </th>
                    <th class="px-2 pt-4 pb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                    </th>
                    <th class="px-2 pt-4 pb-2 rounded-tr-lg"></th>
                </tr>
            </thead>
            <tbody>
            @php $count = 0 @endphp
            @if (count($routes) == 0)
                <tr class="bg-gray-100 dark:text-gray-400 dark:bg-gray-900">
                    <td colspan="12" class="text-center py-8 italic">{{ __('messages.no_results_match_your_search') }}</td>
                </tr>
            @else
                @foreach ($routes as $route)
                    @if ($count % 2 == 0)
                        <tr class="transition duration-300 bg-gray-100 hover:bg-white dark:text-gray-400 dark:hover:bg-gray-700/25 dark:bg-gray-900">
                    @else
                        <tr class="transition duration-300 bg-gray-50 hover:bg-white dark:text-gray-400 dark:hover:bg-gray-700/25 dark:bg-gray-800/50">
                    @endif
                        <td class="p-2 pl-4 w-24 text-center whitespace-nowrap">{{ date(session('date_format'), strtotime($route->drive_date)) }}</td>
                        <td class="p-2 w-24 whitespace-nowrap">{{ $route->user->name }}</td>
                        <td class="p-2 whitespace-nowrap">{{ $route->garage->brand .' '. $route->garage->name }}</td>
                        <td class="p-2 w-full whitespace-nowrap">{{ $route->name }}</td>
                        <td class="p-2 w-20 text-center whitespace-nowrap">
                            @if (session('distance') == $route->unit_distance)
                                {{ $route->distance }}
                            @else
                                {{ session('distance') == 'mi' ? number_format($route->distance / 1.609344, 0, '.', '') : number_format($route->distance * 1.609344, 0, '.', '') }}
                            @endif
                            {{ session('distance') }}
                        </td>
                        <td class="p-2 w-20 text-center whitespace-nowrap">{{ intdiv($route->driving_time, 60).'h '. ($route->driving_time % 60) }}m</td>
                        <td class="p-2 w-16 text-center whitespace-nowrap">
                            @if (session('temperature') == $route->unit_temperature)
                                {{ $route->avg_temp }}
                            @else
                                {{ session('temperature') == 'F' ? number_format($route->avg_temp / 5 * 9 + 32) : number_format(($route->avg_temp - 32) / 9 * 5) }}
                            @endif
                            °{{ session('temperature') }}
                        </td>
                        <td class="p-2 w-16 text-center whitespace-nowrap">
                            @if (session('distance') == $route->unit_distance)
                                {{ $route->avg_speed }}
                            @else
                                {{ session('distance') == 'mi' ? number_format($route->avg_speed * 0.621371192, 0, '.', '') : number_format($route->avg_speed / 0.621371192, 0, '.', '') }}
                            @endif
                            <span class="text-xs">{{ session('distance') == 'mi' ? 'mph' : 'km/h' }}</span>
                        </td>
                        <td class="p-2 w-20 text-center whitespace-nowrap">{{ $route->total_consumption }} kWh</td>
                        <td class="p-2 w-20 text-center whitespace-nowrap">
                            <div class="flex items-center justify-center">
                                <span class="mr-0.5">
                                    @if (session('consumption') == $route->unit_consumption)
                                        {{ number_format($route->avg_consumption, 2, '.', '') }}
                                    @else
                                        {{ session('consumption') == 'kWh' ? number_format($route->avg_consumption / 1.609344 / 10, 2, '.', '') : number_format($route->avg_consumption * 1.609344 * 10, 2, '.', '') }}
                                    @endif
                                </span>
                                <div class="flex flex-col justify-center text-xs ml-1">
                                    <span class="border-b border-gray-200">{{ session('consumption') }}</span>
                                    <span>{{ session('consumption') == 'kWh' ? '100km' : 'mi' }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-2 w-12 text-center">
                            <a href="{{ $route->map_link }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mt-1 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                </svg>
                            </a>
                        </td>
                        <td class="py-2 pl-2 pr-4 w-8 text-center">
                            <div class="flex items-center justify-center">
                                <a
                                    href="{{ route('route.show', $route->id) }}"
                                    target="_self"
                                    class="transition duration-300 text-gray-400 hover:text-teal-500 dark:text-gray-400 dark:hover:text-teal-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @php $count++ @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        @if (!$routes->isEmpty())
            {{ $routes->withQueryString()->links() }}
        @endif
    </div>

    @push('slotscript')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js" integrity="sha256-sw0iNNXmOJbQhYFuC9OF2kOlD5KQKe1y5lfBn4C9Sjg=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#search-toggle').click(function(){
                    $('#wrapper').addClass('blur-lg');
                    $('#search-area').removeClass('hidden');
                    $('#finder').focus();
                });
                $('#search-close').click(function(){
                    $('#wrapper').removeClass('blur-lg');
                    $('#search-area').addClass('hidden');
                });
            });
        </script>
    @endpush
</x-public-layout>