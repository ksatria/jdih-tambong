@extends('layouts.admin')

@section('judul', 'Dashboard')

@section('konten-utama')
    <div class="row">
        <div class="col-sm-6 col-md-3 card">
            <div class="card-header">Perdes</div>
            <div class="card-body">{{ $jumlahPerdes }}</div>
        </div>

        <div class="col-sm-6 col-md-3 card">
            <div class="card-header">Perkades</div>
            <div class="card-body">{{ $jumlahPerkades }}</div>
        </div>

        <div class="col-sm-6 col-md-3 card">
            <div class="card-header">Permakades</div>
            <div class="card-body">{{ $jumlahPermakades }}</div>
        </div>

        <div class="col-sm-6 col-md-3 card">
            <div class="card-header">SK Kades</div>
            <div class="card-body">{{ $jumlahSKKades }}</div>
        </div>
    </div>
@endsection
