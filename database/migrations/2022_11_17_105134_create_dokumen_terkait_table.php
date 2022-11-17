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
        Schema::create('dokumen_terkait', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_dokumen_utama');
            $table->bigInteger('id_dokumen_terkait');
            $table->unique(['id_dokumen_utama', 'id_dokumen_terkait']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_terkait');
    }
};
