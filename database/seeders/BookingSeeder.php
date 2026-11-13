<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bike;
use App\Models\User;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();

        Bike::take(3)->get()->each(function (Bike $bike) use ($user) {
            Booking::factory()->create([
                'user_id' => $user->id,
                'bike_id' => $bike->id,
            ]);
        });
    }
}
