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
                'image' => 'null',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => 'Van sekolah anak saya sering tiba lewat. Adakah ibu bapa lain mengalami masalah yang sama? Mohon pandangan atau cadangan penyelesaian.',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 5,
                'image' => 'null',
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
            [
                'post_content' => 'Adakah sistem VanTrack boleh digunakan jika saya tukar rumah dan van perlu ambil anak saya dari lokasi baru?',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 6,
                'image' => 'null',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => 'Saya cadangkan ada fungsi notifikasi untuk ibu bapa apabila van hampir sampai di lokasi penjemputan. Apa pendapat anda?',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 7,
                'image' => 'null',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => 'Bolehkah pemandu van dibenarkan menggunakan telefon bimbit semasa memandu? Ini agak membahayakan menurut saya.',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 8,
                'image' => 'null',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => 'Terima kasih kepada pemandu van kami yang sentiasa menjaga keselamatan anak-anak kami. Semoga terus cemerlang!',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 9,
                'image' => 'null',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => 'Ada sesiapa yang mengalami masalah dengan aplikasi VanTrack yang tiba-tiba tertutup sendiri? Mohon bantuan.',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 10,
                'image' => 'null',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => 'Pengumuman: Program Kesedaran Keselamatan Jalan Raya akan diadakan di sekolah pada 25 Mac 2025. Semua pelajar wajib hadir.',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 1,
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => 'Saya cadangkan ditambah tempat duduk untuk anak-anak yang tinggal jauh supaya mereka tidak perlu berdiri dalam perjalanan jauh.',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 11,
                'image' => 'null',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => 'Pemandu van di kawasan saya sangat mesra dan sentiasa tepat masa. Terima kasih atas khidmat yang diberikan!',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 12,
                'image' => 'null',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => 'Bagaimana cara untuk menukar nombor telefon dalam profil saya? Saya sudah cuba tapi tak berjaya.',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 13,
                'image' => 'null',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_content' => 'Saya perasan ada van yang tidak menggunakan tag RFID untuk pemandu. Adakah ini dibenarkan?',
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s'),
                'user_id' => 4,
                'image' => 'null',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
