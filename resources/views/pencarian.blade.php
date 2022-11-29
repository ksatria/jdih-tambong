@extends('layouts.utama')

@section('judul', 'Pencarian Dokumen')

@section('konten-utama')
    <h1 class="display-6 fw-semibold my-5">Hasil Pencarian</h1>

    <x-FormPencarian :keyword="$keyword" />

    <p>Hasil pencarian untuk <strong><em>"{{ $keyword }}"</em></strong></p>

    @if (count($hasil) === 0)
        <p><em>Tidak ditemukan dokumen untuk <strong>"{{ $keyword }}"</strong></em></p>
    @else
        @foreach ($hasil as $dokumen)
            <x-Dokumen.Card :dokumen="$dokumen" />
        @endforeach

        {{ $hasil->links() }}
    @endif
@endsection
