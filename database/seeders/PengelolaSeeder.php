<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PengelolaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengelola')->insert([
            'username' => 'khoirulumam',
            'password' => Hash::make('admin123'),
            'nama' => 'Khoirul Umam, S.Pd., M.Kom.',
            'kode_level' => 'S'
        ]);
    }
}
