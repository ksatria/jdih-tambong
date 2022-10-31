<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-10">
            <div class="card-body">
                <div class="card-subtitle mb-2 text-muted">
                    {{ $jenis }} Nomor {{ $nomor }} Tahun {{ $tahun }}
                </div>
                <h2 class="card-title fs-6">
                    <a href={{ $link }} class="text-decoration-none text-body">{{ $judul }}</a>
                </h2>
                <small class="text-muted">
                    <i class="bi-calendar2-check"></i> <span class="me-2">{{ $tanggal }}</span>
                    <i class="bi-eye"></i> <span class="me-2">{{ $jumlahDilihat }}</span>
                    <i class="bi-download"></i> <span>{{ $jumlahDidownload }}</span>
                </small>
            </div>
        </div>
        <div class="col-md-2 d-flex flex-row justify-content-evenly">
            <div class="p-3 my-auto">
                <a href="{{ $link }}" target="_blank" class="text-decoration-none text-body">
                    <i class="bi-eye"></i>
                </a>
            </div>
            <div class="p-3 my-auto">
                <a href="#" class="text-decoration-none text-body">
                    <i class="bi-pencil"></i>
                </a>
            </div>
        </div>
    </div>
</div>
