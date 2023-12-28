<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Admin User', // Set the admin's name
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Admin User', // Set the admin's name
            'email' => 'admin@example.co',
            'password' => bcrypt('adminpassword'),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Ibrahim', // Set the admin's name
            'email' => 'ibrahim@example.com',
            'password' => bcrypt('adminpassword'),
            'role' => 'admin',
        ]);

        // Create a regular user
        User::factory()->create([
            'name' => 'Regular User', // Set the user's name
            'email' => 'user@example.com', // Set the user's email
            'password' => bcrypt('userpassword'), // Set the user's password
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Super Admin', // Set the user's name
            'email' => 'sadmin@example.com', // Set the user's email
            'password' => bcrypt('sadminpassword'), // Set the user's password
            'role' => 'super_admin',
        ]);
    }
}
