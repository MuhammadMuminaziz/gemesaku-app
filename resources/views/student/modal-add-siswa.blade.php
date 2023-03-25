@csrf
<div class="form-group">
    <label>Nama Siswa <span class="text-danger">*</span></label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
            <i class="fas fa-user"></i>
            </div>
        </div>
        <input type="text" class="form-control name" placeholder="masukan nama siswa" name="name">
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
            <option disabled selected>pilih kelas</option>
            <option value="VII">Kelas VII</option>
            <option value="VIII">Kelas VIII</option>
        </select>
        <div class="invalid-feedback messErr_class"></div>
    </div>
</div>
