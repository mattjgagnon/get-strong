<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Set>
 */
final class SetFactory extends Factory
{
    public function definition(): array
    {
        return [
            'number' => fake()->numberBetween(1, 5),
            'weight' => fake()->numberBetween(0, 300),
            'repetitions' => fake()->numberBetween(1, 20),
            'duration' => fake()->numberBetween(1, 30),
            'notes' => fake()->sentence,
        ];
    }
}
