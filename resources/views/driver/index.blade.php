<x-app-layout>

	<x-slot name="meta_title">{{ __('meta.driver.title') }}</x-slot>
    <x-slot name="meta_desc">{{ __('meta.driver.desc') }}</x-slot>
    <x-slot name="meta_keywords">{{ __('meta.driver.keywords') }}</x-slot>

	<x-slot name="header">
		<div class="flex justify-between items-center">
			<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight py-2">
				{{ __('messages.driver.driver') }}
			</h2>
			<button
				type="button"
				id="add-driver-btn"
				href="{{ route('driver.index') }}"
				class="p-2 rounded-lg transition duration-400 text-gray-500 bg-gray-100 hover:text-gray-700 hover:bg-gray-200 dark:text-gray-700 dark:bg-gray-900/50 dark:hover:text-gray-600 dark:hover:bg-gray-900"
			>
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 duration-300">
					<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
				</svg>
			</button>
		</div>
	</x-slot>

	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

			<div id="add-driver-form" class="overflow-hidden mb-6 {{ $drivers->first() ? 'hidden' : '' }}">
				@include('driver.partials.create')
			</div>
			@foreach ($drivers as $driver)
                <div x-data="{ open: false }" class="driver-item mb-4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('driver.partials.update')
                </div>
            @endforeach

		</div>
	</div>
	@push('slotscript')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js" integrity="sha256-sw0iNNXmOJbQhYFuC9OF2kOlD5KQKe1y5lfBn4C9Sjg=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $('#add-driver-btn').click(function(){
                if ($('#add-driver-form').hasClass('hidden')) {
                    $('#add-driver-btn').find('svg').addClass('rotate-45 text-pink-700');
                    $('#add-driver-form').removeClass('hidden');
                } else {
                    $('#add-driver-btn').find('svg').removeClass('rotate-45 text-pink-700');
                    $('#add-driver-form').addClass('hidden');
                }
            });
        </script>
    @endpush
</x-app-layout>