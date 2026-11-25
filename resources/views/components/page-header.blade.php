@props(['title', 'subtitle' => null])

<header {{ $attributes->class(['page-header']) }}>
    <h1>{{ $title }}</h1>

    @if ($subtitle)
        <p class="page-header__subtitle">{{ $subtitle }}</p>
    @endif
</header>
