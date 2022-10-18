<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelPengelolaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level_pengelola')->insert([
            ['kode_level' => 'S', 'level' => 'Super admin'],
            ['kode_level' => 'A', 'level' => 'Admin']
        ]);
    }
}
