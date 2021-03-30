@props(['disabled' => false])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 py-2 border focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600']) !!}>