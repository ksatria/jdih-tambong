<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengelola extends Authenticatable
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengelola';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'username';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'kode_level' => 'A'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['kode_level'];

    /**
     * Remember token field
     */
    protected $rememberTokenName = 'token_tersimpan';

    /**
     * Setiap pengelola mempunyai satu level pengelola
     */
    public function levelPengelola()
    {
        return $this->belongsTo(LevelPengelola::class, 'kode_level', 'kode_level');
    }

    /**
     * Setiap pengelola bisa menyimpan banyak dokumen
     */
    public function penyimpanDokumen()
    {
        return $this->hasMany(Dokumen::class, 'username_penyimpan', 'username');
    }

    /**
     * Setiap pengelola juga bisa mengubah banyak dokumen
     */
    public function pengubahDokumen()
    {
        return $this->hasMany(Dokumen::class, 'username_pengubah', 'username');
    }
}
