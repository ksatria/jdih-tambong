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

                    <div class="row g-2">
                        <div class="col-lg-5">
                            <div class="form-floating">
                                <input type="text" name="namaberkas" class="form-control" placeholder="nama berkas">
                                <label for="namaberkas">Nama Berkas</label>
                            </div>
                            @error('namaberkas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-5">
                            <div class="form-floating">
                                <input type="file" name="berkas" class="form-control" placeholder="berkas"
                                    accept=".pdf">
                                <label for="berkas">Pilih Berkas</label>
                                <div class="form-text">* Berkas harus berupa PDF</div>
                            </div>
                            @error('berkas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary btn-lg">Unggah</button>
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
