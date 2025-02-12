<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class AdminUserSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         //
//     }
// }
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // User::updateOrCreate(
        //     ['email' => 'admin@example.com'], // Find user by email
        //     [
        //         'name' => 'Admin User',
        //         'password' => bcrypt('password123'), // Set or update the password
        //         'is_admin' => 1, // Promote to admin
        //     ]
        // );
    }
}
