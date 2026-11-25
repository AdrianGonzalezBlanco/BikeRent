<header>
    <h2 id="profile-info-title" class="panel__title">Datos personales</h2>
    <p class="panel__text">Actualiza tu nombre y tu correo electrónico.</p>
</header>

<form id="send-verification" method="POST" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="POST" action="{{ route('profile.update') }}" class="form">
    @csrf
    @method('patch')

    <x-field name="name" label="Nombre" :value="$user->name" required autofocus autocomplete="name" />
    <x-field name="email" label="Correo electrónico" type="email" :value="$user->email" required autocomplete="username" />

    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div class="alert alert--error" role="status">
            <p>Tu correo no está verificado.</p>
            <button type="submit" form="send-verification" class="link-button">Reenviar correo de verificación</button>
        </div>

        @if (session('status') === 'verification-link-sent')
            <p role="status" class="alert alert--success">Te hemos enviado un nuevo enlace de verificación.</p>
        @endif
    @endif

    <div class="form__actions">
        <x-button type="submit">Guardar</x-button>

        @if (session('status') === 'profile-updated')
            <p role="status" class="form__saved">Cambios guardados.</p>
        @endif
    </div>
</form>
