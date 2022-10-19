<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;

class DokumenController extends Controller
{
    function index()
    {
        $dokumenTerbaru = Dokumen::orderBy('tanggal_pengesahan', 'desc')->limit(10)->get();
        // return $dokumenTerbaru;
        return view('beranda', ["kumpulanDokumen" => $dokumenTerbaru]);
    }

    function semuaDokumen()
    {
    }

    function perdes($id = null, $title = null)
    {
    }

    function perkades($id = null, $title = null)
    {
    }

    function permakades($id = null, $title = null)
    {
    }

    function keputusan($id = null, $title = null)
    {
    }

    function dokumenLain($id = null, $title = null)
    {
    }

    function cariDokumen(Request $request)
    {
        $keyword = $request->input('q');

        return view('pencarian', ["keyword" => $keyword]);
    }
}
