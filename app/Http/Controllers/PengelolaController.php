<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Dokumen;
use App\Models\TipeDokumen;
use App\Models\StatusDokumen;
use App\Models\Berkas;
use App\Models\DokumenTerkait;
use App\Models\StatusPergantian;
use App\Models\DokumenPengganti;

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

    function detailDokumen($id)
    {
        $dokumen = Dokumen::find($id);

        if ($dokumen === null) return view('page-not-found');

        $data = [
            "dokumen"       => $dokumen,
            "namaPenyimpan" => $dokumen->pengelolaPenyimpan->nama,
            "waktuSimpan"   => formatTanggal($dokumen->waktu_simpan, includeWaktu: true),
            "namaPengubah"  => $dokumen->username_pengubah ? $dokumen->pengelolaPengubah->nama : null,
            "waktuUbah"     => formatTanggal($dokumen->waktu_ubah_terakhir, includeWaktu: true)
        ];

        return view('admin.dokumen.detail', $data);
    }

    function tambahDokumen()
    {
        $data = [
            "judulHalaman" => "Tambah Produk Hukum",
            "actionURL"    => route('admin.dokumen.tambah.proses'),
            "tipeDokumen"  => TipeDokumen::all()
        ];

        return view('admin.dokumen.kelola', $data);
    }

    function ubahDokumen($id)
    {
        $dokumen = Dokumen::find($id);

        $data = [
            "judulHalaman" => "Kelola Produk Hukum",
            "isFormUpdate" => true,
            "actionURL"    => route('admin.dokumen.ubah.proses', ["id" => $id]),
            "tipeDokumen"  => TipeDokumen::all(),
            "idDokumen"    => $id,
            "judul"        => $dokumen->judul,
            "nomor"        => $dokumen->nomor,
            "jenis"        => $dokumen->id_tipe_dokumen,
            "tanggal"      => $dokumen->tanggal_pengesahan,
            "status"       => $dokumen->statusDokumen->status == 'Berlaku',
            "berkasTerkait" => $dokumen->berkas
        ];

        return view('admin.dokumen.kelola', $data);
    }

    function prosesKelolaDokumen(Request $request, $id = null)
    {
        $validation = $request->validate([
            'judul'   => ['required', 'string'],
            'nomor'   => ['required'],
            'jenis'   => ['required'],
            'tanggal' => ['required', 'date'],
        ]);

        $dokumen = $id ? Dokumen::find($id) : new Dokumen;

        $dokumen->judul              = $request->input('judul');
        $dokumen->nomor              = $request->input('nomor');
        $dokumen->id_tipe_dokumen    = $request->input('jenis');
        $dokumen->tanggal_pengesahan = $request->input('tanggal');

        if (!$id) $dokumen->username_penyimpan = Auth::user()->username;
        else      $dokumen->username_pengubah  = Auth::user()->username;

        if ($request->input('status') == null)
            $dokumen->kode_status = StatusDokumen::firstWhere('status', 'Tidak berlaku')->kode_status;
        else
            $dokumen->kode_status = StatusDokumen::firstWhere('status', 'Berlaku')->kode_status;

        if ($dokumen->save()) {
            return redirect()->route('admin.dokumen.detail', ["id" => $dokumen->id]);
        } else {
            $aktivitas = $id ? "mengubah" : "menambahkan";

            return back()
                ->withErrors(['dokumen.kelola' => "Ada masalah saat {$aktivitas} data dokumen. Silakan coba kembali."])
                ->withInput();
        }
    }

    function unggahBerkas($idDokumen)
    {
        $dokumen = Dokumen::find($idDokumen);

        $data = [
            "idDokumen"        => $idDokumen,
            "identitasDokumen" => identitasDokumen($dokumen),
            "berkasTerkait"    => $dokumen->berkas
        ];

        return view('admin.berkas.unggah', $data);
    }

    function prosesUnggahBerkas(Request $request, $idDokumen)
    {
        $validation = $request->validate([
            'namaberkas' => ['required'],
            'berkas'     => ['required', 'file', 'mimes:pdf'],
        ]);

        $berkas = new Berkas;

        $berkas->nama                = $request->input('namaberkas');
        $berkas->lokasi              = $request->file('berkas')->store('berkas');
        $berkas->id_dokumen          = $idDokumen;
        $berkas->username_pengunggah = Auth::user()->username;

        if ($berkas->save()) {
            return redirect()->route('admin.berkas.unggah', ["idDokumen" => $idDokumen]);
        } else {
            return back()
                ->withErrors(['berkas.unggah' => 'Ada masalah saat mengunggah berkas. Silakan coba kembali.'])
                ->withInput();
        }
    }

    function tambahDokumenTerkait(Request $request, $idDokumen)
    {
        $dokumenUtama = Dokumen::find($idDokumen);

        if ($dokumenUtama == null) return view('page-not-found');

        $data = [
            "idDokumen"             => $idDokumen,
            "identitasDokumenUtama" => identitasDokumen($dokumenUtama)
        ];

        $keyword   = $request->input('q');

        if (!empty($keyword)) {
            // TODO: Dokumen yang sudah diatur sebagai dokumen terkait dengan dokumen utama harus di-exclude-kan juga dari hasil pencarian
            $pilihanDokumenTerkait = Dokumen::where('judul', 'like', "%{$keyword}%")
                ->where('id', '!=', $idDokumen)
                ->orderBy('tanggal_pengesahan', 'desc')
                ->get();

            $data["kataKunci"]      = $keyword;
            $data["pilihanDokumen"] = $pilihanDokumenTerkait;
        }

        return view('admin.dokumen.terkait.tambah', $data);
    }

    function prosesTambahDokumenTerkait(Request $request, $idDokumen)
    {
        $data = [];

        foreach ($request->input('dokumen_terkait') as $idDokumenTerkait) {
            $data[] = ['id_dokumen_utama' => $idDokumen, 'id_dokumen_terkait' => $idDokumenTerkait];
        }

        DokumenTerkait::upsert($data, ['id_dokumen_utama', 'id_dokumen_terkait']);

        return redirect()->route('admin.dokumen.detail', ['id' => $idDokumen]);
    }

    function aturPergantianDokumen(Request $request, $idDokumenPengganti)
    {
        $dokumenPengganti = Dokumen::find($idDokumenPengganti);

        if ($dokumenPengganti == null) return view('page-not-found');

        $data = [
            "idDokumenPengganti" => $idDokumenPengganti,
            "identitasDokumenPengganti" => identitasDokumen($dokumenPengganti),
            "pilihanStatus" => StatusPergantian::all(),
        ];

        $keyword   = $request->input('q');

        if (!empty($keyword)) {
            $pilihanDokumenYangDiganti = Dokumen::where('judul', 'like', "%{$keyword}%")
                ->where('id', '!=', $idDokumenPengganti)
                ->orderBy('tanggal_pengesahan', 'desc')
                ->get();

            $data["kataKunci"]      = $keyword;
            $data["pilihanDokumen"] = $pilihanDokumenYangDiganti;
        }

        return view('admin.dokumen.pengganti.tambah', $data);
    }

    function prosesPergantianDokumen(Request $request, $idDokumenPengganti)
    {
        $kodePergantian = $request->input('status');
        $dokumenDiganti = $request->input('dokumen_diganti');
        $data           = [];

        foreach ($dokumenDiganti as $idDokumenDiganti) {
            $data[] = [
                'id_dokumen_pengganti' => $idDokumenPengganti,
                'id_dokumen_diganti'   => $idDokumenDiganti,
                'kode_pergantian'      => $kodePergantian
            ];
        }

        DokumenPengganti::upsert($data, ['id_dokumen_pengganti', 'id_dokumen_diganti'], ['kode_pergantian']);

        if ($kodePergantian != StatusPergantian::where('nama_pergantian', 'Mengubah')->first()->kode_pergantian) {
            foreach ($dokumenDiganti as $idDokumenDiganti) {
                $dok = Dokumen::find($idDokumenDiganti);
                $dok->kode_status = StatusDokumen::where('status', 'Tidak berlaku')->first()->kode_status;
                $dok->save();
            }
        }

        return redirect()->route('admin.dokumen.detail', ['id' => $idDokumenPengganti]);
    }
}
