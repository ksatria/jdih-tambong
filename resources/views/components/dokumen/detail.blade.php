<table class="table">
    <tbody>
        <tr>
            <td>Judul</td>
            <td>:</td>
            <td>{{ $judul }}</td>
        </tr>
        <tr>
            <td>Tipe</td>
            <td>:</td>
            <td>{{ $tipe }}</td>
        </tr>
        <tr>
            <td>Nomor</td>
            <td>:</td>
            <td>{{ $nomor }}</td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td>{{ $tahun }}</td>
        </tr>
        <tr>
            <td>Tanggal pengesahan</td>
            <td>:</td>
            <td>{{ $tanggal }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td><span
                    class="badge {{ $status == 'Berlaku' ? 'text-bg-success' : 'text-bg-danger' }}">{{ $status }}</span>
            </td>
        </tr>
        <tr>
            <td>Berkas terkait</td>
            <td>:</td>
            <td>
                <x-berkas.berkas-terkait :berkasTerkait="$berkasTerkait" />

                @if ($halamanAdmin)
                    <p class="small"><a href="{{ route('admin.berkas.unggah', ['idDokumen' => $id]) }}">Tambahkan
                            berkas</a></p>
                @endif
            </td>
        </tr>
        <tr>
            <td>Dokumen terkait</td>
            <td>:</td>
            <td>
                <x-dokumen.terkait :dokumenTerkait="$dokumenTerkait" :halamanAdmin="$halamanAdmin" />

                @if ($halamanAdmin)
                    <p class="small"><a href="{{ route('admin.dokumen.terkait.tambah', ['id' => $id]) }}">Tambahkan
                            dokumen
                            terkait</a></p>
                @endif
            </td>
        </tr>
    </tbody>
</table>
