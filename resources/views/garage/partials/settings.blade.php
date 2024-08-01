<section class="space-y-6">
	<header class="flex justify-between items-center">
		<div>
			<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
				{{ __('messages.units.unit_settings') }}
			</h2>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
				{{ __('messages.units.the_units_settings_is_used_for_both_data_entry_and_display') }}
			</p>
		</div>
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
		<form method="POST" action="{{ route('garage.settings') }}">
			@csrf
			@method('patch')
			<div class="grid gap-8 grid-cols-1 md:grid-cols-2">

				<div class="grid gap-6 grid-cols-1">
					<div>
						<x-input-label for="distance">{{ __('messages.units.distance') }}</x-input-label>
						<select
							name="distance"
							id="distance"
							class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:focus:border-teal-600 dark:focus:ring-teal-600 rounded-md shadow-sm"
						>
							<option value="mi" {{ $settings->distance == 'mi' ? 'selected' : '' }}>{{ __('messages.units.miles') }} (mi)</option>
							<option value="km" {{ $settings->distance == 'km' ? 'selected' : '' }}>{{ __('messages.units.kilometers') }} (km)</option>
						</select>
						<x-input-error class="mt-2" :messages="$errors->get('distance')" />
					</div>
					<div>
						<x-input-label for="consumption">{{ __('messages.units.consumption') }}</x-input-label>
						<select
							name="consumption"
							id="consumption"
							class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:focus:border-teal-600 dark:focus:ring-teal-600 rounded-md shadow-sm"
						>
							<option value="Wh" {{ $settings->consumption == 'Wh' ? 'selected' : '' }}>Wh / mi</option>
							<option value="kWh" {{ $settings->consumption == 'kWh' ? 'selected' : '' }}>kWh / 100 km</option>
						</select>
						<x-input-error class="mt-2" :messages="$errors->get('consumption')" />
					</div>
					<div>
						<x-input-label for="weight">{{ __('messages.units.weight') }}</x-input-label>
						<select
							name="weight"
							id="weight"
							class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:focus:border-teal-600 dark:focus:ring-teal-600 rounded-md shadow-sm"
						>
							<option value="lb" {{ $settings->weight == 'lb' ? 'selected' : '' }}>{{ __('messages.units.pounds') }} (lb)</option>
							<option value="kg" {{ $settings->weight == 'kg' ? 'selected' : '' }}>{{ __('messages.units.kilograms') }} (kg)</option>
						</select>
						<x-input-error class="mt-2" :messages="$errors->get('weight')" />
					</div>
				</div>

				<div class="grid gap-6 grid-cols-1">
					<div>
						<x-input-label for="date-format">{{ __('messages.units.date_format') }}</x-input-label>
						<select
							name="date_format"
							id="date-format"
							class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:focus:border-teal-600 dark:focus:ring-teal-600 rounded-md shadow-sm"
						>
							<option value="m/d/y" {{ $settings->date_format == 'm/d/y' ? 'selected' : '' }}>m/d/y</option>
							<option value="d/m/y" {{ $settings->date_format == 'd/m/y' ? 'selected' : '' }}>d/m/y</option>
							<option value="d.m.y" {{ $settings->date_format == 'd.m.y' ? 'selected' : '' }}>d.m.y</option>
							<option value="y.m.d" {{ $settings->date_format == 'y.m.d' ? 'selected' : '' }}>y.m.d</option>
							<option value="y-m-d" {{ $settings->date_format == 'y-m-d' ? 'selected' : '' }}>y-m-d</option>
						</select>
						<x-input-error class="mt-2" :messages="$errors->get('date_format')" />
					</div>
					<div>
						<x-input-label for="temperature">{{ __('messages.units.temperature') }}</x-input-label>
						<select
							name="temperature"
							id="temperature"
							class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:focus:border-teal-600 dark:focus:ring-teal-600 rounded-md shadow-sm"
						>
							<option value="F" {{ $settings->temperature == 'F' ? 'selected' : '' }}>{{ __('messages.units.fahrenheit') }} (°F)</option>
							<option value="C" {{ $settings->temperature == 'C' ? 'selected' : '' }}>{{ __('messages.units.celsius') }} (°C)</option>
						</select>
						<x-input-error class="mt-2" :messages="$errors->get('temperature')" />
					</div>
					<div>
						<x-input-label for="currency">{{ __('messages.units.currency') }}</x-input-label>
						<select
							name="currency"
							id="currency"
							class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-idnigo-500 focus:ring-indigo-500 dark:focus:border-teal-600 dark:focus:ring-teal-600 rounded-md shadow-sm"
						>
							@foreach($currencies as $currency)
								<option value="{{ $currency->iso_4217 }}" {{ $settings->currency == $currency->iso_4217 ? 'selected' : '' }}>{{ $currency->iso_4217 }} ({{ $currency->symbol }})</option>
							@endforeach
						</select>
						<x-input-error class="mt-2" :messages="$errors->get('currency')" />
					</div>
				</div>
			</div>
			<div class="flex items-center justify-end mt-4">
				<x-primary-button>{{ __('messages.update') }}</x-primary-button>
			</div>
		</form>
	</div>
</section>