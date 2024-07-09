<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku')->insert([
            [
                'id_buku' => '96ce1a1b-5b3f-4b74-a64e-3827f3ace128',
                'id_kat_buku' => 3,
                'no_buku' => '080503',
                'nama_buku' => 'PETUNJUK TEKNIS PENGELOLAAN PERGUDANGAN KESEHATAN TENTARA NASIONAL INDONESIA',
                'tahun_terbit' => 2016,
                'abstraksi' => 'Pengelolaan pergudangan kesehatan saat ini belum ada keseragaman pemahaman, tindakan, dan prosedur administrasi dikarenakan belum adanya petunjuk tata cara pengelolaan pergudangan Matkes y',
                'file_buku' => 'buku/i3RjFJhSe0YfrGJalrC8Haxf8H73gqMoLiqSU0Bu.pdf',
                'created_at' => '2022-07-18 04:44:14',
                'updated_at' => '2022-08-18 05:15:03',
            ],
            [
                'id_buku' => '970c63e6-bf1a-4804-9afa-e8ce365c4f4f',
                'id_kat_buku' => 3,
                'no_buku' => '080504',
                'nama_buku' => 'PETUNJUK TEKNIS  PENILAIAN STATUS GIZI PRAJURIT TENTARA NASIONAL INDONESIA',
                'tahun_terbit' => 2016,
                'abstraksi' => 'Prajurit Tentara Nasional Indonesia sebagai komponen bangsa memiliki salah satu tugas pokok yaitu mempertahankan kedaulatan Negara Kesatuan Republik Indonesia. Agar dapat melaksanakan tug',
                'file_buku' => 'buku/cEHeJrAKNa4xLuOEVXgdCmW4AGKhWeQuMWxetofa.pdf',
                'created_at' => '2022-08-18 03:51:54',
                'updated_at' => '2022-08-18 05:17:06',
            ],
            [
                'id_buku' => '970c94a0-f2dd-4710-bad3-b3c833afa99e',
                'id_kat_buku' => 4,
                'no_buku' => '103',
                'nama_buku' => 'NASKAH SEMENTARA PETUNJUK PENYELENGGARAAN KERJA SAMA DAN BAKTI KESEHATAN DI LINGKUNGAN TENTARA NASIONAL INDONESIA',
                'tahun_terbit' => 2017,
                'abstraksi' => 'Sejalan dengan perkembangan situasi saat ini tugas Puskes TNI banyak mengalami perubahan antara lain meningkatkan interoperabilitas di bidang dukungan logistik kesehatan, membangun kompet',
                'file_buku' => 'buku/skNEO9mR8dP6B75wJiqeIPPh0zBYK6TVBOvOt6KC.pdf',
                'created_at' => '2022-08-18 06:08:09',
                'updated_at' => '2022-08-18 06:08:09',
            ],
            [
                'id_buku' => '970c9370-35b5-42de-972a-567de4b0ab05',
                'id_kat_buku' => 1,
                'no_buku' => '53',
                'nama_buku' => 'PENYELENGGARAAN PENGELOLAAN KEUANGAN BADAN LAYANAN UMUM  FASILITAS KESEHATAN DI LINGKUNGAN TENTARA NASIONAL INDONESIA',
                'tahun_terbit' => 2016,
                'abstraksi' => 'BLU bertujuan untuk meningkatkan pelayanan kepada personel TNI dan keluarganya dalam rangka memberikan fleksibilitas dalam pengelolaan keuangan di lingkungan rumah sakit TNI berdasarkan',
                'file_buku' => 'buku/ccn7XMSkke45sLc9zpcOPmeQ7dSvAxEyKOh8XaWF.pdf',
                'created_at' => '2022-08-18 06:04:50',
                'updated_at' => '2022-08-18 06:04:50',
            ],
        ]);
    }
}
