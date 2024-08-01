<div x-data="{ open: false, respoOpen() { this.open = window.innerWidth >= 1024 } }" class="mb-4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" x-init="respoOpen()">
	<section class="space-y-6">
		<header class="flex justify-between items-center">
			<h2 class="font-semibold text-xl dark:text-gray-400">{{ __('messages.my_data') }}</h2>
			<button
				type="button" @click="open = !open"
				class="p-2 rounded-lg transition duration-400 text-gray-500 bg-gray-50 hover:text-gray-700 hover:bg-gray-100 dark:text-gray-700 dark:bg-gray-900/50 dark:hover:text-gray-600 dark:hover:bg-gray-900">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5" x-show="!open" @click="open = false">
					<path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
				</svg>
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5" x-show="open" @click="open = true">
					<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
				</svg>
			</button>
		</header>
		<section x-show="open" class="pt-6 border-t border-dashed border-slate-200 dark:border-gray-700/75" style="display: none">
			<table class="w-full dark:text-gray-500">
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
						<td class="px-4 py-2 font-bold">{{ $my['garage'] }} <span class="font-normal text-xs">x</span></td>
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
						<td class="px-4 py-2 font-bold">{{ $my['routes_no'] }} <span class="font-normal text-xs">x</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my['routes_distance'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings['distance'] }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my['routes_avg_temp'], 2, '.', ' ') }} <span class="font-normal text-xs">°{{ $settings->temperature }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my['routes_avg_speed'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings->distance == 'mi' ? 'mph' : 'km/h' }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my['routes_avg_consumption'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings['consumption'] == 'Wh' ? 'Wh/mi' : 'kWh / 100 km' }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my['routes_total_consumption'], 0) }} <span class="font-normal text-xs">kW</span></td>
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
						<td class="px-4 py-2 font-bold">{{ $my['routes_supplied_energy'] }} <span class="font-normal text-xs">kW</span></td>
					</tr>
				</tbody>
			</table>
		</section>
	</section>
</div>

{{-- my data without trailer --}}
<div x-data="{ open: false }" class="mb-4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
	<section class="space-y-6">
		<header class="flex justify-between items-center">
			<h2 class="font-semibold text-xl dark:text-gray-400">{{ __('messages.my_data') .' '. __('messages.without_trailer') }}</h2>
			<button
				type="button" @click="open = !open"
				class="p-2 rounded-lg transition duration-400 text-gray-500 bg-gray-50 hover:text-gray-700 hover:bg-gray-100 dark:text-gray-700 dark:bg-gray-900/50 dark:hover:text-gray-600 dark:hover:bg-gray-900">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5" x-show="!open" @click="open = false">
					<path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
				</svg>
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5" x-show="open" @click="open = true">
					<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
				</svg>
			</button>
		</header>
		<section x-show="open" class="pt-6 border-t border-dashed border-slate-200 dark:border-gray-700/75" style="display: none">
			<table class="w-full dark:text-gray-500">
				<tbody>
					<tr class="hover:cursor-pointer bg-gray-50 hover:bg-gray-50/50 dark:bg-gray-900/50 dark:hover:bg-gray-900/25">
						<td class="px-4 py-2">
							<span class="flex items-center justify-start">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-3">
									<path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
								</svg>
								total distance
							</span>
						</td>
						<td class="px-4 py-2 font-bold">{{ number_format($my_without_trailer['routes_distance'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings['distance'] }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my_without_trailer['routes_avg_temp'], 2, '.', ' ') }} <span class="font-normal text-xs">°{{ $settings->temperature }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my_without_trailer['routes_avg_speed'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings->distance == 'mi' ? 'mph' : 'km/h' }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my_without_trailer['routes_avg_consumption'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings['consumption'] == 'Wh' ? 'Wh/mi' : 'kWh / 100 km' }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my_without_trailer['routes_total_consumption'], 0) }} <span class="font-normal text-xs">kW</span></td>
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
						<td class="px-4 py-2 font-bold">{{ $my_without_trailer['routes_supplied_energy'] }} <span class="font-normal text-xs">kW</span></td>
					</tr>
				</tbody>
			</table>
		</section>
	</section>
</div>

{{-- my data with trailer --}}
<div x-data="{ open: false }" class="mb-4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
	<section class="space-y-6">
		<header class="flex justify-between items-center">
			<h2 class="font-semibold text-xl dark:text-gray-400">{{ __('messages.my_data') .' '. __('messages.with_trailer') }}</h2>
			<button
				type="button" @click="open = !open"
				class="p-2 rounded-lg transition duration-400 text-gray-500 bg-gray-50 hover:text-gray-700 hover:bg-gray-100 dark:text-gray-700 dark:bg-gray-900/50 dark:hover:text-gray-600 dark:hover:bg-gray-900">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5" x-show="!open" @click="open = false">
					<path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
				</svg>
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5" x-show="open" @click="open = true">
					<path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
				</svg>
			</button>
		</header>
		<section x-show="open" class="pt-6 border-t border-dashed border-slate-200 dark:border-gray-700/75" style="display: none">
			<table class="w-full dark:text-gray-500">
				<tbody>
					<tr class="hover:cursor-pointer bg-gray-50 hover:bg-gray-50/50 dark:bg-gray-900/50 dark:hover:bg-gray-900/25">
						<td class="px-4 py-2">
							<span class="flex items-center justify-start">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-3">
									<path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
								</svg>
								total distance
							</span>
						</td>
						<td class="px-4 py-2 font-bold">{{ number_format($my_with_trailer['routes_distance'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings['distance'] }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my_with_trailer['routes_avg_temp'], 2, '.', ' ') }} <span class="font-normal text-xs">°{{ $settings->temperature }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my_with_trailer['routes_avg_speed'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings->distance == 'mi' ? 'mph' : 'km/h' }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my_with_trailer['routes_avg_consumption'], 2, '.', ' ') }} <span class="font-normal text-xs">{{ $settings['consumption'] == 'Wh' ? 'Wh/mi' : 'kWh / 100 km' }}</span></td>
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
						<td class="px-4 py-2 font-bold">{{ number_format($my_with_trailer['routes_total_consumption'], 0) }} <span class="font-normal text-xs">kW</span></td>
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
						<td class="px-4 py-2 font-bold">{{ $my_with_trailer['routes_supplied_energy'] }} <span class="font-normal text-xs">kW</span></td>
					</tr>
				</tbody>
			</table>
		</section>
	</section>
</div>