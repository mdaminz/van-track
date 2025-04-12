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
                'price' => 50.00,
                'van_id' => 1,
                'start_time' => '07:00',
                'end_time' => '13:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'school_id' => 2,
                'district' => 'Sungai Way',
                'price' => 60.00,
                'van_id' => 2,
                'start_time' => '07:30',
                'end_time' => '14:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
