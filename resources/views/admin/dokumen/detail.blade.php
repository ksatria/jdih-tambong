@extends('layouts.admin')

@section('judul', 'Detail Dokumen')

@section('konten-utama')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Dokumen</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-warning" href="{{ url()->previous() }}">
                <i class="bi-arrow-left-short"></i> Kembali
            </a>
        </div>
    </div>

    <x-dokumen.detail :dokumen="$dokumen" :halamanAdmin=true />
@endsection
