<button {{ $attributes->merge(['type' => 'submit', 'class' => 'pointer inline-flex items-center text-black bg-slate-400 hover:bg-slate-500 px-4 py-2 border border-transparent rounded-md font-medium text-xs uppercase tracking-widest focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
