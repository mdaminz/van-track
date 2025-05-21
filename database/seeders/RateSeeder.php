<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rates')->insert([
            [
                'school_id' => 1,
                'district' => 'Kelana Jaya',
                'price' => 100.00,
                'van_id' => 1,
                'start_time' => '07:00',
                'end_time' => '13:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'school_id' => 2,
                'district' => 'Kelana Jaya',
                'price' => 120.00,
                'van_id' => 1,
                'start_time' => '12:30',
                'end_time' => '18:30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'school_id' => 1,
                'district' => 'Sungai Way',
                'price' => 120.00,
                'van_id' => 2,
                'start_time' => '07:00',
                'end_time' => '12:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'school_id' => 2,
                'district' => 'Sungai Way',
                'price' => 120.00,
                'van_id' => 2,
                'start_time' => '12:30',
                'end_time' => '18:30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
