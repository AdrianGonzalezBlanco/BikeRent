@props(['bike', 'decorative' => false])

<div {{ $attributes->class(['bike-image']) }}>
    @if ($bike->image)
        <img src="{{ asset('images/bikes/'.$bike->image) }}" alt="{{ $decorative ? '' : $bike->model }}" loading="lazy">
    @else
        <x-icon name="bike" class="bike-image__placeholder" />
    @endif
</div>
