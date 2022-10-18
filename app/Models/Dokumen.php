<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dokumen';

    /**
     * Pengaturan nama kolom standar created_at & updated_at
     */
    const CREATED_AT = 'waktu_simpan';
    const UPDATED_AT = 'waktu_ubah_terakhir';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'kode_status' => 'B',
        'jumlah_lihat' => 0,
        'jumlah_download' => 0
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['judul', 'nomor', 'id_tipe_dokumen', 'tanggal_pengesahan', 'kode_status', 'lokasi_file'];
}
