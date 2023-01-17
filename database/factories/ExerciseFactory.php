<?php

namespace Database\Factories;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

final class ExerciseFactory extends Factory
{
    protected $model = Exercise::class;

    public function definition()
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
            'name' => $this->faker->randomElement($exampleExerciseNames),
            'instructions' => $this->faker->paragraph,
        ];
    }
}
