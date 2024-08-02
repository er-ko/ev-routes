<x-app-layout>

    <x-slot name="meta_title">{{ __('meta.dashboard.title') }}</x-slot>
    <x-slot name="meta_desc">{{ __('meta.dashboard.desc') }}</x-slot>
    <x-slot name="meta_keywords">{{ __('meta.dashboard.keywords') }}</x-slot>

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
            <div class="grid gap-8 grid-cols-1 lg:grid-cols-2">
                
                {{-- my data --}}
                <div>@include('dashboard.partials.my')</div>

                {{-- all data --}}
				<div>@include('dashboard.partials.all')</div>
            </div>
        </div>
    </div>
</x-app-layout>
