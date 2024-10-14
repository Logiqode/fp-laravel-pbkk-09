<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'id' => 1,
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('akuadmin'),
            'is_storeowner' => 0,
            'is_admin' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $jeremy = User::create([
            'id' => 2,
            'name' => 'Jeremy James',
            'username' => 'jeremyjames',
            'email' => 'jeremy@gmail.com',
            'password' => Hash::make('akujeremy'),
            'is_storeowner' => 1,
            'is_admin' => 0,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $ranto = User::create([
            'id' => 3,
            'name' => 'Ranto Bastara Hamonangan Sitorus',
            'username' => 'rantobastara',
            'email' => 'ranto@gmail.com',
            'password' => Hash::make('akuranto'),
            'is_storeowner' => 1,
            'is_admin' => 0,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::factory(30)->storeowner()->create();
        User::factory(70)->create();
    }
}
