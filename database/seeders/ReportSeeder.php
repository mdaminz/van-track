<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reports')->insert([
            [
                'user_id' => 4,
                'type' => 'Kehilangan Kad RFID',
                'subject' => 'Kad RFID Anak Hilang – Mohon Penggantian',
                'description' => 'Saya ingin melaporkan bahawa anak saya telah kehilangan kad RFID yang digunakan untuk menaiki van sekolah. Kehilangan ini disedari pada pagi hari Rabu, 20 Mac 2025, sebelum menaiki van sekolah. Seperti biasa, saya telah menyediakan beg sekolah dan memastikan semua barang keperluan anak saya sudah lengkap sebelum keluar rumah. Namun, ketika ingin memberikan kad RFID kepadanya, saya mendapati kad tersebut tiada dalam beg sekolah atau mana-mana tempat biasa ia diletakkan.  

Saya telah mencari di sekitar rumah, di dalam bilik anak saya, serta dalam kereta, tetapi tidak menemui kad tersebut. Saya juga telah bertanya kepada pemandu van, Encik Rahman, sekiranya kad tertinggal dalam van pada hari sebelumnya, tetapi beliau mengesahkan bahawa tiada sebarang kad ditemui.  

Dengan itu, saya ingin memohon agar pihak pentadbiran VanTrack mengeluarkan kad gantian secepat mungkin supaya kehadiran anak saya dapat terus dipantau dalam sistem. Saya juga berharap agar ada kaedah tambahan yang boleh digunakan sementara waktu, seperti pengesahan manual oleh pemandu van, bagi memastikan anak saya tetap direkodkan dalam sistem tanpa sebarang masalah.  

Saya amat menghargai bantuan dan kerjasama daripada pihak pengurusan dalam menyelesaikan isu ini dengan segera. Terima kasih. ',
                'image' => '',
                'status' => 'Unresolved',
                'resolved_at' => null,
                'remarks' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'type' => 'Laporan Kelewatan',
                'subject' => 'Van Sekolah Lewat Tiba – Mohon Tindakan',
                'description' => 'Saya ingin membuat aduan bahawa van sekolah yang membawa anak saya tiba lewat sebanyak 30 minit pada pagi 20 Mac 2025. Biasanya, van akan tiba di lokasi penjemputan pada jam 6:45 pagi, tetapi hari ini, van hanya tiba pada jam 7:15 pagi. Akibatnya, anak saya terpaksa bergegas ke sekolah dan hampir terlepas waktu perhimpunan pagi.  

Saya memahami bahawa kadangkala mungkin ada masalah trafik atau keadaan tidak dijangka, tetapi ini bukan kali pertama van tiba lewat. Dalam tempoh seminggu ini sahaja, sudah dua kali kelewatan berlaku tanpa sebarang notis awal daripada pemandu. Saya telah cuba menghubungi pemandu, Encik Rahman, namun panggilan saya tidak dijawab. Saya juga tidak menerima sebarang pemberitahuan melalui aplikasi VanTrack mengenai kelewatan ini.  

Saya berharap pihak pengurusan dapat menyiasat punca kelewatan ini dan mengambil tindakan sewajarnya. Jika ada sebarang perubahan jadual atau masalah yang menyebabkan kelewatan, saya berharap ibu bapa dapat dimaklumkan lebih awal supaya kami boleh membuat perancangan alternatif.  

Terima kasih atas perhatian dan tindakan segera daripada pihak VanTrack.',
                'image' => '',
                'status' => 'Unresolved',
                'resolved_at' => null,
                'remarks' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
