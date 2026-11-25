<x-guest-layout title="Verificar correo">
    <x-page-header
        title="Verifica tu correo"
        subtitle="Antes de empezar, pulsa el enlace que te hemos enviado por correo. Si no te ha llegado, te enviamos otro." />

    @if (session('status') === 'verification-link-sent')
        <div role="status" class="alert alert--success">
            Te hemos enviado un nuevo enlace de verificación al correo con el que te registraste.
        </div>
    @endif

    <div class="form__actions">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-button type="submit" class="btn--block">Reenviar correo de verificación</x-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-button type="submit" variant="text" class="btn--block">Cerrar sesión</x-button>
        </form>
    </div>
</x-guest-layout>
