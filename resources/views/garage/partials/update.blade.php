<section class="space-y-6">
    <header class="flex justify-between items-center">
        <h2 class="text-lg flex justify-start items-center text-gray-900 dark:text-slate-400">
            <img src="/storage/garage/{{ $car->image }}" class="h-14 mr-6" />
			<div class="flex flex-col">
				<span class="text-sm text-slate-600 dark:text-slate-500">{{ $car->nickname }}</span>
				<span class="flex items-center">{{ $car->brand .' '. $car->name }}<span class="ml-1.5 py-1 px-2 rounded-xl text-xs bg-slate-200 text-slate-600 dark:bg-slate-700 dark:text-slate-300">{{ $car->year }}</span></span>
			</div>
        </h2>
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
	<div x-show="open" class="pt-6 border-t border-dashed border-slate-200 dark:border-gray-700/75" style="display: none">
		<form method="POST" action="{{ route('garage.update', $car) }}" enctype="multipart/form-data">
			@csrf
			@method('patch')
			<div class="grid gap-8 grid-cols-1 lg:grid-cols-2">
				<div class="grid gap-4 grid-cols-1">
					<div class="grid gap-4 grid-cols-3">
						<div class="col-span-2">
							<x-input-label for="brand">{{ __('messages.garage.brand') }}</x-input-label>
							<x-text-input id="brand" name="brand" type="text" class="brand-name mt-1 block w-full" :value="old('brand', $car->brand)" required autofocus autocomplete="brand" />
							<x-input-error class="mt-2" :messages="$errors->get('brand')" />
						</div>
						<div>
							<x-input-label for="year">{{ __('messages.garage.year') }}</x-input-label>
							<x-text-input id="year" name="year" type="number" class="mt-1 block w-full" :value="old('year', $car->year)" step="1" max="{{ date('Y') }}" required />
							<x-input-error class="mt-2" :messages="$errors->get('year')" />
						</div>
					</div>
					<div class="grid gap-4 grid-cols-2">
						<div>
							<x-input-label for="name">{{ __('messages.garage.name') }}</x-input-label>
							<x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $car->name)" required />
							<x-input-error class="mt-2" :messages="$errors->get('name')" />
						</div>
						<div>
							<x-input-label for="nickname">{{ __('messages.garage.nickname') }}</x-input-label>
							<x-text-input id="nickname" name="nickname" type="text" class="mt-1 block w-full" :value="old('nickname', $car->nickname)" placeholder="{{ __('rocket') }}" required />
							<x-input-error class="mt-2" :messages="$errors->get('nickname')" />
						</div>
					</div>
					<div class="grid gap-4 grid-cols-2">
						<div>
							<x-input-label for="battery">{{ __('messages.garage.battery') }} [kWh]</x-input-label>
							<x-text-input id="battery" name="battery" type="number" class="mt-1 block w-full" :value="old('battery', $car->battery)" min="10" max="200" step="1" required />
							<x-input-error class="mt-2" :messages="$errors->get('battery')" />
						</div>
						<div>
							<x-input-label for="voltage">{{ __('messages.garage.voltage') }} [V]</x-input-label>
							<select
								name="voltage"
								id="voltage"
								class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:focus:border-teal-600 dark:focus:ring-teal-600 rounded-md shadow-sm"
							>
								<option {{ $car->voltage == 400 ? 'selected' : '' }}>400</option>
								<option {{ $car->voltage == 800 ? 'selected' : '' }}>800</option>
							</select>
							<x-input-error class="mt-2" :messages="$errors->get('voltage')" />
						</div>
					</div>
					<div class="grid gap-4 grid-cols-3">
						<div>
							<x-input-label for="power">{{ __('messages.garage.power') }} [kW]</x-input-label>
							<x-text-input id="power" name="power" type="number" class="mt-1 block w-full" :value="old('power', $car->power)" min="0" max="4000" step="1" required />
							<x-input-error class="mt-2" :messages="$errors->get('power')" />
						</div>
						<div>
							<x-input-label for="torque">{{ __('messages.garage.torque') }} [Nm]</x-input-label>
							<x-text-input id="torque" name="torque" type="number" class="mt-1 block w-full" :value="old('torque', $car->torque)" min="0" max="4000" step="1" required />
							<x-input-error class="mt-2" :messages="$errors->get('torque')" />
						</div>
						<div>
							<x-input-label for="drag-coefficient">{{ __('messages.garage.drag_coefficient') }}</x-input-label>
							<x-text-input id="drag-coefficient" name="drag_coefficient" type="number" class="mt-1 block w-full" :value="old('drag_coefficient', $car->drag_coefficient)" min="0.10" max="0.99" step="0.01" required />
							<x-input-error class="mt-2" :messages="$errors->get('drag_coefficient')" />
						</div>
					</div>
				</div>
				<div>
					<div class="block mb-1 px-3 font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('messages.garage.image') }}</div>
					<label
						for="image"
						id="dropcontainer"
						class="drop-container relative flex flex-col justify-center items-center py-20 rounded-lg hover:cursor-pointer dark:text-gray-400 hover:bg-neutral-200 dark:hover:bg-gray-700/20 border border-dashed border-gray-300 hover:border-slate-400 dark:border-gray-700 dark:hover:border-gray-600/50"
					>
						<span class="drop-title mb-2">{{ __('messages.garage.drop_file_here') }}</span>{{ __('messages.or') }}
						<input type="file" name="image" id="image" class="mt-4 p-2 rounded-lg dark:text-gray-500 bg-white dark:bg-gray-900 border border-gray-300 dark:border-slate-700" accept="image/*">
					</label>
				</div>
			</div>
			<div class="flex items-center justify-end mt-6">
				<x-primary-button>{{ __('messages.update') }}</x-primary-button>
			</div>
		</form>
	</div>
</section>