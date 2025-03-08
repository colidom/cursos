<x-layout title="Job">
    <x-slot name="heading">
        Job Page
    </x-slot>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p class="text-blue-500">This Job Pays {{ $job['salary'] }}€ per year.</p>
    <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
        <a href="/jobs" class="mt-4 relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
            Atrás
        </a>
    </span>
</x-layout>
