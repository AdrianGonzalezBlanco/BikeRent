<x-layout.base>
    @include('layouts.navigation')

    @isset($header)
        <header class="page-header">
            {{ $header }}
        </header>
    @endisset

    <main id="main">
        {{ $slot }}
    </main>
</x-layout.base>