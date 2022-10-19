<?php

namespace App\View\Components\dokumen;

use Illuminate\View\Component;
use App\Models\Dokumen;

class Card extends Component
{
    /**
     * Daftar variabel pada komponen
     */
    public $link;
    public $judul;
    public $nomor;
    public $tanggal;
    public $tahun;
    public $jenis;

    private $bulan = [
        "Januari", "Februari", "Maret",
        "April", "Mei", "Juni",
        "Juli", "Agustus", "September",
        "Oktober", "November", "Desember"
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Dokumen $dokumen)
    {
        $this->link = $this->generateLink($dokumen->id, $dokumen->judul, $dokumen->tipeDokumen->singkatan_tipe);
        $this->judul = $dokumen->judul;
        $this->nomor = $dokumen->nomor;
        $this->tanggal = $this->formatTanggal($dokumen->tanggal_pengesahan);
        $this->tahun = date('Y', strtotime($dokumen->tanggal_pengesahan));
        $this->jenis = $dokumen->tipeDokumen->nama_tipe;
    }

    /**
     * Buat link ke halaman detail dokumen
     */
    private function generateLink($id, $judul, $tipe)
    {
        switch ($tipe) {
            case "Perdes":
                $link = route('perdes', ["id" => $id, "title" => $this->formatJudul($judul)]);
                break;
            case "Perkades":
                $link = route('perkades', ["id" => $id, "title" => $this->formatJudul($judul)]);
                break;
            case "Permakades":
                $link = route('permakades', ["id" => $id, "title" => $this->formatJudul($judul)]);
                break;
            case "SK Kades":
                $link = route('keputusan', ["id" => $id, "title" => $this->formatJudul($judul)]);
                break;
            case "Lain":
                $link = route('lain-lain', ["id" => $id, "title" => $this->formatJudul($judul)]);
                break;
        }

        return $link;
    }

    /**
     * Konversi judul dalam format URL SEO friendly
     */
    private function formatJudul($judul)
    {
        // Bersihkan white-space di depan dan belakang
        $judul = trim($judul);

        // Kecilkan semua huruf
        $judul = strtolower($judul);

        // Hilangkan semua karakter simbol
        $judul = preg_replace('/[^\p{L}\p{N}\s]/u', '', $judul);

        // Ganti double-white-space atau lebih menjadi notasi strip
        $judul = preg_replace('(\s+)', '-', $judul);

        return $judul;
    }

    /**
     * Format tanggal
     */
    private function formatTanggal($tgl)
    {
        $tgl = strtotime($tgl);
        return date('d', $tgl) . " " . $this->bulan[date('n', $tgl) - 1] . " " . date('Y', $tgl);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dokumen.card');
    }
}
