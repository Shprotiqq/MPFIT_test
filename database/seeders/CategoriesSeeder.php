<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        Category::query()->insert([
            ['name' => 'Легкий'],
            ['name' => 'Хрупкий'],
            ['name' => 'Тяжелый']
        ]);
    }
}
