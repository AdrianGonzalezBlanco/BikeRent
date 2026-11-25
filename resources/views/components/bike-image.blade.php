@props(['bike'])

<div {{ $attributes->class(['bike-image']) }}>
    @if ($bike->image)
        <img src="{{ asset('images/bikes/'.$bike->image) }}" alt="{{ $bike->model }}" loading="lazy">
    @else
        <x-icon name="bike" class="bike-image__placeholder" />
    @endif
</div>
