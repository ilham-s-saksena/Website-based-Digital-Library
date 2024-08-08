<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $category = ['Fiction', 'Non-Fiction', 'Science', 'Technology', 'History', 'Art', 'Biography'];

        foreach ($category as $item) {
            Category::create([
                'name' => $item
            ]);
        }
    }
}