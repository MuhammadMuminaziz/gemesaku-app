<form action="{{ route('video.update', $video) }}" method="post">
    @method('put')
    @csrf
    <input type="hidden" name="video" value="{{ $video->slug }}">
    <div class="form-group">
        <label>Judul Video <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="title" required="" value="{{ old('title', $video->title) }}">
    </div>
    <div class="form-group">
        <label>Link Video <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="link" required="" value="{{ old('link', 'https://youtu.be/' . $video->link) }}">
        <small class="form-text text-muted">
            Pastikan link bersumber dari Youtube
        </small>
    </div>
    <hr>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary">Edit</button>
    </div>
</form>