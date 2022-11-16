@if (count($berkasTerkait) === 0)
    <em>Tidak ada berkas yang terkait dengan dokumen ini</em>
@else
    <ul>
        @foreach ($berkasTerkait as $berkas)
            <li><a href="#">{{ $berkas->nama }}</a></li>
        @endforeach
    </ul>
@endif
