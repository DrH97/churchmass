<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Church>
 */
class ChurchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(['Basilica', 'Parish', 'Church', 'Chapel']);

        return [
            'name' => fake()->city() . ' ' . $type,
            'type' => $type,
            'address' => fake()->streetAddress(),
            'latitude' => fake()->latitude(-1, 35),
            'longitude' => fake()->longitude(0, 42),
        ];
    }
}
