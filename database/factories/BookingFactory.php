<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bike;
use App\Models\User;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('+1 day', '+10 days');
        $end = (clone $start)->modify('+' . fake()->numberBetween(1, 5) . ' hours');

        return [
            'user_id' => User::factory(),
            'bike_id' => Bike::factory(),
            'start_time' => $start,
            'end_time' => $end,
            'status' => 'pending',
            'total_cost' => fake()->randomFloat(2, 5, 50),
        ];
    }
}
