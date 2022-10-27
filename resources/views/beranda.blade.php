@extends('layouts.utama')

@section('judul', 'Beranda')

@section('konten-utama')
    <h1 class="display-1 mt-5" id="app-name">JDIH Desa Tambong</h1>
    <p class="lead" id="app-full-name">Jaringan Dokumen dan Informasi Hukum di Wilayah Desa Tambong, Kecamatan Kabat,
        Kabupaten Banyuwangi,
        Provinsi Jawa Timur</p>

    <x-form-pencarian />

    <section id="dokumen-terbaru">
        <h1 class="section-title fs-4">Dokumen Terbaru</h1>

        @if (count($kumpulanDokumen) === 0)
            <p><em>Belum ada dokumen yang dipublikasi</em></p>
        @else
            @foreach ($kumpulanDokumen as $dokumen)
                <x-dokumen.card :dokumen="$dokumen" />
            @endforeach

            <p class="text-center">
                <a href={{ route('dokumen') }} class="text-decoration-none">Lihat dokumen lainnya >>></a>
            </p>
        @endif
    </section>
@endsection
