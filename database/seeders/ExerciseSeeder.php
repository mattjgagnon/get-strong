<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Seeder;

final class ExerciseSeeder extends Seeder
{
    public function run()
    {
        Exercise::factory()
            ->count(50)
            ->create();
    }
}
