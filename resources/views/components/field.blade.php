@props(['name', 'label', 'type' => 'text', 'help' => null, 'value' => null, 'bag' => 'default', 'clientError' => false])

@php
    $id = $attributes->get('id', $name);
    $messages = $errors->getBag($bag)->get($name);
    $describedBy = collect([
        $help ? "{$id}-help" : null,
        $messages ? "{$id}-error" : null,
    ])->filter()->implode(' ');
@endphp

<div class="field">
    <x-input-label :for="$id" :value="$label" />

    <x-text-input
        :id="$id"
        :name="$name"
        :type="$type"
        :value="$type === 'password' ? null : old($name, $value)"
        :aria-invalid="$messages ? 'true' : null"
        :aria-describedby="$describedBy ?: null"
        {{ $attributes->except('id') }}
    />

    @if ($help)
        <p id="{{ $id }}-help" class="field__help">{{ $help }}</p>
    @endif

    @if ($clientError)
        <p id="{{ $id }}-client-error" class="field__error" role="alert" hidden></p>
    @endif

    <x-input-error :id="$id . '-error'" :messages="$messages" />
</div>
