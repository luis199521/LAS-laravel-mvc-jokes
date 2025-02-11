<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $categories = [
            ['category_name' => 'Animals'],
            ['category_name' => 'Sports'],
            ['category_name' => 'People'],
            ['category_name' => 'Food'],
        ];

       
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

