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
            [
                'user_id' => 6,
                'rating' => '5',
                'message' => 'Sangat membantu dan mudah digunakan untuk ibu bapa.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 7,
                'rating' => '3',
                'message' => 'Sistem agak perlahan pada waktu puncak. Harap boleh ditambah baik.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 8,
                'rating' => '4',
                'message' => 'Reka bentuk yang ringkas dan mudah difahami.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 9,
                'rating' => '5',
                'message' => 'Membantu saya memantau anak-anak dengan lebih mudah.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 10,
                'rating' => '4',
                'message' => 'Fungsi keselamatan sangat bagus, terutama pengesahan RFID.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'rating' => '2',
                'message' => 'Sering mengalami gangguan sambungan. Perlu diperbaiki.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 12,
                'rating' => '5',
                'message' => 'Sangat berbaloi digunakan untuk pemantauan harian.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 13,
                'rating' => '3',
                'message' => 'Ciri-ciri asas bagus, tetapi boleh ditambah lebih banyak fungsi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 4,
                'rating' => '4',
                'message' => 'Saya suka sistem notifikasi ibu bapa, sangat berguna.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'rating' => '5',
                'message' => 'Keseluruhan pengalaman menggunakan sistem ini sangat positif!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
