<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

final class TagSeeder extends Seeder
{
    public function run()
    {
        Tag::factory()
            ->count(50)
            ->create();
    }
}
