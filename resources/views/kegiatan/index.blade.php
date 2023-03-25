<x-app-layout>
    <div class="section-header">
        <h1>Photo kegiatan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('pembimbing.index') }}">Kegiatan</a></div>
            {{-- <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div> --}}
        </div>
    </div>

    {{-- Content --}}
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Photo Kegiatan</h4>
                        <a href="" class="btn btn-primary" id="upload-kegiatan"><i class="fas fa-upload"></i> Upload Photo</a>
                    </div>
                    
                    <div class="card-body">
                        @if($kegiatan->count() > 0)
                            @foreach($judul_kegiatan as $judul)
                                <div class="row justify-content-between align-items-center mb-3">
                                    <div class="col-md-7 mb-2">
                                        <h5 class="">{{ $judul->name }}</h5>
                                        <small class="">{{ $judul->desc }}</small>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <form action="{{ url('kegiatan/destroy/judul') }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="slug" value="{{ $judul->slug }}">
                                            <button type="submit" class="d-none"></button>
                                            <a href="" class="btn btn-sm btn-danger not-link confirm-delete mb-1"><i class="fas fa-trash"> Hapus Kegiatan</i></a>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($kegiatan->where('judul_kegiatan_id', $judul->id) as $row)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{ asset('file_upload/kegiatan/' . $row->photo) }}" alt="" width="100%" height="170">
                                            <div class="card-body p-2">
                                                <p class="text-primary m-0">{{ $row->title }}</p>
                                                <hr class="m-0 mb-2">
                                                <div class="d-flex mb-2" style="gap: 4px">
                                                    {{-- <a href="" class="btn btn-primary m-0 btn-sm mb-1 lihat-kegiatan" data-kegiatan="{{ $row->slug }}" data-title="{{ $row->title }}"><i class="far fa-eye"></i></a> --}}
                                                    <a href="" class="btn btn-success m-0 btn-sm edit-kegiatan mb-1" data-kegiatan="{{ $row->id }}"><i class="far fa-edit"></i></a>
                                                    <form action="{{ route('kegiatan.destroy', $row) }}" method="post" class="d-inline">
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
                                </div>
                            @endforeach
                        @else
                        <div class="row">
                            <div class="col">
                                <p class="text-secondary text-center">Belum ada photo yang di upload..</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('kegiatan.store') }}" method="post" class="modal-part modal-upload-kegiatan" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Judul Kegiatan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="title" required="">
        </div>
        <div class="form-group">
            <label>Deskripsi Kegiatan</label>
            <textarea class="form-control" name="desc"></textarea>
          </div>
        <div class="form-group">
            <label class="section-title">Photo Kegiatan <span class="text-danger">*</span></label>
            <div class="custom-file">
                <input type="file" class="custom-file-input photo" name="photo[]" id="photo" required="" multiple>
                <label class="custom-file-label label-photo" for="photo">Choose file</label>
            </div>
            <small class="form-text text-muted">
                Pastikan file berbentuk gambar dan kurang dari 2 Mb
            </small>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary">Upload</button>
        </div>
    </form>
    
    {{-- <div class="modal-lihat-kegiatan" class="p-2">
    </div> --}}

    <div class="modal-part modal-edit-kegiatan">
    </div>
</x-app-layout>