<?php

namespace Database\Seeders;

use App\Models\Storeowner;
use Illuminate\Database\Seeder;

class StoreownerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storeowner::create([
            'store_name' => 'Toko Jeremy',
            'store_description' => 'Toko Jeremy adalah toko yang menjual berbagai macam barang elektronik',
            'store_slug' => 'toko-jeremy',
            'status' => 'Pending',
            'user_id' => 2
        ]);

        Storeowner::create([
            'store_name' => 'Toko Ranto',
            'store_description' => 'Toko Ranto adalah toko yang menjual berbagai macam makanan',
            'store_slug' => 'toko-ranto',
            'status' => 'Pending',
            'user_id' => 3
        ]);

        // Create 3 Pending store owners
        Storeowner::factory()->count(1)->create([
            'status' => 'Pending'
        ]);

        // Create 29 Verified store owners
        Storeowner::factory()->count(29)->create([
            'status' => 'Verified'
        ]);
    }
}
