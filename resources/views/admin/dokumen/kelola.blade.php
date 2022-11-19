@extends('layouts.admin')

@section('judul', $judulHalaman)

@section('tombol-aksi')
    <a class="btn btn-sm btn-warning" href="{{ url()->previous() }}">
        <i class="bi-arrow-left-short"></i> Kembali
    </a>
@endsection

@section('konten-utama')
    @error('dokumen.kelola')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <form method="post" action="{{ $actionURL }}">
        @csrf

        @if (isset($isFormUpdate) and $isFormUpdate)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="judul" class="form-label">Judul produk hukum</label>
            <input type="text" name="judul" class="form-control" value="{{ $judul ?? old('judul') }}" required>
            <div class="form-text">Judul produk hukum menunjukkan bagian "tentang" pada produk hukum tersebut</div>
            @error('judul')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nomor" class="form-label">Nomor produk hukum</label>
            <input type="text" name="nomor" class="form-control" value="{{ $nomor ?? old('nomor') }}" required>
            <div class="form-text">Tuliskan nomor produk hukum secara lengkap sesuai dengan yang tertera pada produk aslinya
            </div>
            @error('nomor')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 row">
            <label for="jenis" class="col-form-label col-lg-3">Jenis produk hukum</label>
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
            <label for="tanggal" class="col-form-label col-lg-3">Tanggal pengesahan</label>
            <div class="col-lg-9">
                <input type="date" name="tanggal" class="form-control" value="{{ $tanggal ?? old('tanggal') }}"
                    required>
                <div class="form-text">Isikan sesuai dengan tanggal penandatanganan dokumen produk hukum</div>
                @error('tanggal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="status" class="form-label col-lg-3">Status keberlakukan</label>
            <div class="col-lg-9">
                <div class="form-check form-switch">
                    <input class="form-check-input" id="input-status-dokumen" type="checkbox" role="switch" name="status"
                        {{ (!isset($status) or $status) ? 'checked' : '' }}>
                    <label class="form-check-label"
                        for="label-status-dokumen">{{ (!isset($status) or $status) ? 'Berlaku' : 'Tidak berlaku' }}</label>
                </div>
                @error('status')
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
