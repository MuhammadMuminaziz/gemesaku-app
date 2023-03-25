<x-app-layout>
    <div class="section-header">
        <h1>Siswa</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('siswa.index') }}">Siswa</a></div>
            <div class="breadcrumb-item">{{ $siswa->username }}</div>
        </div>
    </div>

    {{-- Content --}}
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>{{ $siswa->name }} Kelas {{ $siswa->class }}</h4>
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="">Buku yang sudah dibaca:</h5>
                            <a href="" class="btn btn-success btn-sm upload-buku"><i class="fas fa-upload"></i> <span class="d-md-inline d-none">Upload Ringkasan Buku</span></a>
                        </div>
                        <div class="row">
                            @if($books->count() > 0)
                            @foreach($books as $book)
                            <div class="col-md-3 col-sm-6">
                                <div class="card" style="overflow: hidden">
                                    <img src="{{ asset('file_upload/buku/' .  $book->photo) }}" alt="photo" height="150" width="100%">
                                    <div class="card-body p-2">
                                        <p class="text-primary m-0">{{ $book->title }}</p>
                                        <hr class="m-0 mb-2">
                                        <div class="d-flex mb-2" style="gap: 4px">
                                            <a href="" class="btn btn-primary m-0 btn-sm mb-1 lihat-book" data-book="{{ $book->slug }}" data-title="{{ $book->title }}"><i class="far fa-eye"></i></a>
                                            <a href="" class="btn btn-success m-0 btn-sm edit-book mb-1" data-book="{{ $book->slug }}"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('buku.destroy', $book) }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="d-none"></button>
                                                <a href="" class="btn btn-sm btn-danger not-link confirm-delete mb-1"><i class="fas fa-trash"></i></a>
                                            </form>
                                            <a href="{{ asset('file_upload/buku/' . $book->photo) }}" class="btn btn-success m-0 btn-sm mb-1" download=""><i class="fas fa-download"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col">
                                <div class="card py-5 px-3 bg-secondary d-flex justify-content-center align-items-center">
                                    <p class="m-0">Belum ada ringkasan photo yang diupload</p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5>Bukti Pembelajaran:</h5>
                            <a href="" class="btn btn-success btn-sm upload-pembelajaran upload-video"><i class="fas fa-upload"></i> <span class="d-md-inline d-none">Upload Ringkasan Pembelajaran</span></a>
                        </div>
                        <div class="row">
                            @if($videos->count() > 0)
                                @foreach($videos as $video)
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->link }}" allowfullscreen></iframe>
                                            </div>
                                            <div class="card-body p-2">
                                                <p class="text-primary m-0">{{ $video->title }}</p>
                                                <hr class="m-0 mb-2">
                                                <div class="d-flex mb-2" style="gap: 4px">
                                                    <a href="" class="btn btn-success m-0 btn-sm edit-video mb-1" data-video="{{ $video->slug }}"><i class="far fa-edit"></i></a>
                                                    <form action="{{ route('video.destroy', $video) }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="d-none"></button>
                                                        <a href="" class="btn btn-sm btn-danger not-link confirm-delete mb-1"><i class="fas fa-trash"></i></a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                            <div class="col">
                                <div class="card py-5 px-3 bg-secondary d-flex justify-content-center align-items-center">
                                    <p class="m-0">Belum ada ringkasan bukti yang diupload</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('buku.store') }}" method="post" class="modal-part modal-upload-buku" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="student" value="{{ $siswa->username }}">
        <div class="form-group">
            <label>Judul Buku <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="title" required="">
        </div>
        <div class="form-group">
            <label>Nama Penerbit</label>
            <input type="text" class="form-control" name="penerbit">
        </div>
        <div class="form-group">
            <label>tahun Terbit</label>
            <input type="text" class="form-control" name="tahun_terbit">
        </div>
        <div class="form-group">
            <label>Jumlah Halaman</label>
            <input type="text" class="form-control" name="halaman">
        </div>
        <div class="form-group">
            <label class="section-title">Photo Ringkasan <span class="text-danger">*</span></label>
            <div class="custom-file">
                <input type="file" class="custom-file-input photo" name="photo" id="photo" required="">
                <label class="custom-file-label label-photo" for="photo">Choose file</label>
            </div>
            <small class="form-text text-muted">
                Pastikan file berbentuk gambar dan kurang dari 2 Mb
            </small>
        </div>
        <hr>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary">Upload</button>
        </div>
    </form>
    
    <form action="{{ route('video.store') }}" method="post" class="modal-part modal-upload-video">
        @csrf
        <input type="hidden" name="student" value="{{ $siswa->username }}">
        <div class="form-group">
            <label>Judul Video <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="title" required="">
        </div>
        <div class="form-group">
            <label>Link Video <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="link" required="">
            <small class="form-text text-muted">
                Pastikan link bersumber dari Youtube
            </small>
        </div>
        <hr>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary">Upload</button>
        </div>
    </form>

    <div class="modal-lihat-book" class="p-2">
    </div>

    <div class="modal-part modal-edit-buku">
    </div>
    
    <div class="modal-part modal-edit-video">
    </div>
</x-app-layout>