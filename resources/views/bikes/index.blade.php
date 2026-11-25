<x-app-layout>
    <x-page-header title="Catálogo" subtitle="Elige tu bicicleta y reserva en pocos pasos" />

    @if ($bikes->isEmpty())
        <p>No hay bicicletas disponibles ahora mismo.</p>
    @else
        <ul class="bike-grid">
            @foreach ($bikes as $bike)
                <li>
                    <x-bike-card :bike="$bike" />
                </li>
            @endforeach
        </ul>
    @endif
</x-app-layout>
