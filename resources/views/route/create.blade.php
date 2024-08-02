<x-app-layout>

    <x-slot name="meta_title">{{ __('meta.route.title.create') }}</x-slot>
    <x-slot name="meta_desc">{{ __('meta.route.desc.create') }}</x-slot>
    <x-slot name="meta_keywords">{{ __('meta.route.keywords.create') }}</x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="me-8 font-semibold text-xl w-full text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-start">
                {{ __('messages.route.route') }}<span class="mx-2 text-gray-500">:</span>
                <input type="text" id="name" class="grow font-light border-0 border-b border-b-gray-300/75 dark:border-b-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600" placeholder="{{ __('messages.route.name_of_the_route') }}" autofocus required />
            </h2>
            <div class="flex items-center justify-center">
                <a
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'setting-area')"
                    class="me-1 p-2 cursor-pointer rounded-lg transition duration-400 text-white bg-gray-400 hover:text-white hover:bg-gray-500 dark:text-gray-950 dark:bg-gray-700 dark:hover:text-gray-950 dark:hover:bg-gray-600"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                    </svg>
                </a>
                <a
                    href="{{ route('route.index') }}"
                    class="p-2 rounded-lg transition duration-400 text-gray-500 bg-gray-100 hover:text-gray-700 hover:bg-gray-200 dark:text-gray-700 dark:bg-gray-900/50 dark:hover:text-gray-600 dark:hover:bg-gray-900"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
				<form method="POST" action="{{ route('route.store') }}">
                    @csrf

                    <input type="hidden" id="form-name" name="name" value="" />
                    <input type="hidden" id="form-currency" name="currency" value="{{ $settings->currency }}" />
                    <input type="hidden" id="form-distance" name="unit_distance" value="{{ $settings->distance }}" />
                    <input type="hidden" id="form-consumption" name="unit_consumption" value="{{ $settings->consumption }}" />
                    <input type="hidden" id="form-weight" name="unit_weight" value="{{ $settings->weight }}" />
                    <input type="hidden" id="form-temperature" name="unit_temperature" value="{{ $settings->temperature }}" />
                    <div class="grid gap-0 lg:gap-8 grid-cols-1 lg:grid-cols-3 mb-4 text-gray-900 dark:text-gray-100">

                        <div class="mb-8 lg:mb-0 p-4 sm:p-8 flex flex-col justify-center items-center bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                            <div class="w-full mb-4">
                                <x-input-label for="driver_id">{{ __('messages.driver.driver') }}</x-input-label>
                                <select
                                    name="driver_id"
                                    id="driver_id"
                                    class="mt-1 block w-full py-2 px-3 border-gray-300/75 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                                >
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('driver_id')" />
                            </div>
                            <div class="w-full mb-4">
                                <x-input-label for="drive-date">{{ __('messages.route.drive_date') }}</x-input-label>
                                <x-text-input id="drive-date" name="drive_date" type="date" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('drive_date')" />
                            </div>
                            <div class="w-full mb-4">
                                <x-input-label for="avg-temp">{{ __('messages.route.average_temperature') }} <small class="uppercase">(°{{ $settings->temperature }})</small></x-input-label>
                                <x-text-input id="avg-temp" name="avg_temp" type="number" class="mt-1 block w-full" min="-90" max="90" step="1" placeholder="0" required />
                                <x-input-error class="mt-2" :messages="$errors->get('avg_temp')" />
                            </div>
                            <div class="w-full mb-4">
                                <x-input-label for="from">{{ __('messages.route.from_place') }}</x-input-label>
                                <x-text-input id="from" name="from" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('from')" />
                            </div>
                            <div class="w-full mb-4">
                                <x-input-label for="to">{{ __('messages.route.to_place') }}</x-input-label>
                                <x-text-input id="to" name="to" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('to')" />
                            </div>
                            <div class="w-full mb-4">
                                <x-input-label for="distance">{{ __('messages.route.distance') }} <small>({{ $settings->distance }})</small></x-input-label>
                                <x-text-input id="distance" name="distance" type="number" class="mt-1 block w-full" min="1" step="1" placeholder="0" required />
                                <x-input-error class="mt-2" :messages="$errors->get('distance')" />
                            </div>
                            <div class="w-full mb-4">
                                <x-input-label for="driving-time">{{ __('messages.route.driving_time') }} <small>(min)</small></x-input-label>
                                <x-text-input id="driving-time" name="driving_time" type="number" class="mt-1 block w-full" min="1" step="1" placeholder="0" required />
                                <x-input-error class="mt-2" :messages="$errors->get('driving_time')" />
                            </div>
                            <div class="w-full">
                                <x-input-label for="map-link">@lang('messages.route.map_link')</x-input-label>
                                <x-text-input id="map-link" name="map_link" type="text" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('map_link')" />
                                <div class="text-end"><a href="https://www.google.com/maps/" target="_blank" class="text-sm underline text-slate-500">google maps</a></div>
                            </div>
                        </div>

                        <div class="col-span-2 flex flex-col justify-center items-center">

                            <div class="mb-4 p-4 sm:px-8 sm:py-12 w-full flex flex-col justify-between items-center bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                                <div class="w-full flex flex-col sm:flex-row justify-center items-center">
                                    <img src="/img/rimac.png" class="w-56 mr-8 my-8" />
                                    <div class="w-full grid gap-8 grid-cols-2">
                                        <div>
                                            <div class="w-full mb-4">
                                                <x-input-label for="garage_id">{{ __('messages.route.vehicle') }}</x-input-label>
                                                <select
                                                    name="garage_id"
                                                    id="garage_id"
                                                    class="mt-1 block w-full py-2 px-3 border-gray-300/75 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                                                >
                                                    @foreach ($garages as $garage)
                                                        <option value="{{ $garage->id }}">{{ $garage->nickname }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error class="mt-2" :messages="$errors->get('garage_id')" />
                                            </div>
                                            <div class="w-full mb-4">
                                                <x-input-label for="avg-speed">{{ __('messages.route.average_speed') }} <small>({{ $settings->distance == 'mi' ? 'mph' : 'km/h' }})</small></x-input-label>
                                                <x-text-input id="avg-speed" name="avg_speed" type="number" class="mt-1 block w-full" step="1" placeholder="0" required />
                                                <x-input-error class="mt-2" :messages="$errors->get('avg_speed')" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="w-full mb-4">
                                                <x-input-label for="avg-consumption">{{ __('messages.route.average_consumption') }} <small>({{ $settings->consumption == 'Wh' ? $settings->consumption .'/'. $settings->distance : $settings->consumption .'/100' }})</small></x-input-label>
                                                <x-text-input id="avg-consumption" name="avg_consumption" type="number" class="mt-1 block w-full" step="0.01" placeholder="0" required />
                                                <x-input-error class="mt-2" :messages="$errors->get('avg_consumption')" />
                                            </div>
                                            <div class="w-full mb-4">
                                                <x-input-label for="total-consumption">{{ __('messages.route.total_consumption') }} <small>(kW)</small></x-input-label>
                                                <x-text-input id="total-consumption" name="total_consumption" type="number" class="mt-1 block w-full" step="0.01" placeholder="0" required />
                                                <x-input-error class="mt-2" :messages="$errors->get('total_consumption')" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full grid gap-8 grid-cols-3">
                                    <div class="w-full mb-4">
                                        <x-input-label for="loaded-weight">{{ __('messages.route.loaded_weight') }} <small>({{ $settings->weight }})</small></x-input-label>
                                        <x-text-input id="loaded-weight" name="loaded_weight" type="number" class="mt-1 block w-full" step="1" placeholder="0" required />
                                        <x-input-error class="mt-2" :messages="$errors->get('loaded_weight')" />
                                    </div>
                                    <div class="w-full mb-4">
                                        <x-input-label for="trailer">{{ __('messages.route.trailer') }}</x-input-label>
                                        <select
                                            name="trailer"
                                            id="trailer"
                                            class="mt-1 block w-full py-2 px-3 border-gray-300/75 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                                        >
                                            <option value="0">{{ __('messages.no') }}</option>
                                            <option value="1">{{ __('messages.yes') }}</option>
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('trailer')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="trailer-weight">{{ __('messages.route.trailer_weight') }} <small>({{ $settings->weight }})</small></x-input-label>
                                        <x-text-input id="trailer-weight" name="trailer_weight" type="number" class="mt-1 block w-full" step="1" placeholder="0" required />
                                        <x-input-error class="mt-2" :messages="$errors->get('trailer_weight')" />
                                        <p class="text-xs text-right lowercase italic mt-1 pr-2 text-slate-600">{{ __('messages.route.cargo') .' + '. __('messages.route.trailer') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 p-4 sm:px-8 sm:py-12 w-full flex flex-col sm:flex-row justify-between items-center bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                                <div class="w-64 flex justify-center items-center">
                                    <img src="/img/tesla_supercharger.png" class="w-28 mr-8 my-8" />
                                </div>
                                <div class="flex-1 grid gap-8 grid-cols-2">
                                    <div>
                                        <div class="w-full mb-4">
                                            <x-input-label for="charging-stops">{{ __('messages.route.charging_stops') }}</x-input-label>
                                            <x-text-input id="charging-stops" name="charging_stops" type="number" class="mt-1 block w-full" step="1" placeholder="0" required />
                                            <x-input-error class="mt-2" :messages="$errors->get('charging_stops')" />
                                        </div>
                                        <div class="w-full mb-4">
                                            <x-input-label for="charging-time">{{ __('messages.route.total_time') }} <small>(min)</small></x-input-label>
                                            <x-text-input id="charging-time" name="charging_time" type="number" class="mt-1 block w-full" step="1" placeholder="0" required />
                                            <x-input-error class="mt-2" :messages="$errors->get('charging_time')" />
                                        </div>
                                        <div class="w-full mb-4">
                                            <x-input-label for="supplied-energy">{{ __('messages.route.supplied_energy') }} <small>(kW)</small></x-input-label>
                                            <x-text-input id="supplied-energy" name="supplied_energy" type="number" class="mt-1 block w-full" step="1" placeholder="0" required />
                                            <x-input-error class="mt-2" :messages="$errors->get('supplied_energy')" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="w-full mb-4">
                                            <x-input-label for="price-per-kw">{{ __('messages.route.price_per_kw') }} <small>({{ $settings->currency }})</small></x-input-label>
                                            <x-text-input id="price-per-kw" name="price_per_kw" type="number" class="mt-1 block w-full" step="0.01" placeholder="0" required />
                                            <x-input-error class="mt-2" :messages="$errors->get('price_per_kw')" />
                                        </div>
                                        <div class="w-full mb-4">
                                            <x-input-label for="real-price">{{ __('messages.route.real_price') }} <small>({{ $settings->currency }})</small></x-input-label>
                                            <x-text-input id="real-price" name="real_price" type="number" class="mt-1 block w-full" step="0.01" placeholder="0" required />
                                            <x-input-error class="mt-2" :messages="$errors->get('real_price')" />
                                        </div>
                                        <div class="w-full">
                                            <x-input-label for="estimated-price">{{ __('messages.route.estimated_price') }} <small>({{ $settings->currency }})</small></x-input-label>
                                            <x-text-input id="estimated-price" name="estimated_price" type="number" class="mt-1 block w-full" step="0.01" placeholder="0" required />
                                            <x-input-error class="mt-2" :messages="$errors->get('estimated_price')" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="grid gap-6 sm:gap-8 grid-cols-1 lg:grid-cols-2 mt-8 lg:mt-0">
                        <div>
                            <x-input-label for="map-iframe" class="flex items-center justify-start">
                                {{ __('messages.route.map_iframe') }}
                                <span
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'iframe-help')"
                                    class="ml-1 cursor-pointer"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                    </svg>
                                </span>
                            </x-input-label>
                            <x-textarea id="map-iframe" name="map_iframe"></x-textarea>
                            <x-input-error :messages="$errors->get('map_iframe')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="note">{{ __('messages.route.note') }}</x-input-label>
                            <x-textarea id="note" name="note"></x-textarea>
                            <x-input-error :messages="$errors->get('note')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex justify-end items-center mt-8">
                        <div class="checkbox-wrapper-toggle me-4 lowercase">
                            <input type="checkbox" id="toggle" name="public" />
                            <label for="toggle" class="toggle"><span></span><small class="ml-3 text-gray-600">{{ __('messages.public') }}</small></label>
                        </div>
                        <x-primary-button>{{ __('messages.add') }}</x-primary-button>
                    </div>

                </form>
			</div>
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

            <div class="mb-4">
                <x-input-label for="unit-distance">{{ __('messages.units.distance') }}</x-input-label>
                <select
                    id="unit-distance"
                    class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                >
                    <option value="mi" {{ $settings->distance == 'mi' ? 'selected' : '' }}>{{ __('messages.units.miles') }} (mi)</option>
                    <option value="km" {{ $settings->distance == 'km' ? 'selected' : '' }}>{{ __('messages.units.kilometers') }} (km)</option>
                </select>
            </div>
            <div class="mb-4">
                <x-input-label for="unit-consumption">{{ __('messages.units.consumption') }}</x-input-label>
                <select
                    id="unit-consumption"
                    class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                >
                    <option value="Wh" {{ $settings->consumption == 'Wh' ? 'selected' : '' }}>Wh</option>
                    <option value="kWh" {{ $settings->consumption == 'kWh' ? 'selected' : '' }}>kWh</option>
                </select>
            </div>
            <div class="mb-4">
                <x-input-label for="unit-weight">{{ __('messages.units.weight') }}</x-input-label>
                <select
                    id="unit-weight"
                    class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                >
                    <option value="lb" {{ $settings->weight == 'lb' ? 'selected' : '' }}>{{ __('messages.units.pounds') }} (lb)</option>
                    <option value="kg" {{ $settings->weight == 'kg' ? 'selected' : '' }}>{{ __('messages.units.kilograms') }} (kg)</option>
                </select>
            </div>        
            <div class="mb-4">
                <x-input-label for="unit-temperature">{{ __('messages.units.temperature') }}</x-input-label>
                <select
                    id="unit-temperature"
                    class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                >
                    <option value="F" {{ $settings->temperature == 'F' ? 'selected' : '' }}>{{ __('messages.units.fahrenheit') }} (°F)</option>
                    <option value="C" {{ $settings->temperature == 'C' ? 'selected' : '' }}>{{ __('messages.units.celsius') }} (°C)</option>
                </select>
            </div>
            <div class="mb-4">
                <x-input-label for="currency">{{ __('messages.units.currency') }}</x-input-label>
                <select
                    id="currency"
                    class="mt-1 block w-full py-2 px-3 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
                >
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->iso_4217 }}" {{ $settings->currency == $currency->iso_4217 ? 'selected' : '' }}>{{ $currency->iso_4217 }} ({{ $currency->symbol }})</option>
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
        </div>
    </x-modal>
    <x-modal name="iframe-help">
        <div class="p-8">
            <h2 class="mb-6 pb-6 text-lg font-medium text-gray-900 dark:text-gray-100 border-b border-b-gray-100 dark:border-b-gray-700/50">
                {{ __('messages.put_everything_from_pb1_to_the_quotes_at_the_end') }}
            </h2>
            <p class="font-bold">{{ __('messages.example') }}</p>
            <p class="text-gray-600 dark:text-gray-400">
                {{ '<iframe src="https://www.google.com/maps/embed?' }} <span class="font-bold text-pink-700">{{ 'pb=!1m28!1m12!1m3!1d37696767.08513647!2d-117.34321359707702!3d36.0089871550525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2zTmV3IFlvcmssIFNwb2plbsOpIHN0w6F0eSBhbWVyaWNrw6k!3m2!1d40.7127753!2d-74.0059728!4m5!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos%20Angeles%2C%20Kalifornie%2C%20Spojen%C3%A9%20st%C3%A1ty%20americk%C3%A9!3m2!1d34.0549076!2d-118.242643!5e1!3m2!1scs!2spt!4v1722273309852!5m2!1scs!2spt' }}</span>{{ '" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>' }}
            </p>

        </div>
    </x-modal>
    @push('slotscript')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript">
        $('#name').keydown(function(){
            $('#form-name').val($(this).val());
        });
        $('#btn-unit-setting').click(function(){
            $('#form-currency').val($('#currency').val());
            $('#form-distance').val($('#unit-distance').val());
            $('#form-consumption').val($('#unit-consumption').val());
            $('#form-weight').val($('#unit-weight').val());
            $('#form-temperature').val($('#unit-temperature').val());

            $('label[for="distance"] small').text('('+ $('#unit-distance').val() +')');
            $('label[for="avg-temp"] small').text('(°'+ $('#unit-temperature').val() +')');
            $('label[for="loaded-weight"] small').text('('+ $('#unit-weight').val() +')');
            $('label[for="trailer-weight"] small').text('('+ $('#unit-weight').val() +')');
            $('label[for="price-per-kw"] small').text('('+ $('#currency').val() +')');
            $('label[for="real-price"] small').text('('+ $('#currency').val() +')');
            $('label[for="estimated-price"] small').text('('+ $('#currency').val() +')');
        
            if ($('#unit-distance').val() == 'mi') {
                $('label[for="avg-speed"] small').text('(mph)');
            } else {
                $('label[for="avg-speed"] small').text('(km/h)');
            }
            if ($('#unit-consumption').val() == 'Wh') {
                $('label[for="avg-consumption"] small').text('('+ $('#unit-consumption').val() +'/'+ $('#unit-distance').val() +')');
            } else {
                $('label[for="avg-consumption"] small').text('('+ $('#unit-consumption').val() +'/100' +')');
            }
        });
    </script>
@endpush
</x-app-layout>