<x-guest-layout>

    <x-slot name="meta_title">{{ __('meta.auth.title.forgot_password') }}</x-slot>
    <x-slot name="meta_desc">{{ __('meta.auth.desc.forgot_password') }}</x-slot>
    <x-slot name="meta_keywords">{{ __('meta.auth.keywords.forgot_password') }}</x-slot>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('messages.auth.forgot_your_password_no_problem') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('messages.auth.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-teal-600 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('messages.back') }}
            </a>
            <x-primary-button>
                {{ __('messages.auth.email_password_reset_link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
