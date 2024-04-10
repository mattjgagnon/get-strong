<?php

namespace Database\Seeders;

use App\Models\ExerciseSession;
use Illuminate\Database\Seeder;

final class ExerciseSessionSeeder extends Seeder
{
    public function run(): void
    {
        ExerciseSession::factory()
            ->count(50)
            ->create();
    }
}
