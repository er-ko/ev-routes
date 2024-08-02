@auth
<x-app-layout>

	<x-slot name="meta_title">{!! __($route->name) !!}</x-slot>
    <x-slot name="meta_desc">{!! __($route->name) !!}</x-slot>
    <x-slot name="tags">{!! __($route->name) !!}</x-slot>

    <x-slot name="header">
		<div class="flex justify-between items-center">
			<div class="flex items-center justify-center">
				<h2 class="my-2 mr-3 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
					{{ __('messages.route.route') }}<span class="mx-2">:</span>{{ $route->name }}
				</h2>
				@if($route->public)
					<div class="w-fit flex items-center justify-start rounded-full py-1 px-3 duration-300 hover:cursor-pointer text-white bg-teal-500 hover:bg-teal-600 dark:bg-teal-600 dark:hover:bg-teal-700">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
							<path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
						</svg>
						<span class="ml-2 lowercase text-sm hidden sm:block">{{ __('messages.public') }}</span>
					</div>
				@else
					<div class="w-fit flex items-center justify-start rounded-full py-1 px-3 duration-300 hover:cursor-pointer text-white bg-indigo-500 hover:bg-indigo-600 dark:bg-indigo-600 dark:hover:bg-indigo-700">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
							<path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
						</svg>
						<span class="ml-2 lowercase text-sm hidden sm:block">{{ __('messages.private') }}</span>
					</div>
				@endif
			</div>
			@if (Route::has('login'))
				@auth
					<a
						href="{{ route('route.index') }}"
						class="p-2 rounded-lg transition duration-400 text-gray-500 bg-gray-100 hover:text-gray-700 hover:bg-gray-200 dark:text-gray-700 dark:bg-gray-900/50 dark:hover:text-gray-600 dark:hover:bg-gray-900"
					>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
						</svg>
					</a>
				@else
					<a
						href="{{ url('/') }}"
						class="p-2 rounded-lg transition duration-400 text-gray-500 bg-gray-100 hover:text-gray-700 hover:bg-gray-200 dark:text-gray-700 dark:bg-gray-900/50 dark:hover:text-gray-600 dark:hover:bg-gray-900"
					>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
						</svg>
					</a>
				@endauth
			@endif
		</div>
    </x-slot>

    <div class="pt-8 pb-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="grid gap-4 grid-cols-1 lg:grid-cols-2 mb-20 text-gray-600 dark:text-slate-500 px-4 sm:px-0">
				<div>
					<h3 class="sm:text-lg"><strong class="text-gray-500 dark:text-slate-600">{{ __('messages.start') }}:</strong> {{ $route->from }}</h3>
				</div>
				<div class="lg:text-right">
					<h3 class="sm:text-lg"><strong class="text-gray-500 dark:text-slate-600">{{ __('messages.end') }}:</strong> {{ $route->to }}</h3>
				</div>
			</div>
			<div class="flex justify-center items-center">
				<img src="/storage/garage/{{ $route->garage->image }}" />
			</div>
			<div class="grid gap-4 grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 my-16">
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-500 dark:text-gray-600">
						<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">{{ $route->user->name }}</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-500 dark:text-gray-600">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">{{ date($settings->date_format, strtotime($route->drive_date)) }}</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center hover:cursor-pointer opacity-50 hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-yellow-400 dark:text-yellow-500">
						<path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">
						@if ($settings->temperature == $route->unit_temperature)
							{{ $route->avg_temp }}
						@else
							{{ $settings->temperature == 'F' ? number_format($route->avg_temp / 5 * 9 + 32) : number_format(($route->avg_temp - 32) / 9 * 5) }}
						@endif
						°{{ $settings->temperature }}
					</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-sky-500 dark:text-sky-600/80">
						<path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">
						@if ($settings->distance == $route->unit_distance)
							{{ $route->distance }}
						@else
							{{ $settings->distance == 'mi' ? number_format($route->distance / 1.609344, 0, '.', '') : number_format($route->distance * 1.609344, 0, '.', '') }}
						@endif
						{{ $settings->distance }}
					</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-500 dark:text-gray-600">
						<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">{{ intdiv($route->driving_time, 60).'h '. ($route->driving_time % 60) }}m</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-500 dark:text-gray-600">
						<path stroke-linecap="round" stroke-linejoin="round" d="M4.745 3A23.933 23.933 0 0 0 3 12c0 3.183.62 6.22 1.745 9M19.5 3c.967 2.78 1.5 5.817 1.5 9s-.533 6.22-1.5 9M8.25 8.885l1.444-.89a.75.75 0 0 1 1.105.402l2.402 7.206a.75.75 0 0 0 1.104.401l1.445-.889m-8.25.75.213.09a1.687 1.687 0 0 0 2.062-.617l4.45-6.676a1.688 1.688 0 0 1 2.062-.618l.213.09" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">
						@if ($settings->distance == $route->unit_distance)
							{{ $route->avg_speed }}
						@else
							{{ $settings->distance == 'mi' ? number_format($route->avg_speed * 0.621371192, 0, '.', '') : number_format($route->avg_speed / 0.621371192, 0, '.', '') }}
						@endif
						{{ $settings->distance == 'mi' ? 'mph' : 'km/h' }}
					</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-teal-500 dark:text-teal-500 relative top-1">
						<path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5h6.75V15H4.5v-4.5ZM3.75 18h15A2.25 2.25 0 0 0 21 15.75v-6a2.25 2.25 0 0 0-2.25-2.25h-15A2.25 2.25 0 0 0 1.5 9.75v6A2.25 2.25 0 0 0 3.75 18Z" />
					</svg>
					<span class="flex flex-col justify-center items-center mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">
						@if ($settings->consumption == $route->unit_consumption)
							{{ number_format($route->avg_consumption, 2, '.', '') }}
						@else
							{{ $settings->consumption == 'kWh' ? number_format($route->avg_consumption / 1.609344 / 10, 2, '.', '') : number_format($route->avg_consumption * 1.609344 * 10, 2, '.', '') }}
						@endif
						<span class="text-sm">
							{{ $settings->consumption }} / {{ $settings->consumption == 'kWh' ? '100km' : 'mi' }}
						</span>
					</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-500 dark:text-gray-600">
						<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
						<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">{{ $route->total_consumption }} kW</span>
				</div>
			</div>
			<div class="grid gap-0 lg:gap-6 grid-cols-1 lg:grid-cols-3 mb-6">
				<div class="flex justify-between items-top h-full p-10 sm:rounded-lg transition duration-400 shadow-lg hover:shadow-xl bg-white dark:text-slate-400 dark:bg-gray-800">
					<img src="/img/tesla_supercharger.png" class="w-20" />
					<div class="flex flex-col flex-1 justify-start items-start pl-10">
						<h4 class="text-2xl font-semibold mt-3 mb-8 text-slate-500 dark:text-slate-400">{{ __('messages.route.charging') }}<h4>
						<p class="font-bold"><span class="text-sm font-semibold mr-2 text-slate-500">{{ __('messages.route.charging_stops') }}:</span>{{ $route->charging_stops }}x</p>
						<p class="font-bold"><span class="text-sm font-semibold mr-2 text-slate-500">{{ __('messages.route.total_time') }}:</span>{{ intdiv($route->charging_time, 60) .'h '. ($route->charging_time % 60) .'m' }}</p>
					</div>
				</div>
				<div class="col-span-2 flex flex-col sm:flex-row justify-start items-center mt-6 lg:mt-0 p-8 sm:rounded-lg transition duration-400 shadow-lg hover:shadow-xl bg-gray-900 text-gray-200 dark:text-gray-300 dark:bg-gray-950">
					<img src="/img/piggybank.png" class="w-32 ml-8 mr-12 mb-8" />
					<div>
						<h4 class="mb-5 text-2xl font-semibold text-yellow-400">{{ __('messages.finance') }}<h4>
						<p class="font-bold"><span class="text-sm font-semibold mr-2 text-gray-500">{{ __('messages.route.price_per_kw') }}:</span>{{ $route->price_per_kw .' '. $route->currency }}</p>
						<p class="font-bold"><span class="text-sm font-semibold mr-2 text-gray-500">{{ __('messages.route.real_price') }}:</span>{{ $route->real_price .' '. $route->currency }}</p>
						<p class="font-bold"><span class="text-sm font-semibold mr-2 text-gray-500">{{ __('messages.route.estimated_price') }}:</span>{{ $route->estimated_price .' '. $route->currency }}</p>
						<p class="mt-4 pt-3 text-sm text-gray-400/80 dark:text-gray-500 border-t border-dashed border-gray-800">
							<span>Ekvivalent celkové spotřeby auta se spalovacím pohonem:</span>
							<span class="font-bold ml-1">{{ number_format((($route->avg_consumption/10) / 8.898) * ($route->range/100), 1, '.', '') }}l ({{ number_format(($route->avg_consumption/10) / 8.898, 2, '.', '') }}l / 100 km)</span>
						</p>
					</div>
				</div>
			</div>
			<div class="grid gap-0 lg:gap-6 grid-cols-1 lg:grid-cols-3">
				<div class="h-full py-12 px-4 flex flex-col justify-start items-center sm:rounded-lg transition duration-400 shadow-lg hover:shadow-xl bg-white dark:text-slate-400 dark:bg-gray-800">
					<h4 class="text-2xl font-semibold text-center text-slate-500 dark:text-slate-400">@lang('messages.route.vehicle_specifications')</h4>
					<div class="my-10">
						<div>
							<span class="mr-1 text-slate-500">{{ __('Model') .':' }}</span>
							<span class="font-semibold">{{ $route->garage->brand .' '. $route->garage->name .', '. $route->garage->year }}</span>
						</div>
						<div>
							<span class="mr-1 text-slate-500">{{ __('Battery') .':' }}</span>
							<span class="font-semibold">{{ $route->garage->battery .' kWh / '. $route->garage->voltage .' V' }}</span>
						</div>
						<div>
							<span class="mr-1 text-slate-500">{{ __('Power') .':' }}</span>
							<span class="font-semibold">{{ $route->garage->power .' kW / '. $route->garage->torque .' Nm' }}</span>
						</div>
						<div>
							<span class="mr-1 text-slate-500">{{ __('Drag coefficient') .':' }}</span>
							<span class="font-semibold">{{ $route->garage->drag_coefficient }}</span>
						</div>
						<div>
							<span class="mr-1 text-slate-500">{{ __('Load') .':' }}</span>
							<span class="font-semibold">
								@if ($settings->weight == $route->unit_weight)
									{{ $route->loaded_weight }}
								@else
									{{ $settings->weight == 'lb' ? number_format($route->loaded_weight * 2.205, 0, '.', '') : number_format($route->loaded_weight / 2.205, 0, '.', '') }}
								@endif
								{{ $settings->weight }}
							</span>
						</div>
						<div class="flex items-center justify-start">
							<span class="mr-1 text-slate-500">{{ __('Trailer') .':' }}</span>
							<span class="font-semibold">
								@if ($route->trailer)
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
										<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
									</svg>
								@else
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
										<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
									</svg>
								@endif
							</span>
						</div>
						<div>
							<span class="mr-1 text-slate-500">{{ __('Trailer weight') .':' }}</span>
							<span class="font-semibold">
								@if ($settings->weight == $route->unit_weight)
									{{ $route->trailer_weight }}
								@else
									{{ $settings->weight == 'lb' ? number_format($route->trailer_weight * 2.205, 0, '.', '') : number_format($route->trailer_weight / 2.205, 0, '.', '') }}
								@endif
								{{ $settings->weight }}
							</span>
						</div>
					</div>
					<img src="/storage/garage/{{ $route->garage->image }}" class="w-9/12 mx-auto" />
				</div>
				<div class="col-span-2 mt-6 lg:mt-0">
					<iframe
						src="https://www.google.com/maps/embed?{{ $route->map_iframe }}"
						width="100%"
						height="500"
						style="border:0"
						allowfullscreen=""
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"
						class="sm:rounded-xl transition duration-400 shadow-lg hover:shadow-xl dark:opacity-50 dark:hover:opacity-100"
					></iframe>
				</div>
			</div>
        </div>
    </div>
</x-app-layout>
@endauth
@guest
<x-public-layout>

	<x-slot name="meta_title">{!! __($route->name) !!}</x-slot>
    <x-slot name="meta_desc">{!! __($route->name) !!}</x-slot>
    <x-slot name="tags">{!! __($route->name) !!}</x-slot>

	<x-slot name="header">
		<div class="flex justify-between items-center">
			<h2 class="my-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
				{{ $route->name }}
			</h2>
			<a
				href="{{ url('/') }}"
				class="p-2 rounded-lg transition duration-400 text-gray-500 bg-gray-100 hover:text-gray-700 hover:bg-gray-200 dark:text-gray-700 dark:bg-gray-900/50 dark:hover:text-gray-600 dark:hover:bg-gray-900"
			>
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
					<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
				</svg>
			</a>
		</div>
    </x-slot>

    <div class="pt-8 lg:pb-8 xl:pb-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="grid gap-4 grid-cols-1 lg:grid-cols-2 mb-20 text-gray-600 dark:text-slate-500">
				<div>
					<h3 class="sm:text-lg"><strong class="text-gray-500 dark:text-slate-600">{{ __('messages.start') }}:</strong> {{ $route->from }}</h3>
				</div>
				<div class="lg:text-right">
					<h3 class="sm:text-lg"><strong class="text-gray-500 dark:text-slate-600">{{ __('messages.end') }}:</strong> {{ $route->to }}</h3>
				</div>
			</div>
			<div class="flex justify-center items-center">
				<img src="/storage/garage/{{ $route->garage->image }}" />
			</div>
			<div class="grid gap-4 grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 my-16">
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-500 dark:text-gray-600">
						<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">{{ $route->user->name }}</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-500 dark:text-gray-600">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">{{ date(session('date_format'), strtotime($route->drive_date)) }}</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center hover:cursor-pointer opacity-50 hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-yellow-400 dark:text-yellow-500">
						<path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">
						@if (session('temperature') == $route->unit_temperature)
							{{ $route->avg_temp }}
						@else
							{{ session('temperature') == 'F' ? number_format($route->avg_temp / 5 * 9 + 32) : number_format(($route->avg_temp - 32) / 9 * 5) }}
						@endif
						°{{ session('temperature') }}
					</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-sky-500 dark:text-sky-600/80">
						<path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">
						@if (session('distance') == $route->unit_distance)
							{{ $route->distance }}
						@else
							{{ session('distance') == 'mi' ? number_format($route->distance / 1.609344, 0, '.', '') : number_format($route->distance * 1.609344, 0, '.', '') }}
						@endif
						{{ session('distance') }}
					</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-500 dark:text-gray-600">
						<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">{{ intdiv($route->driving_time, 60).'h '. ($route->driving_time % 60) }}m</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-500 dark:text-gray-600">
						<path stroke-linecap="round" stroke-linejoin="round" d="M4.745 3A23.933 23.933 0 0 0 3 12c0 3.183.62 6.22 1.745 9M19.5 3c.967 2.78 1.5 5.817 1.5 9s-.533 6.22-1.5 9M8.25 8.885l1.444-.89a.75.75 0 0 1 1.105.402l2.402 7.206a.75.75 0 0 0 1.104.401l1.445-.889m-8.25.75.213.09a1.687 1.687 0 0 0 2.062-.617l4.45-6.676a1.688 1.688 0 0 1 2.062-.618l.213.09" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">
						@if (session('distance') == $route->unit_distance)
							{{ $route->avg_speed }}
						@else
							{{ session('distance') == 'mi' ? number_format($route->avg_speed * 0.621371192, 0, '.', '') : number_format($route->avg_speed / 0.621371192, 0, '.', '') }}
						@endif
						{{ session('distance') == 'mi' ? 'mph' : 'km/h' }}
					</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-teal-500 dark:text-teal-500 relative top-1">
						<path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5h6.75V15H4.5v-4.5ZM3.75 18h15A2.25 2.25 0 0 0 21 15.75v-6a2.25 2.25 0 0 0-2.25-2.25h-15A2.25 2.25 0 0 0 1.5 9.75v6A2.25 2.25 0 0 0 3.75 18Z" />
					</svg>
					<span class="flex flex-col justify-center items-center mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">
						@if (session('consumption') == $route->unit_consumption)
							{{ number_format($route->avg_consumption, 2, '.', '') }}
						@else
							{{ session('consumption') == 'kWh' ? number_format($route->avg_consumption / 1.609344 / 10, 2, '.', '') : number_format($route->avg_consumption * 1.609344 * 10, 2, '.', '') }}
						@endif
						<span class="text-sm">
							{{ session('consumption') }} / {{ session('consumption') == 'kWh' ? '100km' : 'mi' }}
						</span>
					</span>
				</div>
				<div class="mb-4 flex flex-col justify-center items-center opacity-50 hover:cursor-pointer hover:opacity-100 duration-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-500 dark:text-gray-600">
						<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
						<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
					</svg>
					<span class="mt-2 text-xl font-bold text-gray-500 dark:text-slate-300">{{ $route->total_consumption }} kW</span>
				</div>
			</div>
			<div class="grid gap-0 lg:gap-6 grid-cols-1 lg:grid-cols-3 mb-6">
				<div class="flex justify-between items-top h-full p-10 rounded-lg transition duration-400 shadow-lg hover:shadow-xl bg-white dark:text-slate-400 dark:bg-gray-800">
					<img src="/img/tesla_supercharger.png" class="w-20" />
					<div class="flex flex-col flex-1 justify-start items-start pl-10">
						<h4 class="text-2xl font-semibold mt-3 mb-8 text-slate-500 dark:text-slate-400">{{ __('messages.route.charging') }}<h4>
						<p class="font-bold"><span class="text-sm font-semibold mr-2 text-slate-500">{{ __('messages.route.charging_stops') }}:</span>{{ $route->charging_stops }}x</p>
						<p class="font-bold"><span class="text-sm font-semibold mr-2 text-slate-500">{{ __('messages.route.total_time') }}:</span>{{ intdiv($route->charging_time, 60) .'h '. ($route->charging_time % 60) .'m' }}</p>
					</div>
				</div>
				<div class="col-span-2 flex flex-col sm:flex-row justify-start items-center mt-6 lg:mt-0 p-8 rounded-lg transition duration-400 shadow-lg hover:shadow-xl bg-gray-900 text-gray-200 dark:text-gray-300 dark:bg-gray-950">
					<img src="/img/piggybank.png" class="w-32 ml-8 mr-12 mb-8" />
					<div>
						<h4 class="mb-5 text-2xl font-semibold text-yellow-400">{{ __('messages.finance') }}<h4>
						<p class="font-bold"><span class="text-sm font-semibold mr-2 text-gray-500">{{ __('messages.route.price_per_kw') }}:</span>{{ $route->price_per_kw .' '. $route->currency }}</p>
						<p class="font-bold"><span class="text-sm font-semibold mr-2 text-gray-500">{{ __('messages.route.real_price') }}:</span>{{ $route->real_price .' '. $route->currency }}</p>
						<p class="font-bold"><span class="text-sm font-semibold mr-2 text-gray-500">{{ __('messages.route.estimated_price') }}:</span>{{ $route->estimated_price .' '. $route->currency }}</p>
						<p class="mt-4 pt-3 text-sm text-gray-400/80 dark:text-gray-500 border-t border-dashed border-gray-800 text-right">
							<span>{{ __('messages.route.the_equivalent_of_the_total_consumption_of_a_car_with_an_combustion_engine') }}:</span><br>
							<span class="font-bold text-gray-300">
								@if (session('consumption') == $route->unit_consumption)
									@if (session('consumption') == 'kWh')
										{{ number_format(($route->avg_consumption / 8.898) * ($route->distance / 100), 2, '.', '') }}l
										( {{ number_format($route->avg_consumption / 8.898, 2, '.', '') }}l / 100km )
									@else
										{{ number_format( 33705 / $route->avg_consumption, 2, '.', '') }} MPGe
									@endif
								@else
									@if (session('consumption') == 'kWh')
										{{ number_format(($route->avg_consumption / 1.609344 / 10 / 8.898) * ($route->distance / 100), 2, '.', '') }}l
										( {{ number_format(($route->avg_consumption / 1.609344 / 10) / 8.898, 2, '.', '') }}l / 100km )
									@else
										{{ number_format( 33705 / ($route->avg_consumption * 1.609344 * 10), 2, '.', '') }} MPGe
									@endif
								@endif
							</span>
						</p>
					</div>
				</div>
			</div>
			<div class="grid gap-0 lg:gap-6 grid-cols-1 lg:grid-cols-3">
				<div class="h-full py-12 px-4 flex flex-col justify-start items-center rounded-lg transition duration-400 shadow-lg hover:shadow-xl bg-white dark:text-slate-400 dark:bg-gray-800">
					<h4 class="text-2xl font-semibold text-center text-slate-500 dark:text-slate-400">@lang('messages.route.vehicle_specifications')</h4>
					<div class="my-10">
						<div>
							<span class="mr-1 text-slate-500">{{ __('Model') .':' }}</span>
							<span class="font-semibold">{{ $route->garage->brand .' '. $route->garage->name .', '. $route->garage->year }}</span>
						</div>
						<div>
							<span class="mr-1 text-slate-500">{{ __('Battery') .':' }}</span>
							<span class="font-semibold">{{ $route->garage->battery .' kWh / '. $route->garage->voltage .' V' }}</span>
						</div>
						<div>
							<span class="mr-1 text-slate-500">{{ __('Power') .':' }}</span>
							<span class="font-semibold">{{ $route->garage->power .' kW / '. $route->garage->torque .' Nm' }}</span>
						</div>
						<div>
							<span class="mr-1 text-slate-500">{{ __('Drag coefficient') .':' }}</span>
							<span class="font-semibold">{{ $route->garage->drag_coefficient }}</span>
						</div>
						<div>
							<span class="mr-1 text-slate-500">{{ __('Load') .':' }}</span>
							<span class="font-semibold">
								@if (session('weight') == $route->unit_weight)
									{{ $route->loaded_weight }}
								@else
									{{ session('weight') == 'lb' ? number_format($route->loaded_weight * 2.205, 0, '.', '') : number_format($route->loaded_weight / 2.205, 0, '.', '') }}
								@endif
								{{ session('weight') }}
							</span>
						</div>
						<div class="flex items-center justify-start">
							<span class="mr-1 text-slate-500">{{ __('Trailer') .':' }}</span>
							<span class="font-semibold">
								@if ($route->trailer)
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
										<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
									</svg>
								@else
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
										<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
									</svg>
								@endif
							</span>
						</div>
						<div>
							<span class="mr-1 text-slate-500">{{ __('Trailer weight') .':' }}</span>
							<span class="font-semibold">
								@if (session('weight') == $route->unit_weight)
									{{ $route->trailer_weight }}
								@else
									{{ session('weight') == 'lb' ? number_format($route->trailer_weight * 2.205, 0, '.', '') : number_format($route->trailer_weight / 2.205, 0, '.', '') }}
								@endif
								{{ session('weight') }}
							</span>
						</div>
					</div>
					<img src="/storage/garage/{{ $route->garage->image }}" class="w-9/12 mx-auto" />
				</div>
				<div class="col-span-2 mt-6 lg:mt-0">
					<iframe
						src="https://www.google.com/maps/embed?{{ $route->map_iframe }}"
						width="100%"
						height="500"
						style="border:0"
						allowfullscreen=""
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"
						class="rounded-xl transition duration-400 shadow-lg hover:shadow-xl dark:opacity-50 dark:hover:opacity-100"
					></iframe>
				</div>
			</div>
        </div>
    </div>
</x-public-layout>
@endguest