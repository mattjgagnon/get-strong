<?php

namespace Database\Factories;

use App\Models\ExerciseSession;
use Illuminate\Database\Eloquent\Factories\Factory;

final class SessionFactory extends Factory
{
    protected $model = ExerciseSession::class;

    public function definition()
    {
        $exampleSessionNames = [
            'Leg Day',
            'Chest Day',
            'Back Day',
            'Arm Day',
            'Shoulder Day',
            'Push Day',
            'Pull Day',
        ];
        return [
            'name' => $this->faker->randomElement($exampleSessionNames),
            'date' => now()->toDateString(),
        ];
    }
}
