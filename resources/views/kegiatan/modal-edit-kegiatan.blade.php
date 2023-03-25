<form action="{{ route('kegiatan.update', $kegiatan) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $kegiatan->id }}">
    <div class="form-group">
        <label>Judul Kegiatan <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="title" required="" value="{{ old('title', $kegiatan->judul_kegiatan->name) }}">
    </div>
    <div class="form-group">
        <label>Deskripsi Kegiatan</label>
        <textarea class="form-control" name="desc">{{ old('desc', $kegiatan->judul_kegiatan->desc) }}</textarea>
      </div>
    <div class="form-group">
        <label class="section-title">Photo Ringkasan <span class="text-danger">*</span> <span class="text-secondary">(kosongkan jika tidak diubah)</span></label>
        <div class="custom-file">
            <input type="file" class="custom-file-input photo" name="photo" id="photo">
            <label class="custom-file-label label-photo" for="photo">Choose file</label>
        </div>
        <small class="form-text text-muted">
            Pastikan file berbentuk gambar dan kurang dari 2 Mb
        </small>
    </div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary">Edit</button>
    </div>
</form>