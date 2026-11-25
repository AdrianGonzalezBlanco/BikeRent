@php
    $filters = [
        ['label' => 'Todas', 'value' => null],
        ['label' => 'Activas', 'value' => 'active'],
        ['label' => 'Completadas', 'value' => 'completed'],
    ];
@endphp

<x-app-layout title="Mis reservas">
    <x-page-header title="Mis reservas" subtitle="Consulta y gestiona tus alquileres" />

    @if ($filter || $bookings->isNotEmpty())
        <nav aria-label="Filtrar reservas">
            <ul class="chip-list">
                @foreach ($filters as $item)
                    <li>
                        <x-filter-chip
                            :href="route('bookings.index', $item['value'] ? ['status' => $item['value']] : [])"
                            :active="$filter === $item['value']">
                            {{ $item['label'] }}
                        </x-filter-chip>
                    </li>
                @endforeach
            </ul>
        </nav>
    @endif

    @if ($bookings->isEmpty())
        @if ($filter)
            <p>No tienes reservas {{ $filter === 'active' ? 'activas' : 'completadas' }}.</p>
        @else
            <p>Todavía no tienes ninguna reserva.</p>

            <div>
                <x-button :href="route('bikes.index')">Ver catálogo</x-button>
            </div>
        @endif
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
