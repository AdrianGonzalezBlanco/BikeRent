<x-layout.base>
    <x-navbar />

    @isset($header)
        <header class="page-header">
            {{ $header }}
        </header>
    @endisset

    <main id="main" class="container">
        {{ $slot }}
    </main>
</x-layout.base>
