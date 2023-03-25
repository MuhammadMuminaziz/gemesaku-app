<x-app-layout>
    <div class="section-header">
        <h1>Pembimbing</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('pembimbing.index') }}">Pembimbing</a></div>
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
                        <h4>Daftar Pembimbing</h4>
                        <a href="" class="btn btn-primary" id="add-pembimbing"><i class="fas fa-plus"></i> Pembimbing Baru</a>
                    </div>
                    
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-1" id="table-1">
                        <thead>
                            <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>Nama Pembimbing</th>
                            <th>Sekolah</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ $user->school->name }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td>
                                    @if($user->image == null)
                                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle" width="28" height="28" data-toggle="tooltip" title="Wildan Ahdian">
                                    @else
                                    <img alt="image" src="{{ asset('file_upload/user/' . $user->image ) }}" class="rounded-circle" width="28" height="28" data-toggle="tooltip" title="Wildan Ahdian">
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="" class="btn btn-primary m-0 btn-sm lihat-pembimbing mb-1" data-pembimbing="{{ $user->username }}"><i class="far fa-eye"></i></a>
                                    <a href="" class="btn btn-success m-0 btn-sm edit-pembimbing mb-1" data-pembimbing="{{ $user->username }}"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('pembimbing.destroy', $user) }}" method="post" class="d-inline">
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

    <form  method="post" class="modal-part modal-add-pembimbing" id="modal-add-pembimbing" enctype="multipart/form-data">
        <div class="row justify-content-center page-modal-lihat-pembimbing">
            
        </div>
    </form>
    
    <form class="modal-part modal-edit-pembimbing">
        <div class="row justify-content-center page-modal-lihat-pembimbing">
            
        </div>
    </form>

    <div id="modal-lihat-pembimbing" class="p-2">
        <div class="row justify-content-center page-modal-lihat-pembimbing">
            
        </div>
    </div>
</x-app-layout>