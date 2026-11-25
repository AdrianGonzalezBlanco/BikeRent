<header>
    <h2 id="profile-delete-title" class="panel__title">Eliminar cuenta</h2>
    <p class="panel__text">Se borrarán tu cuenta y todos tus datos de forma permanente.</p>
</header>

<div>
    <x-button
        variant="danger"
        data-modal-open="confirm-user-deletion"
    >Eliminar cuenta</x-button>
</div>

<x-modal name="confirm-user-deletion" labelledby="delete-modal-title" :show="$errors->userDeletion->isNotEmpty()">
    <form method="POST" action="{{ route('profile.destroy') }}" class="form">
        @csrf
        @method('delete')

        <header>
            <h2 id="delete-modal-title" class="panel__title">¿Eliminar tu cuenta?</h2>
            <p class="panel__text">Esta acción no se puede deshacer. Introduce tu contraseña para confirmar.</p>
        </header>

        <x-field name="password" id="delete_password" bag="userDeletion" label="Contraseña" type="password" autocomplete="current-password" />

        <div class="form__actions form__actions--row">
            <x-button variant="outlined" data-modal-close>Cancelar</x-button>
            <x-button type="submit" variant="danger">Eliminar cuenta</x-button>
        </div>
    </form>
</x-modal>
