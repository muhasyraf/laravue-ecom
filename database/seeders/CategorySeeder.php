<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Fruits', 'Vegetables', 'Meat', 'Fish', 'Dairy'];
        for ($i = 0; $i < 5; $i++) {
            Category::create([
                'name' => $categories[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
