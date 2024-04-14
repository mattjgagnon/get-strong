<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class SetSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sets')->insert([
            'number' => 3,
        ]);
    }
}
