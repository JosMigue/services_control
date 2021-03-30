@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }} <span class="text-red-500 mx-1">*</span>
</label>