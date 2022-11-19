@if (count($dokumenTerkait) === 0)
    <em>Tidak ada dokumen lain yang terkait dengan dokumen ini</em>
@else
    <ul>
        @foreach ($dokumenTerkait as $dokumen)
            @php
                $route = (isset($halamanAdmin) and $halamanAdmin) ? route('admin.dokumen.detail', ['id' => $dokumen->id]) : linkPublikDokumen($dokumen->id, $dokumen->judul, $dokumen->tipeDokumen->singkatan_tipe);
            @endphp

            <li>
                <a href="{{ $route }}">
                    {{ $dokumen->tipeDokumen->singkatan_tipe }}
                    No. {{ $dokumen->nomor }}
                    Tahun {{ date('Y', strtotime($dokumen->tanggal_pengesahan)) }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
