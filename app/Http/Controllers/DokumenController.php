<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;

class DokumenController extends Controller
{
    private $JUMLAH_DOKUMEN_PER_HALAMAN = 10;

    function index()
    {
        $dokumenTerbaru = Dokumen::orderBy('tanggal_pengesahan', 'desc')
            ->limit(5)
            ->get();

        return view('beranda', ["kumpulanDokumen" => $dokumenTerbaru]);
    }

    function semuaDokumen()
    {
        $dokumen = Dokumen::orderBy('tanggal_pengesahan', 'desc')
            ->paginate($this->JUMLAH_DOKUMEN_PER_HALAMAN);

        $data = [
            "deskripsiHalaman" => "Kumpulan semua dokumen hukum di lingkungan Desa Tambong, Kabat, Banyuwangi, Jawa Timur",
            "judulHalaman"     => "Dokumen Hukum",
            "kumpulanDokumen"  => $dokumen
        ];

        return view('dokumen.semua', $data);
    }

    function perdes($id = null, $title = null)
    {
        if ($id !== null) return $this->viewDetailDokumen('Perdes', $id);

        return $this->viewJenisDokumen('Perdes', 'Peraturan Desa');
    }

    function perkades($id = null, $title = null)
    {
        if ($id !== null) return $this->viewDetailDokumen('Perkades', $id);

        return $this->viewJenisDokumen('Perkades', 'Peraturan Kepala Desa');
    }

    function permakades($id = null, $title = null)
    {
        if ($id !== null) return $this->viewDetailDokumen('Permakades', $id);

        return $this->viewJenisDokumen('Permakades', 'Peraturan Bersama Kepala Desa');
    }

    function keputusan($id = null, $title = null)
    {
        if ($id !== null) return $this->viewDetailDokumen('SK Kades', $id);

        return $this->viewJenisDokumen('SK Kades', 'Surat Keputusan Kepala Desa');
    }

    function dokumenLain($id = null, $title = null)
    {
        if ($id !== null) return $this->viewDetailDokumen('Lain', $id);

        return $this->viewJenisDokumen('Lain', 'Dokumen Hukum Lainnya');
    }

    private function viewJenisDokumen($singkatan, $kepanjangan)
    {
        $dokumen = Dokumen::whereRelation('tipeDokumen', 'singkatan_tipe', $singkatan)
            ->orderBy('tanggal_pengesahan', 'desc')
            ->paginate($this->JUMLAH_DOKUMEN_PER_HALAMAN);

        $data = [
            "deskripsiHalaman" => "Kumpulan {$kepanjangan} yang diterbitkan di lingkungan Desa Tambong, Kabat, Banyuwangi, Jawa Timur",
            "judulHalaman"     => $kepanjangan,
            "kumpulanDokumen"  => $dokumen
        ];

        return view('dokumen.semua', $data);
    }

    private function viewDetailDokumen($jenis, $id)
    {
        $dokumen = Dokumen::whereRelation('tipeDokumen', 'singkatan_tipe', $jenis)
            ->find($id);

        if ($dokumen === null) return view('page-not-found');

        $tipe      = $dokumen->tipeDokumen->nama_tipe;
        $nomor     = $dokumen->nomor;
        $tahun     = date('Y', strtotime($dokumen->tanggal_pengesahan));

        $identitas = "{$tipe} Nomor {$nomor} Tahun {$tahun}";
        $judul     = $dokumen->judul;
        $deskripsi = "{$identitas} Tentang {$judul}";

        $data = [
            "deskripsiHalaman" => $deskripsi,
            "judulHalaman"     => $identitas,
            "identitas"        => $identitas,
            "judul"            => $judul,
            "dokumen"          => $dokumen
        ];

        return view('dokumen.detail', $data);
    }

    function cariDokumen(Request $request)
    {
        $keyword = $request->input('q');

        $hasilPencarian = Dokumen::where('judul', 'like', "%{$keyword}%")
            ->orderBy('tanggal_pengesahan', 'desc')
            ->paginate($this->JUMLAH_DOKUMEN_PER_HALAMAN);

        $data = [
            "keyword" => $keyword,
            "hasil"   => $hasilPencarian
        ];

        return view('pencarian', $data);
    }
}
