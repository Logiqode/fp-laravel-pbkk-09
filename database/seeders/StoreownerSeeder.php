<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Storeowner;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class StoreownerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Create 2 initial store owners
    Storeowner::create([
        'store_name' => 'Toko Jeremy',
        'store_description' => 'Toko Jeremy adalah toko yang menjual berbagai macam barang elektronik',
        'store_slug' => 'toko-jeremy',
        'status' => 'Pending',
        'user_id' => 2 // assuming this corresponds to the second user created
    ]);

    Storeowner::create([
        'store_name' => 'Toko Ranto',
        'store_description' => 'Toko Ranto adalah toko yang menjual berbagai macam makanan',
        'store_slug' => 'toko-ranto',
        'status' => 'Pending',
        'user_id' => 3 // assuming this corresponds to the third user created
    ]);

    // Create 30 more store owners using existing users
    $existingStoreowners = User::where('is_storeowner', 1)->take(30)->get();

    foreach ($existingStoreowners as $user) {
        Storeowner::create([
            'store_name' => fake()->company,
            'store_description' => fake()->text(100),
            'store_slug' => Str::slug(fake()->company),
            'status' => 'Verified',
            'user_id' => $user->id,
        ]);
    }
}
}
