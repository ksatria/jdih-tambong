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
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nomor')->unique('nomor_dokumen');
            $table->integer('id_tipe_dokumen', unsigned: true);
            $table->date('tanggal_pengesahan');
            $table->char('kode_status', 1)->default('B');
            $table->string('lokasi_file')->nullable();
            $table->string('username_penyimpan', 50);
            $table->timestamp('waktu_simpan')->useCurrent();
            $table->string('username_pengubah', 50);
            $table->timestamp('waktu_ubah_terakhir')->nullable()->useCurrentOnUpdate();
            $table->integer('jumlah_lihat', unsigned: true)->default(0);
            $table->integer('jumlah_download', unsigned: true)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
};
