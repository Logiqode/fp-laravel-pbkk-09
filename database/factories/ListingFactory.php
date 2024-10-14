<?php

namespace Database\Factories;

use Exception;
use App\Models\Listing;
use App\Models\Category;
use App\Models\Storeowner;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get a random verified storeowner
        $storeowner = Storeowner::where('status', 'Verified')->inRandomOrder()->first();

        if (!$storeowner) {
            throw new Exception('No verified storeowner available for this listing.');
        }

        return [
            'name' => fake()->sentence(rand(7, 14)),
            'description' => fake()->realText(),
            'slug' => Str::slug(fake()->sentence(4)),
            'price' => fake()->randomFloat(2, 1, 100),
            'status' => $this->getProductStatus(), // Call the function to get the status
            'category_id' => Category::factory(),
            'storeowner_id' => $storeowner->id,
        ];
    }

    /**
     * Get the product status based on weighted distribution.
     *
     * @return string
     */
    protected function getProductStatus(): string
    {
        $statuses = [
            'Available' => 85,
            'Out of Stock' => 10,
            'Unlisted' => 5,
        ];

        $randomNumber = rand(1, 100);
        $cumulative = 0;

        foreach ($statuses as $status => $weight) {
            $cumulative += $weight;
            if ($randomNumber <= $cumulative) {
                return $status;
            }
        }

        return 'Available'; // Fallback in case of an error
    }
}
