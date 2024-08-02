<x-app-layout>

	<x-slot name="meta_title">{{ __('meta.route.title.index') }}</x-slot>
    <x-slot name="meta_desc">{{ __('meta.route.desc.index') }}</x-slot>
    <x-slot name="meta_keywords">{{ __('meta.route.keywords.index') }}</x-slot>
	
	<x-slot name="header">
		<div class="flex items-center justify-between">
			<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-2">
				{{ __('messages.route.routes') }}<span class="mx-2">:</span>{{ __('messages.list') }}
			</h2>
			@if ($garage >= 1)
				<a
					href="{{ route('route.create') }}"
					class="p-2 rounded-lg transition duration-400 text-gray-500 bg-gray-100 hover:text-white hover:bg-teal-500 dark:text-gray-700 dark:bg-gray-900/50 dark:hover:text-gray-50 dark:hover:bg-teal-600"
				>
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
						<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
					</svg>
				</a>
			@endif
		</div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			@if ($driver < 1)
                <div class="mb-8 bg-orange-100 dark:bg-yellow-950 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6 text-orange-800 dark:text-gray-100">
                        {!! Str::replace(['driver', 'conductor'], '<a class="font-bold lowercase dark:text-white hover:underline" href="'. route('driver.index') .'">'. __('messages.driver.driver') .'</a>', __('messages.go_to_the_driver_and_create_your_first_person')) !!}!
                    </div>
                </div>
            @else
				@if ($garage < 1)
					<div class="mb-8 bg-orange-100 dark:bg-yellow-950 overflow-hidden shadow sm:rounded-lg">
						<div class="p-6 text-orange-800 dark:text-gray-100">
							{!! Str::replace(['garage', 'garaje'], '<a class="font-bold lowercase dark:text-white hover:underline" href="'. route('garage.index') .'">'. __('messages.garage.garage') .'</a>', __('messages.go_to_the_garage_and_create_your_first_car')) !!}!
						</div>
					</div>
				@endif
			@endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm lg:rounded-lg">

				<div class="text-gray-900 dark:text-gray-100">
					@if ($routes->isEmpty())
						<p class="py-4 italic text-center font-light dark:text-gray-400">{{ __('messages.route.create_your_first_amazing_route') }}</p>
					@else
					<div class="overflow-auto lg:rounded-lg">
						<table class="table-auto w-full text-sm">
							<thead>
								<tr class="text-gray-600 bg-gray-200 dark:bg-gray-800 border-b border-gray-300 dark:border-gray-500 dark:text-gray-500">
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
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
											<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
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
									<th class="px-2 pt-4 pb-2">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-auto">
											<path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
										</svg>
									</th>
									<th class="px-2 pt-4 pb-2"></th>
								</tr>
							</thead>
							<tbody>
								@php $count = 0 @endphp
								@foreach ($routes as $route)
									@if ($count % 2 == 0)
										<tr class="transition duration-300 bg-gray-100 hover:bg-white dark:text-gray-400 dark:hover:bg-gray-700/25 dark:bg-gray-900">
									@else
										<tr class="transition duration-300 bg-gray-50 hover:bg-white dark:text-gray-400 dark:hover:bg-gray-700/25 dark:bg-gray-800/50">
									@endif
									<td class="p-2 pl-4 w-24 text-center whitespace-nowrap">{{ date($settings->date_format, strtotime($route->drive_date)) }}</td>
									<td class="p-2 w-24 whitespace-nowrap">{{ $route->user->name }}</td>
									<td class="p-2 whitespace-nowrap">{{ $route->garage->brand .' '. $route->garage->name }}</td>
									<td class="p-2 w-full whitespace-nowrap">{{ $route->name }}</td>
									<td class="p-2 w-20 text-center whitespace-nowrap">
										@if ($settings->distance == $route->unit_distance)
											{{ $route->distance }}
										@else
											{{ $settings->distance == 'mi' ? number_format($route->distance / 1.609344, 0, '.', '') : number_format($route->distance * 1.609344, 0, '.', '') }}
										@endif
										{{ $settings->distance }}
									</td>
									<td class="p-2 w-20 text-center whitespace-nowrap">{{ intdiv($route->driving_time, 60).'h '. ($route->driving_time % 60) }}m</td>
									<td class="p-2 w-16 text-center whitespace-nowrap">
										@if ($settings->temperature == $route->unit_temperature)
											{{ $route->avg_temp }}
										@else
											{{ $settings->temperature == 'F' ? number_format($route->avg_temp / 5 * 9 + 32) : number_format(($route->avg_temp - 32) / 9 * 5) }}
										@endif
										°{{ $settings->temperature }}
									</td>
									<td class="p-2 w-16 text-center whitespace-nowrap">
										@if ($settings->distance == $route->unit_distance)
											{{ $route->avg_speed }}
										@else
											{{ $settings->distance == 'mi' ? number_format($route->avg_speed * 0.621371192, 0, '.', '') : number_format($route->avg_speed / 0.621371192, 0, '.', '') }}
										@endif
										<span class="text-xs">{{ $settings->distance == 'mi' ? 'mph' : 'km/h' }}</span>
									</td>
									<td class="p-2 w-20 text-center whitespace-nowrap">{{ $route->total_consumption }} kW</td>
									<td class="p-2 w-20 text-center whitespace-nowrap">
										<div class="flex items-center justify-center">
											<span class="mr-0.5">
												@if ($settings->consumption == $route->unit_consumption)
													{{ number_format($route->avg_consumption, 2, '.', '') }}
												@else
													{{ $settings->consumption == 'kWh' ? number_format($route->avg_consumption / 1.609344 / 10, 2, '.', '') : number_format($route->avg_consumption * 1.609344 * 10, 2, '.', '') }}
												@endif
											</span>
											<div class="flex flex-col justify-center text-xs ml-1">
												<span class="border-b border-gray-200">{{ $settings->consumption }}</span>
												<span>{{ $settings->consumption == 'kWh' ? '100km' : 'mi' }}</span>
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
									<td class="p-2 w-12 text-center">
										@if ($route->public)
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mt-1 text-teal-600">
												<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
											</svg>
										@else
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mt-1 text-pink-600">
												<path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
											</svg>
										@endif
									</td>
									<td class="p-2 w-16 text-center">
										<div class="flex items-center justify-center">
											<a
												href="{{ route('route.show', $route->id) }}"
												target="_self"
												class="relative top-0.5 me-1 transition duration-400 text-gray-400 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
													<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
													<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
												</svg>
											</a>
											@if ($route->user->is(auth()->user()))
												<a
													href="{{ route('route.edit', $route->id) }}"
													target="_self"
													class="relative top-0.5 ms-1 transition duration-400 text-gray-400 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300"
												>
														<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
															<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 0 1-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 1 1-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 0 1 6.336-4.486l-3.276 3.276a3.004 3.004 0 0 0 2.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852Z" />
															<path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008Z" />
														</svg>
												</a>
											@endif
										</div>
									</td>
								</tr>
								@php $count++ @endphp
							@endforeach
							</tbody>
						</table>
					</div>
					@endif
				</div>
            </div>
			@if (!$routes->isEmpty())
				<div class="mt-4">
					{{ $routes->links() }}
				</div>
			@endif
        </div>
    </div>
</x-app-layout>