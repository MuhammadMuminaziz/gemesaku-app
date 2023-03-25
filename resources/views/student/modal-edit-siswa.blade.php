@method('put')
@csrf
<input type="hidden" name="siswa" value="{{ $siswa->username }}">
<div class="form-group">
    <label>Nama Siswa <span class="text-danger">*</span></label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
            <i class="fas fa-user"></i>
            </div>
        </div>
        <input type="text" class="form-control name" placeholder="masukan nama siswa" name="name" value="{{ old('name', $siswa->name) }}">
        <div class="invalid-feedback messErr_name"></div>
    </div>
</div>
<div class="form-group">
    <label>Kelas <span class="text-danger">*</span></label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
            <i class="fas fa-school"></i>
            </div>
        </div>
        <select class="custom-select class" name="class">
            <option value="VII" {{ $siswa->class == 'VII' ? 'selected' : '' }}>Kelas VII</option>
            <option value="VIII" {{ $siswa->class == 'VIII' ? 'selected' : '' }}>Kelas VIII</option>
        </select>
        <div class="invalid-feedback messErr_class"></div>
    </div>
</div>
