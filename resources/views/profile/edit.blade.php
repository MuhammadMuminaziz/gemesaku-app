<x-app-layout>
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('pembimbing.show', auth()->user()->username) }}">Profile</a></div>
        </div>
    </div>

    {{-- Content --}}
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6 py-4 px-3 bg-white">
                            <h2>{{ $user->name }}</h2>
                            <p class="m-0">{{ $user->email }}</p>
                            @if($user->school_id != null)
                            <p class="m-0">{{ $user->school->name }}</p>
                            @endif
                            <a href="" class="btn btn-success m-0 btn-sm edit-pembimbing" data-pembimbing="{{ $user->username }}"><i class="far fa-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form class="modal-part modal-edit-pembimbing">
        <div class="row justify-content-center page-modal-lihat-pembimbing">
            
        </div>
    </form>
</x-app-layout>