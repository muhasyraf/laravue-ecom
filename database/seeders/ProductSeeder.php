<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 0; $j < 10; $j++) {
                Product::create([
                    'category_id' => $i,
                    'name' => $faker->word,
                    'description' => $faker->sentence(20),
                    'price' => $faker->numberBetween(500, 1500),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
