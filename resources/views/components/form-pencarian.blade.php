<form action="{{ route('cari.default') }}" method="get">
    <input type="text" name="q" value="{{ $keyword }}">
    <input type="submit" value="Cari">
</form>
