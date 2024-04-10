<?php

namespace Database\Seeders;

use App\Models\Set;
use Illuminate\Database\Seeder;

final class SetSeeder extends Seeder
{
    public function run()
    {
        Set::factory()
            ->count(50)
            ->create();
    }
}
