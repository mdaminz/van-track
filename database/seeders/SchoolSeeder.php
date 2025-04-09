<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert([
            [
                'type' => 'first',
                'name' => 'Sekolah Kebangsaan Seri Damai',
                'first_address' => 'SK Kampung Tunku',
                'second_address' => 'Jln SS 1/11, Kampung Tunku, 47300 Petaling Jaya, Selangor',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'type' => 'first',
                'name' => 'Sekolah Kebangsaan Sri Kelana',
                'first_address' => 'SK Sri Kelana',
                'second_address' => 'Jalan SS 5b/3, Ss 5, 47301 Petaling Jaya, Selangor',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'type' => 'second',
                'name' => 'Sekolah Menengah Kebangsaan Sri Permata',
                'first_address' => 'SMK Sri Permata',
                'second_address' => '3, Jalan SS 3/98, Taman Universiti, 47300 Petaling Jaya, Selangor',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'type' => 'first',
                'name' => 'Sekolah Menengah Kebangsaan Kelana Jaya',
                'first_address' => 'SMK Kelana Jaya',
                'second_address' => 'Jalan Bahagia, Ss 4, 47301 Petaling Jaya, Selangor',
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
