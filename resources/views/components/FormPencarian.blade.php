<form action="{{ $action }}" method="get" class="row align-items-center my-5" id="form-pencarian">
    <div class="col-12">
        <label for="q" class="visually-hidden">Keyword</label>
        <div class="input-group input-group-lg">
            <input type="text" name="q" placeholder="Masukkan kata kunci" value="{{ $keyword }}"
                class="form-control">
            <input type="submit" value="Cari" class="btn btn-primary">
        </div>
    </div>
</form>
