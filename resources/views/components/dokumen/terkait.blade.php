@if (count($dokumenTerkait) === 0 and count($dikaitkanDengan) === 0)
    <em>Tidak ada produk hukum lain yang berkaitan dengan produk hukum ini</em>
@else
    <ul>
        @foreach ([$dokumenTerkait, $dikaitkanDengan] as $kaitan)
            @foreach ($kaitan as $dokumen)
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
        @endforeach
    </ul>
@endif
