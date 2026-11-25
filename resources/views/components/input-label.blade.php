@props(['value'])

<label {{ $attributes->class('field__label') }}>
    {{ $value ?? $slot }}
</label>