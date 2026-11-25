@props(['bike'])

<article {{ $attributes->class(['bike-card']) }}>
    <x-bike-image :bike="$bike" />

    <div class="bike-card__body">
        <x-status-badge :status="$bike->status" />

        <h2 class="bike-card__model">{{ $bike->model }}</h2>

        <p class="bike-card__price">
            <strong>{{ $bike->formatted_price }}</strong> por hora
        </p>

        <x-button
            variant="tonal"
            :href="route('bikes.show', $bike)"
            :aria-label="'Ver detalle de '.$bike->model"
            class="btn--block">
            Ver detalle
        </x-button>
    </div>
</article>
