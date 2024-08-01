<div class="w-full flex flex-col lg:flex-row items-center justify-center">
	<div class="hidden lg:block flex-none p-4 mr-12 rounded-full bg-white dark:bg-gray-800 shadow-xl">
		<img src="/img/rudder.png" width="200px" height="200px" />
	</div>
	<div class="w-full flex-1 overflow-hidden p-4 sm:p-8 mb-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
		<form method="POST" action="{{ route('driver.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="w-full mb-4">
				<x-input-label for="name">{{ __('messages.driver.full_name') }}</x-input-label>
				<x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="" required />
				<x-input-error class="mt-2" :messages="$errors->get('name')" />
			</div>
			<div class="w-full mb-4">
				<x-input-label for="nickname">{{ __('messages.driver.nickname') }}</x-input-label>
				<x-text-input id="nickname" name="nickname" type="text" class="mt-1 block w-full" value="" required />
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
</div>