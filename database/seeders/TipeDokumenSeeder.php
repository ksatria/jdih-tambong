<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipe_dokumen')->insert([
            ["id" => 1, "nama_tipe" => "Peraturan Desa", "singkatan_tipe" => "Perdes"],
            ["id" => 2, "nama_tipe" => "Peraturan Kepala Desa", "singkatan_tipe" => "Perkades"],
            ["id" => 3, "nama_tipe" => "Peraturan Bersama Kepala Desa", "singkatan_tipe" => "Permakades"],
            ["id" => 4, "nama_tipe" => "Keputusan Kepala Desa", "singkatan_tipe" => "SK Kades"],
            ["id" => 5, "nama_tipe" => "Lain-lain", "singkatan_tipe" => "Lain"],
        ]);
    }
}
