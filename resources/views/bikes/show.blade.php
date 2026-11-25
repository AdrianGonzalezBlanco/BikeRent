<x-app-layout>
    <div>
        <x-button variant="text" :href="route('bikes.index')">
            <span aria-hidden="true">←</span> Volver al catálogo
        </x-button>
    </div>

    <article class="bike-detail">
        <x-bike-image :bike="$bike" class="bike-detail__image" />

        <div class="bike-detail__info">
            <x-status-badge :status="$bike->status" />

            <h1>{{ $bike->model }}</h1>

            <p class="bike-detail__price">
                <strong>{{ $bike->formatted_price }}</strong> por hora
            </p>

            @if ($bike->status === 'available')
                <x-button :href="route('bookings.create', $bike)" class="btn--block">
                    Reservar bicicleta
                </x-button>
            @else
                <x-button disabled class="btn--block">
                    No disponible
                </x-button>
            @endif
        </div>
    </article>
</x-app-layout>
