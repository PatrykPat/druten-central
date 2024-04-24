@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center p-1 text-sm font-medium leading-5 text-white focus:outline-none focus:border-white transition duration-150 ease-in-out'
            : 'inline-flex items-center p-1 text-sm font-medium leading-5 text-white hover:text-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
