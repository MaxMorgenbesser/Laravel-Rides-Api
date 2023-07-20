<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ride>
 */
class RideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_location' => fake() ->sentence(3),
            'end_location' => fake() ->sentence(3),
            'request_time' => fake() -> dateTimeBetween('now', '+1 day'),
            'dropoff_time' => fake() -> dateTimeBetween('now', '+1 day')
        ];
    }
}

// $table->text('start_location');
// $table->text('end_location');
// $table->dateTime('request_time');
// $table->dateTime('dropoff_time');