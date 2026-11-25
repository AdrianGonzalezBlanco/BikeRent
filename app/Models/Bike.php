<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bike extends Model
{
    /** @use HasFactory<\Database\Factories\BikeFactory> */
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'model',
        'price_per_hour',
        'status',
        'image',
    ];

    /**
     * Precio por hora con formato español, por ejemplo "3,50 €".
     */
    protected function formattedPrice(): Attribute
    {
        return Attribute::get(
            fn () => number_format($this->price_per_hour, 2, ',', '.').' €'
        );
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
