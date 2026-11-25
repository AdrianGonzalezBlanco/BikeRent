<x-guest-layout title="Iniciar sesión">
    <x-page-header title="Iniciar sesión" subtitle="Accede para reservar tu bicicleta" />

    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="form">
        @csrf

        <x-field name="email" label="Correo electrónico" type="email" required autofocus autocomplete="username" />
        <x-field name="password" label="Contraseña" type="password" required autocomplete="current-password" />

        <label class="check">
            <input id="remember_me" type="checkbox" name="remember">
            <span>Recordarme</span>
        </label>

        <div class="form__actions">
            <x-button type="submit" class="btn--block">Entrar</x-button>
            <x-button variant="text" :href="route('password.request')" class="btn--block">¿Has olvidado tu contraseña?</x-button>
        </div>
    </form>

    <p class="guest__switch">¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
</x-guest-layout>
