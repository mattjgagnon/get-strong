<?php

namespace Database\Factories;

use App\Models\Set;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Set>
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
