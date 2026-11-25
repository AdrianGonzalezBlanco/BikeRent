<x-guest-layout title="Nueva contraseña">
    <x-page-header title="Nueva contraseña" subtitle="Elige una contraseña nueva para tu cuenta." />

    <form method="POST" action="{{ route('password.store') }}" class="form">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <x-field name="email" label="Correo electrónico" type="email" :value="$request->email" required autofocus autocomplete="username" />
        <x-field name="password" label="Contraseña" type="password" required autocomplete="new-password" />
        <x-field name="password_confirmation" label="Repetir contraseña" type="password" required autocomplete="new-password" />

        <div class="form__actions">
            <x-button type="submit" class="btn--block">Cambiar contraseña</x-button>
        </div>
    </form>
</x-guest-layout>
