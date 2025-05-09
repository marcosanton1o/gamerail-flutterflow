@props(['href' => '', 'value' => ''])
<a
{{ $attributes->merge(['href' => $href, 'class' => 'underline text-sm text-gray-200 hover:text-purple-300 rounded-md focus:outline-none
    focus:ring-2 focus:ring-offset-2']) }}>
{{ $value ?? $slot }}
</a>
