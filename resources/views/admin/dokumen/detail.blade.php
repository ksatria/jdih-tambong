@extends('layouts.admin')

@section('judul', 'Detail Dokumen')

@section('tombol-aksi')
    <a class="btn btn-sm btn-warning" href="{{ url()->previous() }}">
        <i class="bi-arrow-left-short"></i> Kembali
    </a>
@endsection

@section('konten-utama')
    <x-dokumen.detail :dokumen="$dokumen" :halamanAdmin=true />
@endsection
