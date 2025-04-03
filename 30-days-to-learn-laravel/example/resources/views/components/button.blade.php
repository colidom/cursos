<a {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium
    text-white bg-gray-100 border border-gray-100 leading-5 rounded-md
    hover:text-gray-200 hover:bg-gray-700 focus:outline-none focus:ring ring-gray-200
    focus:border-blue-200 active:bg-gray-300 active:text-gray-200
    transition ease-in-out duration-150
    dark:border-gray-300 dark:text-gray-700
    dark:focus:border-gray-200 dark:active:bg-gray-300 dark:active:text-gray-300']) }}>
    {{ $slot }}
</a>
