<header>
    <h2 id="profile-password-title" class="panel__title">Contraseña</h2>
    <p class="panel__text">Usa una contraseña larga y difícil de adivinar.</p>
</header>

<form method="POST" action="{{ route('password.update') }}" class="form">
    @csrf
    @method('put')

    <x-field name="current_password" id="update_password_current_password" bag="updatePassword" label="Contraseña actual" type="password" autocomplete="current-password" />
    <x-field name="password" id="update_password_password" bag="updatePassword" label="Contraseña nueva" type="password" autocomplete="new-password" />
    <x-field name="password_confirmation" id="update_password_password_confirmation" bag="updatePassword" label="Repetir contraseña nueva" type="password" autocomplete="new-password" />

    <div class="form__actions">
        <x-button type="submit">Guardar</x-button>

        @if (session('status') === 'password-updated')
            <p
                role="status"
                class="form__saved"
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 3000)"
            >Contraseña actualizada.</p>
        @endif
    </div>
</form>
