<section class="space-y-6">
    <header class="flex justify-between items-center">
        <h2 class="text-lg flex justify-start items-center text-gray-900 dark:text-slate-400">
            <img src="/storage/driver/{{ $driver->image }}" class="h-14 mr-6 rounded-full" />
			<div class="flex flex-col">
				<span class="text-sm text-slate-600 dark:text-slate-500">{{ $driver->nickname }}</span>
				<span class="flex items-center">{{ $driver->name }}</span>
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
		<form method="POST" action="{{ route('driver.update', $driver) }}" enctype="multipart/form-data">
			@csrf
			@method('patch')
			<div class="w-full mb-4">
				<x-input-label for="name">{{ __('messages.driver.full_name') }}</x-input-label>
				<x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('nickname', $driver->name)" required />
				<x-input-error class="mt-2" :messages="$errors->get('name')" />
			</div>
			<div class="w-full mb-4">
				<x-input-label for="nickname">{{ __('messages.driver.nickname') }}</x-input-label>
				<x-text-input id="nickname" name="nickname" type="text" class="mt-1 block w-full" :value="old('nickname', $driver->nickname)" required />
				<x-input-error class="mt-2" :messages="$errors->get('nickname')" />
			</div>
			<div class="w-full">
				<x-input-label for="nickname">{{ __('messages.driver.image') }}</x-input-label>
				<input
					required
					type="file"
					accept="image/*"
					name="image"
					id="image"
					class="w-full mt-1 p-2 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-teal-600 focus:ring-indigo-500 dark:focus:ring-teal-600 rounded-md shadow-sm"
				>
			</div>
			<div class="flex items-center justify-end mt-6">
				<x-primary-button>{{ __('messages.save') }}</x-primary-button>
			</div>
		</form>
	</div>
</section>