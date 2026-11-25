@props(['status'])

@php
    $status = $status instanceof \BackedEnum ? $status->value : $status;

    $labels = [
        'pending' => 'Pendiente',
        'active' => 'Activa',
        'completed' => 'Completada',
        'cancelled' => 'Cancelada',
        'available' => 'Disponible',
        'maintenance' => 'Mantenimiento',
        'retired' => 'Retirada',
    ];
@endphp

<span {{ $attributes->class(['badge', "badge--{$status}"]) }}>
    {{ $labels[$status] ?? $status }}
</span>