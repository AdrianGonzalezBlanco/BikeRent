@props(['status'])

@if ($status)
    <div role="status" {{ $attributes->class(['alert', 'alert--success']) }}>
        {{ $status }}
    </div>
@endif
