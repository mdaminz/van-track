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
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'phone' => '0176532057',
                'address' => 'No 50 Jalan Ungu',
                'license' => null,
                'status' => 'active',
                'usertype' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Encrypt the password
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Parent User 0',
                'email' => 'parent@gmail.com',
                'phone' => '017552374',
                'address' => 'No 23 Jalan Ganung',
                'license' => null,
                'status' => 'active',
                'usertype' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Driver User',
                'email' => 'driver@gmail.com',
                'phone' => '0127378384',
                'address' => 'No 24 Jalan Singa',
                'license' => null,
                'status' => 'active',
                'usertype' => 'driver',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Parent User 1',
                'email' => 'parent1@gmail.com',
                'phone' => '0112352374',
                'address' => 'No 23 Jalan Datuk',
                'license' => null,
                'status' => 'active',
                'usertype' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Parent User 2',
                'email' => 'parent2@gmail.com',
                'phone' => '0175123374',
                'address' => 'No 223 Jalan Burung',
                'license' => null,
                'status' => 'active',
                'usertype' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Parent User 3',
                'email' => 'parent3@gmail.com',
                'phone' => '011232374',
                'address' => 'No 46 Jalan Istana',
                'license' => null,
                'status' => 'active',
                'usertype' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
