@extends('layouts.admin')

@section('judul', 'Produk Hukum Terkait')

@section('tombol-aksi')
    <a class="btn btn-sm btn-warning" href="{{ url()->previous() }}">
        <i class="bi-arrow-left-short"></i> Kembali
    </a>
@endsection

@section('konten-utama')
    <div class="mb-3">
        Cari produk hukum yang berkaitan dengan <strong>{{ $identitasDokumenUtama }}</strong>

        <div class="card mt-3">
            <div class="card-body">
                @error('dokumen-terkait.tambah')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <form action="{{ route('admin.dokumen.terkait.tambah', ['id' => $idDokumen]) }}" method="get">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control"
                            placeholder="Masukkan kata kunci judul dokumen terkait" value="{{ $kataKunci ?? '' }}">
                        <button type="submit" class="btn btn-primary"><i class="bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (isset($pilihanDokumen))
        <div class="mb-3">
            <p>Pilih produk hukum yang berkaitan dengan <strong>{{ $identitasDokumenUtama }}</strong></p>

            <form action="{{ route('admin.dokumen.terkait.tambah.proses', ['id' => $idDokumen]) }}" method="post">

                @csrf

                @foreach ($pilihanDokumen as $dokumen)
                    <div class="form-check">
                        <input type="checkbox" name="dokumen_terkait[]" id="pilihan-{{ $dokumen->id }}"
                            class="form-check-input" value="{{ $dokumen->id }}">
                        <label for="pilihan-{{ $dokumen->id }}" class="form-check-label">
                            {{ $dokumen->tipeDokumen->singkatan_tipe }}
                            No. {{ $dokumen->nomor }}
                            Tahun {{ date('Y', strtotime($dokumen->tanggal_pengesahan)) }}
                            Tentang {{ $dokumen->judul }}
                        </label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            </form>
        </div>
    @endif
@endsection
