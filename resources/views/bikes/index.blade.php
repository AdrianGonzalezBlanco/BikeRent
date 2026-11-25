@php
    $models = $bikes->pluck('model')->unique()->sort()->values();
@endphp

<x-app-layout title="Catálogo">
    <x-page-header title="Catálogo" subtitle="Elige tu bicicleta y reserva en pocos pasos" />

    @if ($bikes->isEmpty())
        <p>No hay bicicletas disponibles ahora mismo.</p>
    @else
        <div class="field catalog-filter">
            <label class="field__label" for="model-filter">Modelo</label>
            <select id="model-filter" class="field__control" data-catalog-select>
                <option value="">Todos los modelos</option>
                @foreach ($models as $model)
                    <option value="{{ $model }}">{{ $model }}</option>
                @endforeach
            </select>
        </div>

        <p class="catalog-status" role="status" data-catalog-status>
            Mostrando {{ $bikes->count() }} {{ $bikes->count() === 1 ? 'bicicleta' : 'bicicletas' }}.
        </p>

        <ul class="card-grid">
            @foreach ($bikes as $bike)
                <li data-catalog-item data-model="{{ $bike->model }}">
                    <x-bike-card :bike="$bike" />
                </li>
            @endforeach
        </ul>
    @endif
</x-app-layout>
