<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('exercises')->insert([
            'name' => 'Dumbbell Military Press',
            'instructions' => 'Press dumbbells over your head',
        ]);
    }
}
