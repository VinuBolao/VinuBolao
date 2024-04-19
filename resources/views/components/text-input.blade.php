@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-blue-300 dark:bg-slate-800 dark:text-slate-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50']) !!}>
