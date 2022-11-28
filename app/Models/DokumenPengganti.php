<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DokumenPengganti extends Pivot
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dokumen_pengganti';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_dokumen_pengganti',
        'id_dokumen_diganti',
        'kode_pergantian'
    ];

    /**
     * Setiap pergantian dokumen memiliki satu status pergantian
     */
    public function statusPergantian()
    {
        return $this->belongsTo(StatusPergantian::class, 'kode_pergantian', 'kode_pergantian');
    }
}
