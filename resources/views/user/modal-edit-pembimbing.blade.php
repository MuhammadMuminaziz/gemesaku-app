@csrf
<input type="hidden" name="pembimbing" value="{{ $pembimbing->username }}">
<input type="hidden" name="id" value="{{ $pembimbing->id }}">
@if(url()->previous() != url('profile/' . auth()->user()->username))
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
                <option {{ $school->id === old('school_id', $pembimbing->school_id) ? 'selected' : '' }} value="{{ $school->id }}">{{ $school->name }}</option>
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
            <option selected value="{{ $pembimbing->school_id }}">{{ $pembimbing->school->name }}</option>
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
        <input type="text" class="form-control name" placeholder="masukan nama pembimbing" name="name" value="{{ old('name', $pembimbing->name) }}">
        <div class="invalid-feedback messErr_name"></div>
    </div>
</div>
@if(url()->previous() == url('profile/' . auth()->user()->username))
<div class="form-group">
    <label>Photo</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
            <i class="fas fa-image"></i>
            </div>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="photo" name="photo">
            <label class="custom-file-label" for="photo">Choose file</label>
        </div>
    </div>
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
        <input type="email" class="form-control email" placeholder="masukan email" name="email" value="{{ old('email', $pembimbing->email) }}">
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