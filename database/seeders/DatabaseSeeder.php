<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Storeowner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call([
        CategorySeeder::class,
        UserSeeder::class,
        StoreownerSeeder::class,  // Add this line
    ]);

    // Listings will now use the verified storeowners only
    Listing::factory(500)->recycle([Category::all(), Storeowner::where('status', 'Verified')->get()])->create();
}

}
