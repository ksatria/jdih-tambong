<?php

namespace App\View\Components\dokumen;

use Illuminate\View\Component;
use App\Models\Dokumen;

class Detail extends Component
{
    public $halamanAdmin;

    public $id;
    public $judul;
    public $tipe;
    public $nomor;
    public $tahun;
    public $tanggal;
    public $status;
    public $berkasTerkait;
    public $dokumenTerkait;
    public $dikaitkanDengan;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Dokumen $dokumen, $halamanAdmin = false)
    {
        $this->halamanAdmin    = $halamanAdmin;

        $this->id              = $dokumen->id;
        $this->judul           = $dokumen->judul;
        $this->tipe            = $dokumen->tipeDokumen->nama_tipe;
        $this->nomor           = $dokumen->nomor;
        $this->tahun           = date('Y', strtotime($dokumen->tanggal_pengesahan));
        $this->tanggal         = formatTanggal($dokumen->tanggal_pengesahan, includeHari: false);
        $this->status          = $dokumen->statusDokumen->status;
        $this->berkasTerkait   = $dokumen->berkas;
        $this->dokumenTerkait  = $dokumen->dokumenTerkait;
        $this->dikaitkanDengan = $dokumen->dikaitkanDengan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dokumen.detail');
    }
}
