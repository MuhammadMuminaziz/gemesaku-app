<section id="gallery" class="my-5">
    <div class="container my-5 py-5">
        <h1 class="text-center mb-4">Gallery</h1>
        @if($kegiatan->count() > 0)
        @foreach($judul_kegiatan as $judul)
            <div class="mb-4">
                <h4 class="text-center text-warning">{{ $judul->name }}</h4>
                <div class="d-flex justify-content-center">
                    <div class="col-md-7 text-center">
                        <small class="text-secondary text-center">{{ $judul->desc }}</small>
                    </div>
                </div>
            </div>
            <div class="row mb-5" data-masonry='{"percentPosition": true }'>
                @foreach ($kegiatan->where('judul_kegiatan_id', $judul->id) as $row)
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="{{ asset('file_upload/kegiatan/' . $row->photo) }}" alt="" class="img-fluid">
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
    @else
    <div class="row mb-5">
        <div class="col bg-secondary p-5">
            <p class="text-white text-center">Belum ada photo yang di upload..</p>
        </div>
    </div>
    @endif
    </div>
</section>