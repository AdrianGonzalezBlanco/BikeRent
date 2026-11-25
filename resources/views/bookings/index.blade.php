<x-app-layout>
    <x-page-header title="Mis reservas" subtitle="Consulta y gestiona tus alquileres" />

    @if ($bookings->isEmpty())
        <p>Todavía no tienes ninguna reserva.</p>

        <div>
            <x-button :href="route('bikes.index')">Ver catálogo</x-button>
        </div>
    @else
        <ul class="card-grid card-grid--wide">
            @foreach ($bookings as $booking)
                <li>
                    <x-booking-card :booking="$booking" />
                </li>
            @endforeach
        </ul>
    @endif
</x-app-layout>
