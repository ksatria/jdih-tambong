@extends('layouts.utama')

@section('meta.deskripsi', $deskripsiHalaman)
@section('judul', $judulHalaman)

@section('konten-utama')
    <h1 class="display-6 fw-semibold my-5">{{ $judulHalaman }}</h1>

    <x-FormPencarian :action="route('cari')" />

    @if (count($kumpulanDokumen) === 0)
        <p><em>Tidak ditemukan dokumen terkait</em></p>
    @else
        @foreach ($kumpulanDokumen as $dokumen)
            <x-Dokumen.Card :dokumen="$dokumen" />
        @endforeach

        {{ $kumpulanDokumen->links() }}

        {{-- Kalau mau pakai desain milik sendiri --}}
        {{-- {{ $kumpulanDokumen->links('tes-pagination') }} --}}
    @endif
@endsection
