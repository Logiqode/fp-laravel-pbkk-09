<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StoreownerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'store_name' => fake()->company(),
            'store_description' => fake()->realText(),
            'store_slug' => Str::slug(fake()->sentence(4)),
            'status' => fake()->randomElement(['Pending', 'Verified', 'Suspended']),
            'user_id' => User::factory(),
        ];
    }
}
