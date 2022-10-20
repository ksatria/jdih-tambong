@extends('layouts.utama')

@section('meta.deskripsi', $deskripsiHalaman)
@section('judul', $judulHalaman)

@section('konten-utama')
    <h1 class="border-bottom my-5 pb-3">
        <div id="identitas-dokumen" class="fs-6 fw-normal">{{ $identitas }}</div>
        <div id="judul-dokumen" class="fs-4 fw-bold">{{ $judul }}</div>
    </h1>

    <x-dokumen.detail :dokumen="$dokumen" />
@endsection
