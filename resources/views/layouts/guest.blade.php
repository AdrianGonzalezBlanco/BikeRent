<x-layout.base :title="$title">
    <main id="main" class="guest">
        <a href="/" aria-label="BikeRent, inicio">
            <x-application-logo />
        </a>

        <div class="guest__card">
            {{ $slot }}
        </div>
    </main>
</x-layout.base>