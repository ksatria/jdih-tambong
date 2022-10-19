@extends('layouts.utama')

@section('judul', 'Beranda')

@section('konten-utama')
    <h1 class="display-1 mt-5" id="app-name">JDIH Desa Tambong</h1>
    <p class="lead" id="app-full-name">Jaringan Dokumen dan Informasi Hukum di Wilayah Desa Tambong, Kecamatan Kabat,
        Kabupaten Banyuwangi,
        Provinsi Jawa Timur</p>

    <div id="form-pencarian">
        <x-form-pencarian />
    </div>

    <section id="dokumen-terbaru">
        <h1 class="section-title fs-4">Dokumen Terbaru</h1>

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
    </section>
@endsection
