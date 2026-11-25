@props(['messages'])

@if ($messages)
    <ul {{ $attributes->class('field__error') }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif