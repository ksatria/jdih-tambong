@extends('layouts.admin')

@section('judul', 'Daftar Dokumen')

@section('konten-utama')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Dokumen</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle me-2">
                <span data-feather="calendar" class="align-text-bottom"></span>
                Semua Dokumen
            </button>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.dokumen.tambah') }}">
                <i class="bi-plus-lg"></i> Dokumen Baru
            </a>
        </div>
    </div>

    @if (count($kumpulanDokumen) === 0)
        <div class="alert alert-warning">Belum ada dokumen yang disimpan</div>
    @else
        @foreach ($kumpulanDokumen as $dokumen)
            <x-admin.dokumen-card :dokumen="$dokumen" />
        @endforeach

        {{ $kumpulanDokumen->links() }}
    @endif
@endsection
