<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokumen')->insert([
            [
                'judul' => 'Pendirian Badan Usaha Milik Desa "BUM Desa Rekso Wijoyo Tambong"',
                'nomor' => '05',
                'id_tipe_dokumen' => 1,
                'tanggal_pengesahan' => '2021-09-06',
                'username_penyimpan' => 'khoirulumam'
            ],
            [
                'judul' => 'Anggaran Rumah Tangga Badan Usaha Milik Desa "BUM Desa Rekso Wijoyo Tambong"',
                'nomor' => '05',
                'id_tipe_dokumen' => 2,
                'tanggal_pengesahan' => '2021-09-06',
                'username_penyimpan' => 'khoirulumam'
            ]
        ]);
    }
}
