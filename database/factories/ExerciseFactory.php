<?php

namespace Database\Factories;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Exercise>
 */
final class ExerciseFactory extends Factory
{
    public function definition(): array
    {
        $exampleExerciseNames = [
            'Pull Up',
            'Bench Press',
            'Triceps Kickback',
            'Squats',
            'Ab Crunches',
            'Biceps Curls',
            'Shoulder Shrugs',
        ];
        return [
            'name' => fake()->randomElement($exampleExerciseNames),
            'instructions' => fake()->paragraph,
        ];
    }
}
