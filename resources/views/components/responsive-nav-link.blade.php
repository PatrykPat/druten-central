@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 text-left font-medium text-black hover:text-white focus:text-white hover:bg-[color:var(--prime-color)] focus:bg-[color:var(--prime-color)] transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 text-left font-medium text-black hover:text-white focus:text-white hover:bg-[color:var(--prime-color)] focus:bg-[color:var(--prime-color)] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
