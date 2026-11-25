<x-guest-layout title="Crear cuenta">
    <x-page-header title="Crear cuenta" subtitle="Regístrate para empezar a reservar" />

    <form method="POST" action="{{ route('register') }}" class="form">
        @csrf

        <x-field name="name" label="Nombre" required autofocus autocomplete="name" />
        <x-field name="email" label="Correo electrónico" type="email" required autocomplete="username" />
        <x-field name="password" label="Contraseña" type="password" required autocomplete="new-password" />
        <x-field name="password_confirmation" label="Repetir contraseña" type="password" required autocomplete="new-password" />

        <div class="form__actions">
            <x-button type="submit" class="btn--block">Crear cuenta</x-button>
        </div>
    </form>

    <p class="guest__switch">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
</x-guest-layout>
