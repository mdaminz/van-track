<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('feedback')->insert([
            [
                'user_id' => 4,
                'rating' => '5',
                'message' => 'Perkhidmatan yang sangat baik! Saya sangat berpuas hati dengan sistem ini.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'rating' => '4',
                'message' => 'Sistem ini bagus, tetapi boleh diperbaiki dari segi antara muka pengguna (UI).',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
