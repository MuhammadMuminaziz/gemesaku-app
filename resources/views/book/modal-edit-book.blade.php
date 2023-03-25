<form action="{{ route('buku.update', $book) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <input type="hidden" name="slug" value="{{ $book->slug }}">
    <div class="form-group">
        <label>Judul Buku <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="title" required="" value="{{ old('title', $book->title) }}">
    </div>
    <div class="form-group">
        <label>Nama Penerbit</label>
        <input type="text" class="form-control" name="penerbit" value="{{ old('penerbit', $book->penerbit) }}">
    </div>
    <div class="form-group">
        <label>tahun Terbit</label>
        <input type="text" class="form-control" name="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}">
    </div>
    <div class="form-group">
        <label>Jumlah Halaman</label>
        <input type="text" class="form-control" name="halaman" value="{{ old('halaman', $book->halaman) }}">
    </div>
    <div class="form-group">
        <label class="section-title">Photo Ringkasan <span class="text-secondary">(kosongkan juka tidak di ubah)</span></label>
        <div class="custom-file">
            <input type="file" class="custom-file-input photo" name="photo" id="photo">
            <label class="custom-file-label label-photo" for="photo">Choose file</label>
        </div>
        <small id="passwordHelpBlock" class="form-text text-muted">
            Pastikan file berbentuk gambar dan kurang dari 2 Mb
        </small>
    </div>
    <hr>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary">Edit</button>
    </div>
</form>