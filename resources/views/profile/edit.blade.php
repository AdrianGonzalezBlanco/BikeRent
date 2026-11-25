<x-app-layout title="Perfil">
    <x-page-header title="Mi perfil" subtitle="Gestiona tus datos y tu cuenta" />

    <div class="profile">
        <section class="panel profile__section" aria-labelledby="profile-info-title">
            @include('profile.partials.update-profile-information-form')
        </section>

        <section class="panel profile__section" aria-labelledby="profile-password-title">
            @include('profile.partials.update-password-form')
        </section>

        <section class="panel profile__section" aria-labelledby="profile-session-title">
            <h2 id="profile-session-title" class="panel__title">Sesión</h2>
            <p class="panel__text">Cierra la sesión en este dispositivo.</p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-button type="submit" variant="outlined">Cerrar sesión</x-button>
            </form>
        </section>

        <section class="panel profile__section" aria-labelledby="profile-delete-title">
            @include('profile.partials.delete-user-form')
        </section>
    </div>
</x-app-layout>
