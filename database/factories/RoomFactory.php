<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // add factory, roomNumber, childrenCapacity, adultCapacity and Price
            'roomNumber' => $this->faker->numberBetween(1, 100),
            'childrenCapacity' => $this->faker->numberBetween(0, 10),
            'adultCapacity' => $this->faker->numberBetween(0, 10),
            'price' => $this->faker->numberBetween(100, 1000)
        ];
    }
}
