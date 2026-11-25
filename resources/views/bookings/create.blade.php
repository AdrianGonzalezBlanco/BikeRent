<x-app-layout :title="'Reservar '.$bike->model">
    <div>
        <x-button variant="text" :href="route('bikes.show', $bike)">
            <span aria-hidden="true">←</span> Volver al detalle
        </x-button>
    </div>

    <x-page-header title="Reservar bicicleta" />

    <form
        method="POST"
        action="{{ route('bookings.store') }}"
        class="booking-form"
        x-data="bookingEstimate({{ (float) $bike->price_per_hour }}, @js(old('start_time', '')), @js(old('end_time', '')))">
        @csrf
        <input type="hidden" name="bike_id" value="{{ $bike->id }}">

        <section class="panel booking-form__bike" aria-labelledby="bike-title">
            <h2 id="bike-title" class="panel__title">{{ $bike->model }}</h2>
            <p class="panel__text">{{ $bike->formatted_price }} por hora</p>
            <x-input-error :messages="$errors->get('bike_id')" />
        </section>

        <div class="booking-form__fields">
            <x-field
                name="start_time"
                label="Inicio"
                type="datetime-local"
                help="Día y hora de recogida"
                x-model="start"
                required />

            <x-field
                name="end_time"
                label="Fin"
                type="datetime-local"
                help="Debe ser posterior al inicio"
                x-model="end"
                required />
        </div>

        <aside class="panel booking-form__summary" aria-labelledby="summary-title">
            <h2 id="summary-title" class="panel__title">Resumen</h2>

            <dl class="summary" aria-live="polite">
                <div class="summary__row">
                    <dt>Duración</dt>
                    <dd x-text="duration">—</dd>
                </div>
                <div class="summary__row">
                    <dt>Precio por hora</dt>
                    <dd>{{ $bike->formatted_price }}</dd>
                </div>
                <div class="summary__row summary__row--total">
                    <dt>Total estimado</dt>
                    <dd x-text="total">—</dd>
                </div>
            </dl>
        </aside>

        <div class="booking-form__actions">
            <x-button type="submit" class="btn--block">Confirmar reserva</x-button>
            <x-button variant="outlined" :href="route('bikes.show', $bike)" class="btn--block">Cancelar</x-button>
        </div>
    </form>
</x-app-layout>
