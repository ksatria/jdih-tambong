@extends('layouts.admin')

@section('judul', 'Pergantian Produk Hukum')

@section('tombol-aksi')
    <a class="btn btn-sm btn-warning" href="{{ url()->previous() }}">
        <i class="bi-arrow-left-short"></i> Kembali
    </a>
@endsection

@section('konten-utama')
    <div class="mb-3">
        Cari produk hukum yang digantikan oleh <strong>{{ $identitasDokumenPengganti }}</strong>

        <div class="card mt-3">
            <div class="card-body">
                @error('dokumen-terkait.tambah')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <form action="{{ route('admin.dokumen.pengganti.tambah', ['id' => $idDokumenPengganti]) }}" method="get">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control"
                            placeholder="Masukkan kata kunci judul dokumen yang digantikan" value="{{ $kataKunci ?? '' }}">
                        <button type="submit" class="btn btn-primary"><i class="bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (isset($pilihanDokumen))
        <div class="mb-3">
            <form action="{{ route('admin.dokumen.pengganti.tambah.proses', ['id' => $idDokumenPengganti]) }}"
                method="post">

                @csrf

                <p>Pilih produk hukum yang akan digantikan oleh <strong>{{ $identitasDokumenPengganti }}</strong></p>

                @foreach ($pilihanDokumen as $dokumen)
                    <div class="form-check">
                        <input type="checkbox" name="dokumen_diganti[]" id="pilihan-{{ $dokumen->id }}"
                            class="form-check-input" value="{{ $dokumen->id }}">
                        <label for="pilihan-{{ $dokumen->id }}" class="form-check-label">
                            {{ identitasDokumen($dokumen) }}
                        </label>
                    </div>
                @endforeach

                <p>Jenis pergantian untuk produk hukum tersebut:</p>

                @foreach ($pilihanStatus as $status)
                    <div class="form-check">
                        <input type="radio" name="status" id="status-{{ $status->kode_pergantian }}"
                            class="form-check-input" value="{{ $status->kode_pergantian }}">
                        <label for="status-{{ $status->kode_pergantian }}"
                            class="form-check-label">{{ $status->nama_pergantian }}</label>
                    </div>
                @endforeach

                <p class='small'>
                    Keterangan:<br />
                    Untuk jenis pergantian "Membatalkan" dan "Mengganti" akan secara otomatis membuat status
                    produk hukum
                    yang digantikan menjadi tidak berlaku
                </p>

                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            </form>
        </div>
    @endif
@endsection
