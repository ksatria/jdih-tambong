@if (count($dokumenTerkait) === 0)
    <em>Tidak ada dokumen lain yang terkait dengan dokumen ini</em>
@else
    <ul>
        @foreach ($dokumenTerkait as $dokumen)
            <li>{{ $dokumen->tipeDokumen->singkatan_tipe }} No. {{ $dokumen->nomor }} Tahun
                {{ date('Y', strtotime($dokumen->tanggal_pengesahan)) }}</li>
        @endforeach
    </ul>
@endif
