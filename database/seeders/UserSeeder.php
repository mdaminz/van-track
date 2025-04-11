<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Muhammad Admin',
                'email' => 'admin@gmail.com',
                'phone' => '017-6532057',
                'address' => 'No 50 Jalan Ungu U9/35 40150 Shah Alam',
                'status' => 'Active',
                'usertype' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Encrypt the password
                'profile_photo_path' => 'profile_photos/default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Driver One',
                'email' => 'driver_one@gmail.com',
                'phone' => '017-7266352',
                'address' => 'No 23 Jalan Ganung',
                'status' => 'Active',
                'usertype' => 'driver',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile_photos/jason.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Driver Two',
                'email' => 'driver_two@gmail.com',
                'phone' => '012-7378384',
                'address' => 'No 24 Jalan Singa',
                'status' => 'Active',
                'usertype' => 'driver',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile_photos/han.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muhammad Amin Bin Abd Rani',
                'email' => 'amin@gmail.com',
                'phone' => '011-2352374',
                'address' => 'No 23 Jalan Datuk',
                'status' => 'Active',
                'usertype' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile_photos/amin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amirah Syahirah Binti Ahmad',
                'email' => 'amirah@gmail.com',
                'phone' => '011-2323374',
                'address' => 'No 23 Jalan Datuk Onn',
                'status' => 'Active',
                'usertype' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile_photos/mira.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
