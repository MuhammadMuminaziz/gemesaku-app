<x-app-layout>
    <div class="section-header">
        <h1>Siswa</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('siswa.index') }}">Siswa</a></div>
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
                        <h4>Daftar Siswa</h4>
                        <a href="" class="btn btn-success" id="add-siswa">Tambah Siswa</a>
                    </div>
                    
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-1" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Sekolah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $student->name }}</td>
                                    <td class="align-middle">{{ $student->class }}</td>
                                    <td class="align-middle">{{ $student->school->name }}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('siswa.show', $student) }}" class="btn btn-primary m-0 btn-sm mb-1"><i class="far fa-eye"></i></a>
                                        <a href="" class="btn btn-success m-0 btn-sm edit-siswa mb-1" data-siswa="{{ $student->username }}"><i class="far fa-edit"></i></a>
                                        <form action="{{ route('siswa.destroy', $student) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="d-none"></button>
                                                <a href="" class="btn btn-sm btn-danger not-link confirm-delete mb-1"><i class="fas fa-trash"></i></a>
                                        </form>
                                    </td>
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

    <form class="modal-part modal-add-siswa">
    </form>
    
    <form class="modal-part modal-edit-siswa">
    </form>
</x-app-layout>