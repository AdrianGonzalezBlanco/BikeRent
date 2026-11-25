@props([
    'name',
    'show' => false,
    'labelledby' => null,
])

<dialog
    id="modal-{{ $name }}"
    class="modal"
    data-modal
    @if ($show) data-modal-open-on-load @endif
    @if ($labelledby) aria-labelledby="{{ $labelledby }}" @endif
>
    <div class="modal__dialog">
        {{ $slot }}
    </div>
</dialog>
