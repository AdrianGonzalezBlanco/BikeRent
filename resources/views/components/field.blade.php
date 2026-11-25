@props(['name', 'label', 'type' => 'text', 'help' => null, 'value' => null])

@php
    $id = $attributes->get('id', $name);
    $describedBy = collect([
        $help ? "{$id}-help" : null,
        $errors->has($name) ? "{$id}-error" : null,
    ])->filter()->implode(' ');
@endphp

<div class="field">
    <x-input-label :for="$id" :value="$label" />

    <x-text-input
        :id="$id"
        :name="$name"
        :type="$type"
        :value="old($name, $value)"
        :aria-invalid="$errors->has($name) ? 'true' : null"
        :aria-describedby="$describedBy ?: null"
        {{ $attributes->except('id') }}
    />

    @if ($help)
        <p id="{{ $id }}-help" class="field__help">{{ $help }}</p>
    @endif

    <x-input-error :id="$id . '-error'" :messages="$errors->get($name)" />
</div>