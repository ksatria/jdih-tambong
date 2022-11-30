@extends('layouts.utama')

@section('judul', 'Beranda')

@section('konten-utama')
    <h1 class="display-1 mt-5" id="app-name">JDIH Desa Tambong</h1>
    <p class="lead" id="app-full-name">Jaringan Dokumen dan Informasi Hukum di Wilayah Desa Tambong, Kecamatan Kabat,
        Kabupaten Banyuwangi,
        Provinsi Jawa Timur</p>

    <x-FormPencarian :action="route('cari')" />

    <section id="dokumen-terbaru">
        <h1 class="section-title fs-4">Produk Hukum Terbaru</h1>

        @if (count($kumpulanDokumen) === 0)
            <p><em>Belum ada produk hukum yang dipublikasi</em></p>
        @else
            @foreach ($kumpulanDokumen as $dokumen)
                <x-Dokumen.Card :dokumen="$dokumen" />
            @endforeach

            <p class="text-center">
                <a href={{ route('dokumen') }} class="text-decoration-none">Lihat produk hukum lainnya >>></a>
            </p>
        @endif
    </section>
@endsection
