<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ExerciseSeeder::class,
            SessionSeeder::class,
            SetSeeder::class,
            TagSeeder::class,
            UserSeeder::class,
        ]);
    }
}
