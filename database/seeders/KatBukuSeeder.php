<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KatBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kat_buku')->insert([
            ['id_kat_buku' => 1, 'nama_kat_buku' => 'Perpang', 'created_at' => now(), 'updated_at' => now()],
            ['id_kat_buku' => 2, 'nama_kat_buku' => 'Jukgar', 'created_at' => now(), 'updated_at' => now()],
            ['id_kat_buku' => 3, 'nama_kat_buku' => 'Juknis', 'created_at' => now(), 'updated_at' => now()],
            ['id_kat_buku' => 4, 'nama_kat_buku' => 'Naskah Sementara', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
