@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out border-l-4 border-blue-400 bg-blue-50'
                : 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out border-l-4 border-transparent';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
