@props(['value'])

<label {{ $attributes->merge(['class' => 'font-semibold block font-base text-sm text-white mb-1']) }}>
    {{ $value ?? $slot }}
</label>
