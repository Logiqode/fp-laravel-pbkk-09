<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'color' => 'bg-amber-500'
        ]);

        Category::create([
            'name' => 'Food',
            'slug' => 'food',
            'color' => 'bg-green-200'
        ]);

        Category::create([
            'name' => 'Toys',
            'slug' => 'toys',
            'color' => 'bg-teal-200'
        ]);

        Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'color' => 'bg-indigo-200'
        ]);

        Category::create([
            'name' => 'Health & Beauty',
            'slug' => 'health-beauty',
            'color' => 'bg-rose-300'
        ]);

        Category::create([
            'name' => 'Vehicles',
            'slug' => 'vehicles',
            'color' => 'bg-slate-400'
        ]);

        Category::create([
            'name' => 'Collectibles & Art',
            'slug' => 'collectibles-art',
            'color' => 'bg-orange-400'
        ]);

        Category::create([
            'name' => 'Sporting Goods',
            'slug' => 'sporting-goods',
            'color' => 'bg-emerald-500'
        ]);

        Category::create([
            'name' => 'Furniture',
            'slug' => 'furniture',
            'color' => 'bg-orange-200'
        ]);

        Category::create([
            'name' => 'Fresh Produce',
            'slug' => 'fresh-produce',
            'color' => 'bg-emerald-200'
        ]);

        Category::create([
            'name' => 'Services',
            'slug' => 'services',
            'color' => 'bg-sky-200'
        ]);

        Category::create([
            'name' => 'Digital Goods',
            'slug' => 'digital-goods',
            'color' => 'bg-cyan-400'
        ]);

        Category::create([
            'name' => 'Others',
            'slug' => 'Others',
            'color' => 'bg-red-400'
        ]);
    }
}
