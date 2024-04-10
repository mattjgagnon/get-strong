<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
final class ExerciseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(3),
            'instructions' => fake()->text(),
        ];
    }
}
