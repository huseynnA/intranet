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
      /*  User::factory()->create([
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
        ]); */
        User::factory()->create([
            'name' => ' Super Admin', // Set the admin's name
            'fullname' => ' Ibrahim Qasimzadeh', // Set the admin's name
            'country' => 'Azerbaijan',
            'phone_number' => '055-55f-5-5',
            'internal_number' => '055-55d-5-5',
            'profile_photo_url'=>'https://a0.anyrgb.com/pngimg/1368/1520/marketer-person-icon-navigation-bar-bootstrap-dating-github-wordpress-avatar-user-cheek.png',
            'email' => 'sadmin@example.com',
            'password' => bcrypt('sadminpassword'),
            'position'=>'Admin',
            'department'=>'IT',
            'role' => 3,
        ]);
        User::factory()->create([
            'name' => ' Ali', // Set the admin's name
            'fullname' => ' ALi Aliyev', // Set the admin's name
            'country' => 'Azerbaijan',
            'phone_number' => '055-55-5-5',
            'internal_number' => '055-55-5-5',
            'profile_photo_url'=>'https://a0.anyrgb.com/pngimg/954/884/dropdown-list-user-profile-profile-wordpress-avatar-person-heroes-user-body-jewelry-icons.png',
            'email' => 'machinist@example.com',
            'password' => bcrypt('userpassword'),
            'position'=>'Manager',
            'department'=>'IT',
            'role' => 2,
        ]);

        User::factory()->create([
            'name' => ' Memmed', // Set the admin's name
            'fullname' => ' Memmed Memmedov', // Set the admin's name
            'country' => 'Azerbaijan',
            'phone_number' => '055-55-5-5',
            'internal_number' => '055-55-5-5',
            'profile_photo_url'=>'asset("assets/img/avatars/1.png")',
            'email' => 'memmed@example.com',
            'password' => bcrypt('userpassword'),
            'position'=>'Manager',
            'department'=>'IT',
         
        ]);
    }
}
