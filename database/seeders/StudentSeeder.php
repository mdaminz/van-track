<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'full_name' => 'Ahmad Syafiq Bin Muhammad Amin',
                'date_of_birth' => '2008-06-15',
                'address' => 'No. 12, Jalan Merdeka, 43000 Kajang, Selangor',
                'school' => 'SMK Sri Permata',
                'district'=> 'Sungai Way',
                'profile_photo' => 'kyle.png',
                'rfid_tag' => 'RFID123456',
                'emergency_contact' => '0123456789',
                'relationship' => 'Father',
                'status' => 'active',
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Nur Aisyah Binti Muhammad Amin',
                'date_of_birth' => '2010-02-20',
                'address' => 'No. 45, Taman Harmoni, 54000 Kuala Lumpur',
                'school' => 'SMK Sri Permata',
                'district'=> 'Kelana Jaya',
                'profile_photo' => 'aisyah.png',
                'rfid_tag' => 'RFID987654',
                'emergency_contact' => '0138765432',
                'relationship' => 'Mother',
                'status' => 'active',
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Siti Zahrah Binti Ahmad',
                'date_of_birth' => '2009-08-10',
                'address' => 'No. 88, Jalan Bukit Indah, 81100 Johor Bahru, Johor',
                'school' => 'SK Kampung Tunku',
                'district'=> 'Kampung Tunku',
                'profile_photo' => 'zahrah.png',
                'rfid_tag' => 'RFID112233',
                'emergency_contact' => '0171122334',
                'relationship' => 'Mother',
                'status' => 'active',
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
