@extends('layouts.utama')

@section('judul', 'Beranda')

@section('konten-utama')
    <h1>JDIH Desa Tambong</h1>
    <p class="headline">Jaringan Dokumen dan Informasi Hukum di Wilayah Desa Tambong, Kecamatan Kabat, Kabupaten Banyuwangi,
        Provinsi Jawa Timur</p>

    <div id="form-pencarian">
        <h2>Form Pencarian</h2>
        <x-form-pencarian />
    </div>

    <div id="dokumen-terbaru">
        <h2>Dokumen Terbaru</h2>

        @if (count($kumpulanDokumen) === 0)
            <p><em>Belum ada dokumen yang dipublikasi</em></p>
        @else
            @foreach ($kumpulanDokumen as $dokumen)
                {{-- {{ $dokumen }}
                <br />
                {{ $dokumen->tipeDokumen->nama_tipe }}
                <br /> --}}
                <x-dokumen.card :dokumen="$dokumen" />
            @endforeach
        @endif
    </div>
@endsection
