<?php

namespace Database\Factories;

use App\Models\Bike;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Bike>
 */
class BikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => fake()->unique()->bothify('BK-####-????'),
            'model' => fake()->randomElement(['Urban', 'Mountain', 'Electric']),
            'price_per_hour' => fake()->randomFloat(2, 2, 10),
            'status' => 'available'
        ];
    }
}
