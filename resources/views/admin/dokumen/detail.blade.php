@extends('layouts.admin')

@section('judul', 'Detail Produk Hukum')

@section('tombol-aksi')
    <a class="btn btn-sm btn-warning" href="{{ url()->previous() }}">
        <i class="bi-arrow-left-short"></i> Kembali
    </a>
@endsection

@section('konten-utama')
    <x-dokumen.detail :dokumen="$dokumen" :halamanAdmin=true />

    <div class="my-3 border-top" id="informasi-tambahan">
        <h2 class="h6">Informasi Tambahan</h2>
        <ul>
            <li class="small">Data produk hukum ini disimpan oleh <strong>{{ $namaPenyimpan }}</strong> pada
                <strong>{{ $waktuSimpan }}</strong>
            </li>

            @if ($namaPengubah !== null)
                <li class="small">Data produk hukum ini terakhir diubah oleh <strong>{{ $namaPengubah }}</strong> pada
                    <strong>{{ $waktuUbah }}</strong>
                </li>
            @endif
        </ul>
    </div>
@endsection
