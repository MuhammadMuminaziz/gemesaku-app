<x-app-layout>
    <div class="section-header">
        <h1>Sekolah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('sekolah.index') }}">Sekolah</a></div>
            {{-- <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div> --}}
        </div>
    </div>

    {{-- Content --}}
    <div class="section-body">
        <div class="row">
            <div class="col-md-7">
                <div class="card card-primary">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar Sekolah</h4>
                    </div>
                    
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-1" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Nama Sekolah</th>
                                <th>Wilayah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schools as $school)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->religion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form class="modal-part" id="modal-login-part">
        <div class="form-group">
            <label>Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-envelope"></i>
                    </div>
                </div>
            <input type="text" class="form-control" placeholder="Email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label>Password</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-lock"></i>
                    </div>
                </div>
            <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
        </div>
        <div class="form-group mb-0">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                <label class="custom-control-label" for="remember-me">Remember Me</label>
            </div>
        </div>
    </form>
</x-app-layout>