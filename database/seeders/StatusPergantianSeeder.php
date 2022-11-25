<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPergantianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_pergantian')->insert([
            ['kode_pergantian' => 'U', 'nama_pergantian' => 'Mengubah'],
            ['kode_pergantian' => 'G', 'nama_pergantian' => 'Mengganti'],
            ['kode_pergantian' => 'B', 'nama_pergantian' => 'Membatalkan']
        ]);
    }
}
