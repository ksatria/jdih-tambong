@extends('layouts.admin')

@section('judul', 'Unggah Berkas')

@section('konten-utama')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Unggah Berkas</h1>
    </div>

    <div class="mb-3">
        Unggah berkas terkait untuk <strong>{{ $identitasDokumen }}</strong>

        <div class="card mt-3">
            <div class="card-body">
                @error('berkas.unggah')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <form action="{{ route('admin.berkas.unggah.proses', ['idDokumen' => $idDokumen]) }}" method="post"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="row g-1">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="namaberkas" class="form-control" placeholder="nama berkas">
                                <label for="namaberkas">Nama Berkas</label>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-floating mb-3">
                                <input type="file" name="berkas" class="form-control" placeholder="berkas">
                                <label for="berkas">Pilih Berkas</label>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-primary">Unggah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <h2 class="h6">Berkas Terkait</h2>
        <x-berkas.berkas-terkait :berkasTerkait="$berkasTerkait" />
    </div>
@endsection
