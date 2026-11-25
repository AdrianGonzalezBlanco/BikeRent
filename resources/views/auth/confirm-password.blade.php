<x-guest-layout title="Confirmar contraseña">
    <x-page-header
        title="Confirmar contraseña"
        subtitle="Es una zona segura. Confirma tu contraseña para continuar." />

    <form method="POST" action="{{ route('password.confirm') }}" class="form">
        @csrf

        <x-field name="password" label="Contraseña" type="password" required autofocus autocomplete="current-password" />

        <div class="form__actions">
            <x-button type="submit" class="btn--block">Confirmar</x-button>
        </div>
    </form>
</x-guest-layout>
