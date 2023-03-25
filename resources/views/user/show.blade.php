<x-app-layout>
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('pembimbing-sekolah', $user->username) }}">Profile</a></div>
        </div>
    </div>

    {{-- Content --}}
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            @if($user->image == null)
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="img-fluid">
                            @else
                            <img alt="image" src="{{ asset('file_upload/user/' . $user->image) }}" class="img-fluid">
                            @endif
                        </div>
                        <div class="col-md-6 py-4 px-3 bg-white">
                            <div class="d-flex align-items-center" style="gap: 10px">
                                <h2>{{ $user->name }}</h2>
                                <a href="" class="btn btn-success m-0 btn-sm edit-profile"><i class="far fa-edit"></i></a>
                            </div>
                            <hr class="">
                            <p class="m-0">{{ $user->email }}</p>
                            @if($user->school_id != null)
                            <p class="m-0">{{ $user->school->name }}</p>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('pembimbing-sekolah.update', $user) }}" method="post" class="modal-part modal-edit-profile" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="hidden" name="pembimbing" value="{{ $user->username }}">
        <input type="hidden" name="id" value="{{ $user->id }}">
        @if(url()->current() != url('profile/' . $user->username))
        <div class="form-group">
            <label>Nama Sekolah <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-school"></i>
                    </div>
                </div>
                <select class="custom-select school_id" name="school_id">
                    <option disabled selected>pilih sekolah</option>
                    @foreach($schools as $school)
                        <option {{ $school->id === old('school_id', $user->school_id) ? 'selected' : '' }} value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback messErr_school_id"></div>
            </div>
        </div>
        @endif
        @if(auth()->user()->role_id == 2)
        <div class="form-group">
            <label>Nama Sekolah <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-school"></i>
                    </div>
                </div>
                <select class="custom-select school_id" name="school_id" disabled>
                    <option selected value="{{ $user->school_id }}">{{ $user->school->name }}</option>
                </select>
            </div>
        </div>
        @endif
        <div class="form-group">
            <label>Nama Pembimbing <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-user"></i>
                    </div>
                </div>
                <input type="text" class="form-control name" placeholder="masukan nama pembimbing" name="name" value="{{ old('name', $user->name) }}" required="">
                <div class="invalid-feedback messErr_name"></div>
            </div>
        </div>
        @if(url()->current() == url('profile/' . $user->username))
        <div class="form-group">
            <label>Photo</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-image"></i>
                    </div>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input photo" id="photo" name="photo">
                    <label class="custom-file-label label-photo" for="photo">Choose file</label>
                </div>
            </div>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Pastikan file berbentuk gambar dan kurang dari 2 Mb
            </small>
        </div>
        @endif
        <div class="form-group">
            <label>Email <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <input type="email" class="form-control email" placeholder="masukan email" name="email" value="{{ old('email', $user->email) }}" required="">
                <div class="invalid-feedback messErr_email"></div>
            </div>
        </div>
        <div class="form-group mb-2">
            <label>Password <span class="text-secondary">(kosongkan jika tidak diubah)</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-lock"></i>
                    </div>
                </div>
            <input type="password" class="form-control password" placeholder="password" name="password">
            <div class="invalid-feedback messErr_password"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-lock"></i>
                    </div>
                </div>
            <input type="password" class="form-control" placeholder="ulangi password" name="password_confirmation">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary">Edit</button>
        </div>
    </form>
</x-app-layout>