@if (!(count($menggantikanDokumen) === 0 and count($digantikanOleh) === 0))
    <ul>
        @foreach ($menggantikanDokumen as $dokumen)
            @php
                $route = (isset($halamanAdmin) and $halamanAdmin) ? route('admin.dokumen.detail', ['id' => $dokumen->id]) : linkPublikDokumen($dokumen->id, $dokumen->judul, $dokumen->tipeDokumen->singkatan_tipe);
            @endphp

            <li>
                {{ $dokumen->pivot->statusPergantian->nama_pergantian }}
                <a href="{{ $route }}">
                    {{ identitasDokumen($dokumen, tanpaJudul: true) }}
                </a>
            </li>
        @endforeach

        @foreach ($digantikanOleh as $dokumen)
            @php
                $route = (isset($halamanAdmin) and $halamanAdmin) ? route('admin.dokumen.detail', ['id' => $dokumen->id]) : linkPublikDokumen($dokumen->id, $dokumen->judul, $dokumen->tipeDokumen->singkatan_tipe);
            @endphp

            <li>
                {{ $dokumen->pivot->statusPergantian->nama_pergantian_pasif }}
                <a href="{{ $route }}">
                    {{ identitasDokumen($dokumen, tanpaJudul: true) }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
