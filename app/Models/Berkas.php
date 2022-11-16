<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'berkas';

    /**
     * Pengaturan nama kolom standar created_at
     */
    const CREATED_AT = 'waktu_unggah';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Setiap berkas hanya dimiliki oleh satu dokumen
     */
    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'id_dokumen', 'id');
    }

    /**
     * Setiap berkas diunggah oleh seorang pengelola
     */
    public function pengelola()
    {
        return $this->belongsTo(Pengelola::class, 'username_pengunggah', 'username');
    }
}
