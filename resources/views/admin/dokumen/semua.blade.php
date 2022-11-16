@extends('layouts.admin')

@section('judul', 'Daftar Dokumen')

@section('tombol-aksi')
    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle me-2">
        <span data-feather="calendar" class="align-text-bottom"></span>
        Semua Dokumen
    </button>
    <a class="btn btn-sm btn-primary" href="{{ route('admin.dokumen.tambah') }}">
        <i class="bi-plus-lg"></i> Dokumen Baru
    </a>
@endsection

@section('konten-utama')
    @if (count($kumpulanDokumen) === 0)
        <div class="alert alert-warning">Belum ada dokumen yang disimpan</div>
    @else
        @foreach ($kumpulanDokumen as $dokumen)
            <x-admin.dokumen-card :dokumen="$dokumen" />
        @endforeach

        {{ $kumpulanDokumen->links() }}
    @endif
@endsection
