<x-app-layout :title="'Reserva de '.$booking->bike->model">
    <div>
        <x-button variant="text" :href="route('bookings.index')">
            <span aria-hidden="true">←</span> Volver a mis reservas
        </x-button>
    </div>

    <x-page-header :title="$booking->bike->model" subtitle="Detalle de tu reserva" />

    <div class="split">
        <x-bike-image :bike="$booking->bike" class="bike-image--rounded" />

        <div class="booking-detail__info">
            <section class="panel" aria-labelledby="booking-summary-title">
                <h2 id="booking-summary-title" class="panel__title">Resumen de la reserva</h2>

                <dl class="summary">
                    <div class="summary__row">
                        <dt>Estado</dt>
                        <dd><x-status-badge :status="$booking->status" /></dd>
                    </div>
                    <div class="summary__row">
                        <dt>Fechas</dt>
                        <dd>{{ $booking->date_range }}</dd>
                    </div>
                    <div class="summary__row">
                        <dt>Precio por hora</dt>
                        <dd>{{ $booking->bike->formatted_price }}</dd>
                    </div>
                    <div class="summary__row summary__row--total">
                        <dt>Total</dt>
                        <dd>{{ $booking->formatted_total }}</dd>
                    </div>
                </dl>
            </section>

            @if ($booking->status === 'pending')
                <form method="POST" action="{{ route('bookings.cancel', $booking) }}">
                    @csrf
                    @method('PATCH')

                    <x-button type="submit" variant="outlined" class="btn--block">
                        Cancelar reserva
                    </x-button>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
