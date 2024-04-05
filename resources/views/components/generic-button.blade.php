<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:border-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
