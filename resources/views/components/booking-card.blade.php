@props(['booking'])

<article {{ $attributes->class(['booking-card']) }}>
    <header class="booking-card__header">
        <h2 class="booking-card__model">{{ $booking->bike->model }}</h2>
        <x-status-badge :status="$booking->status" />
    </header>

    <p class="booking-card__dates">
        <x-icon name="calendar" class="booking-card__icon" />
        <span>{{ $booking->date_range }}</span>
    </p>

    <footer class="booking-card__footer">
        <p class="booking-card__total">
            <span>Total</span>
            <strong>{{ $booking->formatted_total }}</strong>
        </p>

        @if ($booking->status === 'pending')
            <form method="POST" action="{{ route('bookings.cancel', $booking) }}">
                @csrf
                @method('PATCH')

                <x-button type="submit" variant="outlined" :aria-label="'Cancelar la reserva de '.$booking->bike->model">
                    Cancelar
                </x-button>
            </form>
        @endif
    </footer>
</article>
