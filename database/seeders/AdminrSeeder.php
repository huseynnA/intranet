<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User', // Set the admin's name
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'),
            'role' => 2,
        ]);
        User::factory()->create([
            'name' => 'Machinist User', // Set the admin's name
            'email' => 'machinist@example.com',
            'password' => bcrypt('userpassword'),
            'role' => 1,
        ]);
        User::factory()->create([
            'name' => 'Admin User', // Set the admin's name
            'email' => 'admin@example.co',
            'password' => bcrypt('adminpassword'),
            'role' => 2,
        ]);
        User::factory()->create([
            'name' => 'Ibrahim', // Set the admin's name
            'email' => 'ibrahim@example.com',
            'password' => bcrypt('adminpassword'),
            'role' => 2,
        ]);

        // Create a regular user
        User::factory()->create([
            'name' => 'Regular User', // Set the user's name
            'email' => 'user@example.com', // Set the user's email
            'password' => bcrypt('userpassword'), // Set the user's password
            'role' => 0,
        ]);

        User::factory()->create([
            'name' => 'Super Admin', // Set the user's name
            'email' => 'sadmin@example.com', // Set the user's email
            'password' => bcrypt('sadminpassword'), // Set the user's password
            'role' => 3,
        ]);
    }
}
