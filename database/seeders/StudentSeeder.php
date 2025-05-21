<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [];

        // Fetch only users with usertype 'user'
        $userIds = DB::table('users')->where('usertype', 'user')->pluck('id')->toArray();

        $districts = ['Kelana Jaya', 'Sungai Way', 'Kelana Jaya', 'Sungai Way'];
        $school_ids = [1, 2, 1, 2];

        $names = [
            'Siti Zahrah Binti Ahmad', 'Ahmad Haris Bin Ali', 'Nur Izzah Binti Zainal',
            'Muhammad Faris Bin Rahim', 'Alya Sofea Binti Kamal', 'Imran Hakimi Bin Azlan',
            'Hana Batrisya Binti Hadi', 'Danish Irfan Bin Roslan', 'Nabila Binti Ridzuan', 'Faiz Aiman Bin Shahrul',

            'Puteri Balqis Binti Ariffin', 'Syahmi Bin Zulkifli', 'Adriana Nur Binti Hassan',
            'Luqman Hakim Bin Saari', 'Anis Aqilah Binti Musa', 'Haris Daniel Bin Johan',
            'Nurin Aina Binti Iskandar', 'Akmal Bin Zainuddin', 'Sarah Maisarah Binti Zul', 'Fikri Aiman Bin Najib',

            'Aqil Rayyan Bin Azmi', 'Nora Afiqah Binti Rahman', 'Ziyad Bin Fauzi', 'Humaira Binti Halim',
            'Rafiq Danish Bin Harun', 'Alisa Binti Mat Noor', 'Mikael Hakim Bin Nordin', 'Nadia Farhana Binti Ramli',
            'Rizqi Bin Yazid', 'Mira Batrisya Binti Lokman',

            'Amir Haziq Bin Ramlan', 'Balqis Nur Binti Amran', 'Zulhilmi Bin Fadzil', 'Khairina Binti Mahzan',
            'Aiman Haikal Bin Rashid', 'Syazana Binti Khalid', 'Aqilah Binti Zainal', 'Irfan Shah Bin Malik',
            'Shazana Farhana Binti Kamarul', 'Arif Danish Bin Azhar'
        ];

        for ($rateId = 1; $rateId <= 4; $rateId++) {
            for ($i = 0; $i < 10; $i++) {
                $index = ($rateId - 1) * 10 + $i;

                $students[] = [
                    'full_name' => $names[$index],
                    'date_of_birth' => '2009-' . str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT) . '-' . str_pad(rand(1, 28), 2, '0', STR_PAD_LEFT),
                    'address' => 'No ' . rand(10, 99) . ', Jalan SS' . rand(1, 10) . '/' . rand(1, 20) . ', ' . $districts[$rateId - 1] . ', Petaling Jaya',
                    'school_id' => $school_ids[$rateId - 1],
                    'district' => $districts[$rateId - 1],
                    'profile_photo' => 'no-profile.png',
                    'rfid_tag' => 'RFID' . strtoupper(Str::random(6)) . rand(10, 99),
                    'emergency_contact' => '01' . rand(1, 9) . rand(1000000, 9999999),
                    'relationship' => 'Mother',
                    'status' => 'Active',
                    'user_id' => $userIds[array_rand($userIds)],
                    'rate_id' => $rateId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('students')->insert($students);
    }
}
