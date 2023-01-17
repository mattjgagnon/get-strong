<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Seeder;

final class SessionSeeder extends Seeder
{
    public function run(): void
    {
        Session::factory()
            ->count(50)
            ->create();
    }
}
