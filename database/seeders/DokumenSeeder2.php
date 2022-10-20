<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenSeeder2 extends Seeder
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
                'judul' => 'Penetapan Kader Taman Posyandu "Anggrek Ceria" Desa Tambong Kecamatan Kabat Kabupaten Banyuwangi',
                'nomor' => '188/81/KEP/429.506.014/2022',
                'id_tipe_dokumen' => 4,
                'tanggal_pengesahan' => '2022-06-13',
                'username_penyimpan' => 'khoirulumam'
            ],
            [
                'judul' => 'Penetapan Perubahan Keluarga Penerima Bantuan Langsung Tunai Dana Desa (BLT-DD) Tahun 2022',
                'nomor' => '04',
                'id_tipe_dokumen' => 2,
                'tanggal_pengesahan' => '2022-04-05',
                'username_penyimpan' => 'khoirulumam'
            ],
            [
                'judul' => 'Susunan Organisasi dan Tata Kerja Pemerintah Desa',
                'nomor' => '1',
                'id_tipe_dokumen' => 2,
                'tanggal_pengesahan' => '2022-01-03',
                'username_penyimpan' => 'khoirulumam'
            ],
            [
                'judul' => 'Pemberhentian Perangkat Desa Tambong Kecamatan Kabat Kabupaten Banyuwangi',
                'nomor' => '188/65/KEP/429.506.014/2022',
                'id_tipe_dokumen' => 4,
                'tanggal_pengesahan' => '2022-04-28',
                'username_penyimpan' => 'khoirulumam'
            ],
            [
                'judul' => 'Pengangkatan Perangkat Desa Tambong Kecamatan Kabat Kabupaten Banyuwangi',
                'nomor' => '188/100/KEP/429.506.014/2022',
                'id_tipe_dokumen' => 4,
                'tanggal_pengesahan' => '2022-08-11',
                'username_penyimpan' => 'khoirulumam'
            ],
            [
                'judul' => 'Pembentukan Pengurus Tim Penggerak Pemberdayaan dan Kesejahteraan Keluarga (TP-PKK) Desa Tambong Kecamatan Kabat Kabupaten Banyuwangi',
                'nomor' => '188/59/KEP/429.506.014/2022',
                'id_tipe_dokumen' => 4,
                'tanggal_pengesahan' => '2022-03-18',
                'username_penyimpan' => 'khoirulumam'
            ],
            [
                'judul' => 'Pembentukan dan Pelaksanaan Usaha Peningkatan Pendapatan Keluarga dan Kelompok Khusus Desa Tambong Kecamatan Kabat Kabupaten Banyuwangi',
                'nomor' => '188/66/KEP/429.506.014/2022',
                'id_tipe_dokumen' => 4,
                'tanggal_pengesahan' => '2022-04-28',
                'username_penyimpan' => 'khoirulumam'
            ],
        ]);
    }
}
