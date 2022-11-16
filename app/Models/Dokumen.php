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
        'kode_status'     => 'B',
        'jumlah_lihat'    => 0,
        'jumlah_download' => 0
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'tanggal_pengesahan' => 'date'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul',
        'nomor',
        'id_tipe_dokumen',
        'tanggal_pengesahan',
        'kode_status'
    ];

    /**
     * Setiap dokumen merupakan bagian dari suatu tipe dokumen
     */
    public function tipeDokumen()
    {
        return $this->belongsTo(TipeDokumen::class, 'id_tipe_dokumen');
    }

    /**
     * Setiap dokumen mempunyai status keberlakuan
     */
    public function statusDokumen()
    {
        return $this->belongsTo(StatusDokumen::class, 'kode_status', 'kode_status');
    }

    /**
     * Setiap dokumen disimpan oleh seorang pengelola
     */
    public function pengelolaPenyimpan()
    {
        return $this->belongsTo(Pengelola::class, 'username_penyimpan', 'username');
    }

    /**
     * Setiap dokumen terakhir diubah oleh seorang pengelola
     */
    public function pengelolaPengubah()
    {
        return $this->belongsTo(Pengelola::class, 'username_pengubah', 'username');
    }

    /**
     * Setiap dokumen mungkin memiliki banyak berkas
     */
    public function berkas()
    {
        return $this->hasMany(Berkas::class, 'id_dokumen', 'id');
    }
}
