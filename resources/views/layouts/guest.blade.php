<x-layout.base :title="$title">
    <main id="main" class="guest">
        <a href="{{ route('bikes.index') }}" class="guest__brand" aria-label="BikeRent, ir al catálogo">
            <x-icon name="bike" />
            <span>BikeRent</span>
        </a>

        <div class="guest__card">
            {{ $slot }}
        </div>
    </main>
</x-layout.base>
