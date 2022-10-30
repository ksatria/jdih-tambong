<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PengelolaSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengelola')->insert([
            'username' => 'fulan',
            'password' => Hash::make('fulan123'),
            'nama' => 'Fulan bin Fulanoh',
            'kode_level' => 'A'
        ]);
    }
}
