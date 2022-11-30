@extends('layouts.admin')

@section('judul', 'Daftar Produk Hukum')

@section('tombol-aksi')
    {{-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle me-2">
        <span data-feather="calendar" class="align-text-bottom"></span>
        Semua Produk Hukum
    </button> --}}
    <a class="btn btn-sm btn-primary" href="{{ route('admin.dokumen.tambah') }}">
        <i class="bi-plus-lg"></i> Produk Hukum Baru
    </a>
@endsection

@section('konten-utama')
    @if (count($kumpulanDokumen) === 0)
        <div class="alert alert-warning">Tidak ada produk hukum yang ditemukan di dalam sistem</div>
    @else
        <x-FormPencarian :keyword="$keyword" :action="route('admin.dokumen')" />

        @foreach ($kumpulanDokumen as $dokumen)
            <x-Admin.DokumenCard :dokumen="$dokumen" />
        @endforeach

        {{ $kumpulanDokumen->links() }}
    @endif
@endsection
