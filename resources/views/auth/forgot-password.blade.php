<x-guest-layout title="Recuperar contraseña">
    <x-page-header
        title="Recuperar contraseña"
        subtitle="Indica tu correo y te enviaremos un enlace para elegir una nueva contraseña." />

    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="form">
        @csrf

        <x-field name="email" label="Correo electrónico" type="email" required autofocus />

        <div class="form__actions">
            <x-button type="submit" class="btn--block">Enviar enlace</x-button>
            <x-button variant="text" :href="route('login')" class="btn--block">Volver a iniciar sesión</x-button>
        </div>
    </form>
</x-guest-layout>
