<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::query()->insert([
            ['name' => 'Легкий', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Хрупкий', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Тяжелый', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
