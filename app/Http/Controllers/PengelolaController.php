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
            "actionURL" => route('admin.dokumen.tambah.proses'),
            "tipeDokumen" => TipeDokumen::all()
        ];

        return view('admin.dokumen.kelola', $data);
    }

    function ubahDokumen($id)
    {
        $dokumen = Dokumen::find($id);

        $data = [
            "judulHalaman" => "Ubah Dokumen",
            "isFormUpdate" => true,
            "actionURL" => route('admin.dokumen.ubah.proses', ["id" => $id]),
            "tipeDokumen" => TipeDokumen::all(),
            "judul" => $dokumen->judul,
            "nomor" => $dokumen->nomor,
            "jenis" => $dokumen->id_tipe_dokumen,
            "tanggal" => $dokumen->tanggal_pengesahan,
            "status" => $dokumen->kode_status == StatusDokumen::firstWhere('status', 'Berlaku')->kode_status
        ];

        return view('admin.dokumen.kelola', $data);
    }

    function prosesKelolaDokumen(Request $request, $id = null)
    {
        $validation = $request->validate([
            'judul' => ['required', 'string'],
            'nomor' => ['required'],
            'jenis' => ['required'],
            'tanggal' => ['required', 'date'],
            'berkas' => ['nullable', 'file']
        ]);

        $dokumen = $id ? Dokumen::find($id) : new Dokumen;

        $dokumen->judul = $request->input('judul');
        $dokumen->nomor = $request->input('nomor');
        $dokumen->id_tipe_dokumen = $request->input('jenis');
        $dokumen->tanggal_pengesahan = $request->input('tanggal');

        if (!$id) $dokumen->username_penyimpan = Auth::user()->username;
        else $dokumen->username_pengubah = Auth::user()->username;

        if ($request->input('status') == null)
            $dokumen->kode_status = StatusDokumen::firstWhere('status', 'Tidak berlaku')->kode_status;
        else
            $dokumen->kode_status = StatusDokumen::firstWhere('status', 'Berlaku')->kode_status;

        if ($dokumen->save()) {
            return redirect()->route('admin.dokumen');
        } else {
            $aktivitas = $id ? "mengubah" : "menambahkan";

            return back()
                ->withErrors(['dokumen.kelola' => "Ada masalah saat {$aktivitas} data dokumen. Silakan coba kembali."])
                ->withInput();
        }
    }
}
