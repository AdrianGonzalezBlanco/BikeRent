@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ? $title.' · '.config('app.name', 'BikeRent') : config('app.name', 'BikeRent') }}</title>

        {{-- Applies the saved theme before first paint to avoid a flash --}}
        <script>
            try {
                var saved = localStorage.getItem('theme');
                var dark = saved ? saved === 'dark' : matchMedia('(prefers-color-scheme: dark)').matches;
                document.documentElement.className = dark ? 'dark' : 'light';
            } catch (e) {}
        </script>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=jost:400,500,600&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <a class="skip-link" href="#main">Saltar al contenido</a>
        {{ $slot }}
    </body>
</html>