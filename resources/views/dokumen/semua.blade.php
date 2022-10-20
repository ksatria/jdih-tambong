@extends('layouts.utama')

@section('meta.deskripsi', $deskripsiHalaman)
@section('judul', $judulHalaman)

@section('konten-utama')
    <h1 class="display-6 fw-semibold my-5">{{ $judulHalaman }}</h1>

    <x-form-pencarian />

    @if (count($kumpulanDokumen) === 0)
        <p><em>Tidak ditemukan dokumen terkait</em></p>
    @else
        @foreach ($kumpulanDokumen as $dokumen)
            <x-dokumen.card :dokumen="$dokumen" />
        @endforeach
    @endif
@endsection
