<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bike_id',
        'start_time',
        'end_time',
        'status',
        'total_cost',
    ];

    protected function casts(): array
    {
        return [
            'start_time' => 'datetime',
            'end_time' => 'datetime',
        ];
    }

    /**
     * Fechas de la reserva en español, por ejemplo "25 nov 2026 · 10:00 – 14:00".
     */
    protected function dateRange(): Attribute
    {
        return Attribute::get(function () {
            $start = $this->start_time->copy()->locale('es');
            $end = $this->end_time->copy()->locale('es');

            if ($start->isSameDay($end)) {
                return $start->translatedFormat('j M Y').' · '.$start->format('H:i').' – '.$end->format('H:i');
            }

            return $start->translatedFormat('j M Y, H:i').' – '.$end->translatedFormat('j M Y, H:i');
        });
    }

    /**
     * Total con formato español, por ejemplo "14,00 €".
     */
    protected function formattedTotal(): Attribute
    {
        return Attribute::get(
            fn () => number_format($this->total_cost, 2, ',', '.').' €'
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bike(): BelongsTo
    {
        return $this->belongsTo(Bike::class);
    }
}
