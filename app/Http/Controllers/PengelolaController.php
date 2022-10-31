<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Dokumen;
use App\Models\TipeDokumen;
use App\Models\StatusDokumen;

class PengelolaController extends Controller
{
    function prosesLogin(Request $request)
    {
        $credentials = $request->validate([
            'usernamejdih' => ['required'],
            'passwordjdih' => ['required'],
            'rememberjdih' => ['nullable']
        ]);

        $username = $credentials['usernamejdih'];
        $password = $credentials['passwordjdih'];
        $remember = isset($credentials['rememberjdih']);

        if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
            $request->session()->regenerate();

            return redirect('dashboard');
        }

        return back()
            ->withErrors(['login' => 'Username atau password salah. Silakan coba lagi.'])
            ->withInput();
    }

    function login()
    {
        if (Auth::viaRemember())
            return redirect('dashboard');
        else
            return view('admin.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    function dashboard()
    {
        return view('admin.dashboard');
    }

    function dokumen()
    {
        $dokumen = Dokumen::orderBy('tanggal_pengesahan', 'desc')->paginate(5);

        $data = [
            "kumpulanDokumen" => $dokumen
        ];

        return view('admin.dokumen.semua', $data);
    }

    function tambahDokumen()
    {
        $data = [
            "judulHalaman" => "Tambah Dokumen",
            "tipeDokumen" => TipeDokumen::all()
        ];

        return view('admin.dokumen.kelola', $data);
    }

    function prosesTambahDokumen(Request $request)
    {
        $validation = $request->validate([
            'judul' => ['required', 'string'],
            'nomor' => ['required'],
            'jenis' => ['required'],
            'tanggal' => ['required', 'date'],
            'berkas' => ['nullable', 'file']
        ]);

        $dokumen = new Dokumen;

        $dokumen->judul = $request->input('judul');
        $dokumen->nomor = $request->input('nomor');
        $dokumen->id_tipe_dokumen = $request->input('jenis');
        $dokumen->tanggal_pengesahan = $request->input('tanggal');
        $dokumen->username_penyimpan = Auth::user()->username;

        if ($request->input('status') == null)
            $dokumen->kode_status = StatusDokumen::firstWhere('status', 'Tidak berlaku')->kode_status;

        if ($dokumen->save()) {
            return redirect()->route('admin.dokumen');
        } else {
            return back()
                ->withErrors(['dokumen.kelola' => 'Ada masalah saat menambahkan data dokumen baru. Silakan coba kembali.'])
                ->withInput();
        }
    }
}
