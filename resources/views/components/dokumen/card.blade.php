<div class="card mb-3">
    <a href={{ $link }} class="card-body text-decoration-none">
        <div class="card-subtitle mb-2 text-muted">{{ $jenis }} Nomor {{ $nomor }} Tahun
            {{ $tahun }}</div>
        <h2 class="card-title fs-6">{{ $judul }}</h2>
    </a>
    <div class="card-footer text-muted d-flex flex-row justify-content-between">
        <div><small>{{ $tanggal }}</small></div>
        <div>
            <small><i class="bi-eye"></i> <span class="me-2">{{ $jumlahDilihat }}</span></small>
            <small><i class="bi-download"></i> <span>{{ $jumlahDidownload }}</span></small>
        </div>
    </div>
</div>
