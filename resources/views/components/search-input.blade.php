@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 focus:ring-0 border-0 rounded-md shadow-xl dark:text-teal-500 dark:bg-black dark:border-transparent dark:border-b-gray-700 dark:focus:border-b-teal-600 dark:focus:ring-0 dark:rounded-none dark:shadow-none']) !!}>