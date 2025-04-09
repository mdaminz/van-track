<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('forums')->insert([
            [
                'post_content' => 'Assalamualaikum, saya ingin bertanya tentang keperluan membawa kad RFID setiap hari. Jika kad hilang, adakah ada cara lain untuk mencatat kehadiran?',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 4,
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => 'Van sekolah anak saya sering tiba lewat. Adakah ibu bapa lain mengalami masalah yang sama? Mohon pandangan atau cadangan penyelesaian.',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 5,
                'image' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => '📢 Pengumuman Penting: Perubahan Jadual Pengambilan Murid 🚐

Assalamualaikum & Salam Sejahtera kepada semua ibu bapa,

Kami ingin memaklumkan bahawa terdapat sedikit perubahan dalam jadual pengambilan murid oleh van sekolah pada hari Isnin, 18 Mac 2025 disebabkan kerja penyelenggaraan jalan di kawasan sekolah.

📍 Perubahan Jadual:
✅ Waktu Pengambilan Pagi: 6:30 AM - 7:00 AM (lebih awal dari biasa)
✅ Waktu Pulang: Tiada perubahan, tetap mengikut jadual biasa

Kami memohon kerjasama ibu bapa untuk memastikan anak-anak bersedia lebih awal pada hari tersebut. Jika terdapat sebarang pertanyaan, sila hubungi pemandu van melalui aplikasi VanTrack atau WhatsApp kami di 012-3456789.

Terima kasih atas kerjasama anda! 🙏😊

- Pengurusan Van Sekolah 🚐',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 1,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
