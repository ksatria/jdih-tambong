<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_dokumen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tipe', 100);
            $table->string('singkatan_tipe', 20)->unique('singkatan_tipe_dokumen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipe_dokumen');
    }
};
