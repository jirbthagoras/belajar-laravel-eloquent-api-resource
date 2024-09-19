<?php

namespace Database\Seeders;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->create([
            'name' => 'Food',
        ]);

            Category::query()->create([
            'name' => 'Gadget',
        ]);
    }
}
