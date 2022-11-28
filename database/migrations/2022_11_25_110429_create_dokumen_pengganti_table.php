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
        Schema::create('dokumen_pengganti', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_dokumen_pengganti');
            $table->bigInteger('id_dokumen_diganti');
            $table->char('kode_pergantian', 1);
            $table->unique(['id_dokumen_pengganti', 'id_dokumen_diganti']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_pengganti');
    }
};
