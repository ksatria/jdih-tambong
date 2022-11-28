<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPergantianSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_pergantian')->upsert(
            [
                ['kode_pergantian' => 'U', 'nama_pergantian' => 'Mengubah', 'nama_pergantian_pasif' => 'Diubah oleh'],
                ['kode_pergantian' => 'G', 'nama_pergantian' => 'Mengganti', 'nama_pergantian_pasif' => 'Digantikan oleh'],
                ['kode_pergantian' => 'B', 'nama_pergantian' => 'Membatalkan', 'nama_pergantian_pasif' => 'Dibatalkan oleh']
            ],
            ['kode_pergantian'],
            ['nama_pergantian', 'nama_pergantian_pasif']
        );
    }
}
