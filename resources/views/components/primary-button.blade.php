<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center hover:bg-[var(--sec-color)] px-4 py-2 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
