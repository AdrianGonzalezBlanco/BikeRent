<x-layout.base>
    <x-navbar />

    @isset($header)
        <header class="page-header">
            {{ $header }}
        </header>
    @endisset

    <main id="main" class="container">
        <x-flash />

        {{ $slot }}
    </main>
</x-layout.base>
