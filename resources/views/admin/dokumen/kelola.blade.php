@extends('layouts.admin')

@section('judul', $judulHalaman)

@section('konten-utama')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $judulHalaman }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-warning" href="{{ url()->previous() }}">
                <i class="bi-arrow-left-short"></i> Kembali
            </a>
        </div>
    </div>

    @error('dokumen.kelola')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <form method="post" action="{{ $actionURL }}">
        @csrf

        @if (isset($isFormUpdate) and $isFormUpdate)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="judul" class="form-label">Judul dokumen</label>
            <input type="text" name="judul" class="form-control" value="{{ $judul ?? old('judul') }}" required>
            <div class="form-text">Judul dokumen menunjukkan bagian "tentang" pada dokumen tersebut</div>
            @error('judul')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nomor" class="form-label">Nomor dokumen</label>
            <input type="text" name="nomor" class="form-control" value="{{ $nomor ?? old('nomor') }}" required>
            <div class="form-text">Tuliskan nomor dokumen secara lengkap sesuai dengan yang tertera pada dokumen aslinya
            </div>
            @error('nomor')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 row">
            <label for="jenis" class="col-form-label col-lg-3">Jenis dokumen</label>
            <div class="col-lg-9">
                <select name="jenis" class="form-select" placeholder="Pilih" required>
                    @foreach ($tipeDokumen as $tipe)
                        <option value="{{ $tipe->id }}"
                            {{ (isset($jenis) and $jenis == $tipe->id or old('jenis') == $tipe->id) ? 'selected' : '' }}>
                            {{ $tipe->nama_tipe }}</option>
                    @endforeach
                </select>
                @error('jenis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="tanggal" class="col-form-label col-lg-3">Tanggal pengesahan dokumen</label>
            <div class="col-lg-9">
                <input type="date" name="tanggal" class="form-control" value="{{ $tanggal ?? old('tanggal') }}"
                    required>
                <div class="form-text">Isikan sesuai dengan tanggal penandatanganan dokumen</div>
                @error('tanggal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="status" class="form-label col-lg-3">Status keberlakukan dokumen</label>
            <div class="col-lg-9">
                <div class="form-check form-switch">
                    <input class="form-check-input" id="input-status-dokumen" type="checkbox" role="switch" name="status"
                        {{ (!isset($status) or $status) ? 'checked' : '' }}>
                    <label class="form-check-label"
                        id="label-status-dokumen">{{ (!isset($status) or $status) ? 'Berlaku' : 'Tidak berlaku' }}</label>
                </div>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="berkas" class="col-form-label col-lg-3">Upload file dokumen</label>
            <div class="col-lg-9">
                <input type="file" name="berkas" class="form-control">
                @error('berkas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('#input-status-dokumen').change(function() {
            let text = $('#input-status-dokumen').is(':checked') ? 'Berlaku' : 'Tidak berlaku';
            $('#label-status-dokumen').html(text);
        })
    </script>
@endsection
