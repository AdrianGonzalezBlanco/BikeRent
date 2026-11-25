@props(['href', 'active' => false])

<a href="{{ $href }}" {{ $attributes->class(['chip', 'is-active' => $active]) }} @if ($active) aria-current="true" @endif>
    {{ $slot }}
</a>
