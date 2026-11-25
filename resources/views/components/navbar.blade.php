@php
    $links = [
        ['label' => 'Catálogo', 'icon' => 'bike', 'url' => route('bikes.index'), 'active' => ['bikes.*', 'bookings.create']],
        ['label' => 'Reservas', 'icon' => 'calendar', 'url' => route('bookings.index'), 'active' => ['bookings.index', 'bookings.show']],
        auth()->check()
            ? ['label' => 'Perfil', 'icon' => 'user', 'url' => route('profile.edit'), 'active' => ['profile.*'], 'account' => true]
            : ['label' => 'Entrar', 'icon' => 'user', 'url' => route('login'), 'active' => ['login', 'register'], 'account' => true],
    ];
@endphp

<header class="navbar">
    <a class="navbar__brand" href="{{ route('bikes.index') }}">
        <x-icon name="bike" />
        <span>BikeRent</span>
    </a>

    <nav class="navbar__nav" aria-label="Principal">
        @foreach ($links as $link)
            @php $active = request()->routeIs(...$link['active']); @endphp
            <a href="{{ $link['url'] }}"
               class="navbar__link {{ $active ? 'is-active' : '' }} {{ ($link['account'] ?? false) ? 'navbar__link--account' : '' }}"
               @if ($active) aria-current="page" @endif>
                <span class="navbar__icon"><x-icon :name="$link['icon']" /></span>
                <span>{{ $link['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <button type="button" class="navbar__theme" data-theme-toggle aria-label="Cambiar a modo oscuro">
        <x-icon name="moon" class="icon icon--moon" />
        <x-icon name="sun" class="icon icon--sun" />
    </button>
</header>
