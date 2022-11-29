<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use App\Models\Dokumen;

class DokumenCard extends Component
{
    /**
     * Daftar variabel pada komponen
     */
    public $link;
    public $linkDetail;
    public $linkUbah;
    public $judul;
    public $nomor;
    public $tanggal;
    public $tahun;
    public $jenis;
    public $jumlahDilihat;
    public $jumlahDidownload;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Dokumen $dokumen)
    {
        $this->link             = linkPublikDokumen($dokumen->id, $dokumen->judul, $dokumen->tipeDokumen->singkatan_tipe);
        $this->linkDetail       = route('admin.dokumen.detail', ["id" => $dokumen->id]);
        $this->linkUbah         = route('admin.dokumen.ubah', ["id" => $dokumen->id]);
        $this->judul            = $dokumen->judul;
        $this->nomor            = $dokumen->nomor;
        $this->tanggal          = formatTanggal($dokumen->tanggal_pengesahan, includeHari: false);
        $this->tahun            = date('Y', strtotime($dokumen->tanggal_pengesahan));
        $this->jenis            = $dokumen->tipeDokumen->nama_tipe;
        $this->jumlahDilihat    = $dokumen->jumlah_lihat;
        $this->jumlahDidownload = $dokumen->jumlah_download;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.Admin.DokumenCard');
    }
}
