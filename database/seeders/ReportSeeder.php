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
                'image' => 'null',
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
                'image' => 'null',
                'status' => 'Unresolved',
                'resolved_at' => null,
                'remarks' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 8,
                'type' => 'Kelewatan Van',
                'subject' => 'Van Sekolah Sering Lewat di Kawasan Penjemputan',
                'description' => 'Saya ingin melaporkan bahawa van sekolah yang menjemput anak saya sering tiba lewat di kawasan penjemputan pada waktu pagi. Kelewatan ini menyebabkan anak saya terpaksa menunggu di luar rumah dalam cuaca yang tidak menentu, seperti hujan dan panas terik. Ini bukan sahaja tidak selesa, tetapi juga membahayakan kesihatan anak saya.

Saya faham bahawa kadangkala terdapat masalah lalu lintas, tetapi kelewatan ini sudah berlarutan selama lebih daripada dua minggu tanpa sebarang notifikasi dari pihak pemandu atau pengurusan. Saya berharap agar jadual van dapat dikaji semula dan pemandu diberi arahan supaya memastikan ketepatan masa demi keselesaan dan keselamatan murid-murid.

Selain itu, saya juga mencadangkan supaya ibu bapa dapat menerima notifikasi automatik melalui aplikasi VanTrack sekiranya van mengalami kelewatan supaya kami dapat membuat persiapan sewajarnya. Terima kasih atas perhatian yang diberikan.',
                'image' => 'null',
                'status' => 'Unresolved',
                'resolved_at' => null,
                'remarks' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 9,
                'type' => 'Keadaan Van',
                'subject' => 'Keadaan Van Sekolah yang Perlu Dibaiki',
                'description' => 'Saya ingin menzahirkan kebimbangan tentang keadaan van sekolah yang membawa anak saya. Baru-baru ini, saya perhatikan van tersebut mempunyai beberapa kerosakan seperti pintu yang sukar ditutup dengan betul, penghawa dingin yang tidak berfungsi dengan baik, dan bunyi enjin yang kuat dan tidak normal.

Keadaan ini bukan sahaja menyebabkan ketidakselesaan kepada anak-anak yang menaiki van, tetapi juga boleh menimbulkan risiko keselamatan jika kerosakan bertambah serius. Saya berharap pihak pengurusan VanTrack dapat segera mengambil tindakan untuk melakukan penyelenggaraan dan pemeriksaan menyeluruh terhadap van tersebut agar semua peralatan berada dalam keadaan baik dan selamat digunakan.

Saya juga berharap agar jadual penyelenggaraan kenderaan dapat diumumkan kepada ibu bapa agar kami lebih yakin terhadap tahap keselamatan yang disediakan oleh pihak VanTrack.',
                'image' => 'null',
                'status' => 'Resolved',
                'resolved_at' => Carbon::now()->subDays(3),
                'remarks' => 'Pihak VanTrack telah melakukan penyelenggaraan dan menggantikan alat penghawa dingin serta membaiki pintu van.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 10,
                'type' => 'Keselamatan Kanak-Kanak',
                'subject' => 'Perlunya Tali Pinggang Keledar di Dalam Van',
                'description' => 'Saya ingin mencadangkan supaya semua murid diwajibkan memakai tali pinggang keledar sepanjang perjalanan dalam van sekolah. Saya risau kerana terdapat beberapa kejadian di mana anak-anak tidak memakai tali pinggang keledar, terutamanya yang duduk di tempat duduk belakang.

Dalam keadaan trafik yang tidak dapat dijangka, tali pinggang keledar adalah penting untuk mengurangkan risiko kecederaan serius sekiranya berlaku kemalangan. Saya juga berharap pihak pengurusan dapat memberikan penerangan kepada pemandu dan murid tentang kepentingan keselamatan ini dan memantau agar peraturan dipatuhi.

Selain itu, saya berharap ada tindakan yang tegas terhadap pemandu yang tidak mengawal disiplin dan keselamatan murid di dalam van. Terima kasih kerana mengambil berat isu ini.',
                'image' => 'null',
                'status' => 'Unresolved',
                'resolved_at' => null,
                'remarks' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'type' => 'Perkhidmatan Pemandu Van',
                'subject' => 'Kelakuan Pemandu Van yang Perlu Diperbaiki',
                'description' => 'Saya ingin membuat aduan mengenai kelakuan pemandu van sekolah yang membawa anak saya. Saya dapati pemandu tersebut kadangkala kurang sabar dan kurang mesra ketika berurusan dengan murid serta ibu bapa.

Ada juga kes di mana pemandu berbicara dengan nada kasar ketika menjawab soalan saya dan beberapa ibu bapa lain. Ini bukan sahaja memberi kesan negatif terhadap imej perkhidmatan VanTrack, malah boleh menyebabkan murid berasa kurang selesa dan kurang selamat.

Saya berharap pihak pengurusan dapat mengambil tindakan segera, mungkin dengan mengadakan sesi latihan khidmat pelanggan kepada pemandu-pemandu van, serta mengambil maklum balas daripada ibu bapa secara berkala agar kualiti perkhidmatan dapat ditingkatkan.',
                'image' => 'null',
                'status' => 'Resolved',
                'resolved_at' => Carbon::now()->subDays(7),
                'remarks' => 'Pemandu van telah diberikan latihan komunikasi dan khidmat pelanggan oleh pihak pengurusan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 12,
                'type' => 'Penambahbaikan Sistem',
                'subject' => 'Cadangan Penambahan Fungsi Notifikasi Dalam Aplikasi VanTrack',
                'description' => 'Saya ingin mencadangkan supaya aplikasi VanTrack ditambahbaik dengan fungsi notifikasi secara langsung kepada ibu bapa mengenai sebarang kejadian penting, seperti kelewatan van, perubahan jadual, atau kecemasan.

Pada masa ini, saya rasa notifikasi yang diterima kurang cepat dan tidak cukup informatif. Jika ada fungsi push notification yang lebih interaktif, ia akan membantu ibu bapa membuat persediaan dengan lebih baik dan memastikan keselamatan anak-anak lebih terjamin.

Saya percaya penambahbaikan ini akan meningkatkan tahap kepuasan pengguna aplikasi VanTrack dan menjadikan komunikasi antara pihak pengurusan dan ibu bapa lebih efektif.',
                'image' => 'null',
                'status' => 'Unresolved',
                'resolved_at' => null,
                'remarks' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 13,
                'type' => 'Kebersihan Van',
                'subject' => 'Permohonan Penambahbaikan Kebersihan Dalam Van Sekolah',
                'description' => 'Saya ingin memohon agar kebersihan dalam van sekolah yang membawa anak saya diberi perhatian yang lebih serius. Baru-baru ini, saya perhatikan terdapat sampah yang tidak dibersihkan dan bau yang kurang menyenangkan di dalam van.

Ini bukan sahaja tidak selesa untuk anak-anak, tetapi juga boleh memberi kesan negatif terhadap kesihatan mereka, terutama bagi murid yang mempunyai masalah pernafasan atau alahan. Saya berharap pihak pengurusan dapat menetapkan jadual pembersihan yang kerap dan memastikan van sentiasa dalam keadaan bersih dan segar.

Saya percaya suasana yang bersih dan selesa akan meningkatkan pengalaman dan keselamatan murid sepanjang perjalanan ke dan dari sekolah.',
                'image' => 'null',
                'status' => 'Resolved',
                'resolved_at' => Carbon::now()->subDays(2),
                'remarks' => 'Jadual pembersihan van telah dipertingkatkan dan van dibersihkan setiap hari.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 6,
                'type' => 'Sistem Kehadiran',
                'subject' => 'Isu Penggunaan Kad RFID untuk Mencatat Kehadiran',
                'description' => 'Saya ingin melaporkan masalah yang dialami oleh anak saya dalam menggunakan kad RFID untuk mencatat kehadiran menaiki van sekolah. Kad RFID sering gagal diimbas apabila anak saya cuba untuk masuk ke dalam van, menyebabkan pemandu van perlu melakukan pengesahan manual.

Situasi ini menyebabkan kelewatan dan kekeliruan semasa proses menaiki van, terutamanya ketika waktu sibuk. Saya berharap pihak pengurusan dapat memastikan sistem RFID sentiasa berfungsi dengan baik dan mengkaji semula teknologi yang digunakan agar lebih efisien dan mudah digunakan.

Saya juga mencadangkan agar pemandu diberi latihan tambahan tentang cara mengendalikan sistem RFID dengan betul dan cepat untuk mengelakkan sebarang gangguan dalam proses pengambilan murid.',
                'image' => 'null',
                'status' => 'Unresolved',
                'resolved_at' => null,
                'remarks' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'type' => 'Komunikasi Dengan Pemandu',
                'subject' => 'Kesukaran Menghubungi Pemandu Van Sekolah',
                'description' => 'Saya menghadapi kesukaran untuk menghubungi pemandu van sekolah anak saya terutama ketika terdapat perubahan jadual atau masalah kecemasan. Kadangkala panggilan telefon tidak dijawab dan mesej WhatsApp tidak dibalas.

Situasi ini menyebabkan saya kurang mendapat maklumat terkini dan menimbulkan kebimbangan tentang keselamatan anak saya. Saya berharap pihak VanTrack dapat menyediakan saluran komunikasi yang lebih efisien dan memastikan pemandu sentiasa bersedia untuk berkomunikasi dengan ibu bapa.

Mungkin sistem aplikasi boleh dipertingkatkan dengan fungsi mesej segera (chat) atau pusat bantuan untuk memudahkan komunikasi antara pemandu dan ibu bapa.',
                'image' => 'null',
                'status' => 'Resolved',
                'resolved_at' => Carbon::now()->subDays(1),
                'remarks' => 'Saluran komunikasi diperbaiki dan pemandu diarahkan untuk sentiasa responsif.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 6,
                'type' => 'Pengurusan Masa',
                'subject' => 'Cadangan Penambahbaikan Pengurusan Masa Van Sekolah',
                'description' => 'Saya ingin mencadangkan agar pihak pengurusan VanTrack mengkaji semula jadual van sekolah supaya lebih efisien dan mengurangkan masa menunggu di setiap lokasi penjemputan.

Anak saya dan murid lain sering menunggu terlalu lama di perhentian van yang seterusnya kerana van berhenti lama di lokasi lain. Ini menyebabkan masa perjalanan menjadi panjang dan membuang masa anak-anak yang sepatutnya digunakan untuk aktiviti pembelajaran.

Saya berharap agar pemandu diberikan panduan masa yang lebih ketat dan penggunaan teknologi pemantauan masa sebenar (real-time tracking) dapat diperluas bagi memberi maklumat tepat kepada ibu bapa dan murid.',
                'image' => 'null',
                'status' => 'Unresolved',
                'resolved_at' => null,
                'remarks' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 7,
                'type' => 'Kualiti Khidmat Pelanggan',
                'subject' => 'Saranan Untuk Meningkatkan Kualiti Khidmat Pelanggan VanTrack',
                'description' => 'Saya ingin memberikan saranan supaya pihak VanTrack dapat meningkatkan kualiti khidmat pelanggan kepada ibu bapa dan murid.

Kadangkala, pertanyaan dan aduan yang saya buat mengambil masa yang agak lama untuk mendapat maklum balas. Saya mencadangkan supaya sistem pengurusan aduan dan khidmat pelanggan dapat diperbaiki, mungkin dengan menggunakan chatbot atau sistem tiket aduan yang lebih sistematik.

Saya juga berharap agar pihak pengurusan dapat mengadakan sesi dialog bersama ibu bapa secara berkala untuk mendengar maklum balas dan memperbaiki mutu perkhidmatan secara berterusan.

Terima kasih kerana sentiasa berusaha untuk memperbaiki perkhidmatan VanTrack.',
                'image' => 'null',
                'status' => 'Resolved',
                'resolved_at' => Carbon::now()->subDays(4),
                'remarks' => 'Sistem tiket aduan telah diperkenalkan dan sesi dialog ibu bapa diadakan secara berkala.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
