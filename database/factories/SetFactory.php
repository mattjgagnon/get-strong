<?php

namespace Database\Factories;

use App\Models\Set;
use Illuminate\Database\Eloquent\Factories\Factory;

final class SetFactory extends Factory
{
    protected $model = Set::class;

    public function definition()
    {
        return [
            'number' => $this->faker->numberBetween(1, 5),
            'weight' => $this->faker->numberBetween(0, 300),
            'repetitions' => $this->faker->numberBetween(1, 20),
            'duration' => $this->faker->numberBetween(1, 30),
            'notes' => $this->faker->sentence,
        ];
    }
}
