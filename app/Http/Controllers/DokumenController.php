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
        /* --- TO DO --- */
        // $pagination = Dokumen::orderBy('tanggal_pengesahan', 'desc')
        //     ->paginate($this->JUMLAH_DOKUMEN_PER_HALAMAN);

        $dokumen = Dokumen::orderBy('tanggal_pengesahan', 'desc')->get();

        $data = [
            "deskripsiHalaman" => "Kumpulan semua dokumen hukum di lingkungan Desa Tambong, Kabat, Banyuwangi, Jawa Timur",
            "judulHalaman" => "Dokumen Hukum",
            "kumpulanDokumen" => $dokumen
        ];

        return view('dokumen', $data);
    }

    function perdes($id = null, $title = null)
    {
        return $this->viewJenisDokumen('Perdes', 'Peraturan Desa');
    }

    function perkades($id = null, $title = null)
    {
        return $this->viewJenisDokumen('Perkades', 'Peraturan Kepala Desa');
    }

    function permakades($id = null, $title = null)
    {
        return $this->viewJenisDokumen('Permakades', 'Peraturan Bersama Kepala Desa');
    }

    function keputusan($id = null, $title = null)
    {
        return $this->viewJenisDokumen('SK Kades', 'Surat Keputusan Kepala Desa');
    }

    function dokumenLain($id = null, $title = null)
    {
        return $this->viewJenisDokumen('Lain', 'Dokumen Hukum Lainnya');
    }

    private function viewJenisDokumen($singkatan, $kepanjangan)
    {
        $dokumen = Dokumen::whereRelation('tipeDokumen', 'singkatan_tipe', $singkatan)
            ->orderBy('tanggal_pengesahan', 'desc')
            ->get();

        $data = [
            "deskripsiHalaman" => "Kumpulan {$kepanjangan} yang diterbitkan di lingkungan Desa Tambong, Kabat, Banyuwangi, Jawa Timur",
            "judulHalaman" => $kepanjangan,
            "kumpulanDokumen" => $dokumen
        ];

        return view('dokumen', $data);
    }

    function cariDokumen(Request $request)
    {
        $keyword = $request->input('q');

        return view('pencarian', ["keyword" => $keyword]);
    }
}
