<x-app-layout>
	<x-slot name="header">
		<div class="flex justify-between items-center">
			<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight py-2">
				{{ __('messages.garage.garage') }}
			</h2>
            @if ($driver >= 1)
                <button
                    type="button"
                    id="add-car-btn"
                    href="{{ route('garage.index') }}"
                    class="p-2 rounded-lg transition duration-400 text-gray-500 bg-gray-100 hover:text-gray-700 hover:bg-gray-200 dark:text-gray-700 dark:bg-gray-900/50 dark:hover:text-gray-600 dark:hover:bg-gray-900"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
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
                <div id="add-car-form" class="overflow-hidden p-4 sm:p-8 mb-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg {{ $cars->first() ? 'hidden' : '' }}">
                    @include('garage.partials.create')
                </div>
                <div x-data="{ open: true }" class="garage-car p-4 sm:p-8 mb-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('garage.partials.settings')
                </div>
                @foreach ($cars as $car)
                    <div x-data="{ open: false }" class="garage-car mb-4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        @include('garage.partials.update')
                    </div>
                @endforeach
            @endif
		</div>
	</div>

	@push('slotstyle')
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css" />
    @endpush
    @push('slotscript')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js" integrity="sha256-sw0iNNXmOJbQhYFuC9OF2kOlD5KQKe1y5lfBn4C9Sjg=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            var path = '{{ route('garage.index') }}';
            $('.brand-name').autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: path,
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function (event, ui) {
                    $('.brand-name').val(ui.item.value);
                    return false;
                }
            });
            $('#add-car-btn').click(function(){
                if ($('#add-car-form').hasClass('hidden')) {
                    $('#add-car-btn').find('svg').addClass('rotate-45 text-pink-700');
                    $('#add-car-form').removeClass('hidden');
                } else {
                    $('#add-car-btn').find('svg').removeClass('rotate-45 text-pink-700');
                    $('#add-car-form').addClass('hidden');
                }
            });
        </script>
    @endpush
</x-app-layout>