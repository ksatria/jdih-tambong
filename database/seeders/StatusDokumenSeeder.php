<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_dokumen')->insert([
            ['kode_status' => 'B', 'status' => 'Berlaku'],
            ['kode_status' => 'T', 'status' => 'Tidak berlaku']
        ]);
    }
}
