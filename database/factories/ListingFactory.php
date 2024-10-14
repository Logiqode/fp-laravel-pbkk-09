<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Storeowner;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(rand(10, rand(7, 14))), 
            'description' => fake()->realText(),
            'slug' => Str::slug(fake()->sentence(4)),
            'price' => fake()->randomFloat(2, 1, 100),
            // 'category' => fake()->randomElement(['Electronics', 'Food', 'Toys', 'Fashion', 'Health & Beauty', 'Vehicles', 'Collectibles & Art', 'Sporting Goods', 'Others', 'Furniture', 'Fresh Produce', 'Services', 'Digital Goods']),
            'status' => fake()->randomElement(['Unlisted', 'Available', 'Out of Stock']),
            'category_id' => Category::factory(),
            'storeowner_id' => Storeowner::factory(),
        ];
    }
}
