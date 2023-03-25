<x-app-layout>
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        </div>
    </div>

    {{-- Content --}}
    <div class="section-body">
        @if(auth()->user()->role_id == 1)
        <div class="row">
            <div class="col-md-4">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-school"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Sekolah</h4>
                        </div>
                        <div class="card-body">
                        {{ $schools->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Pembimbing</h4>
                        </div>
                        <div class="card-body">
                        {{ $pembimbing->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Siswa</h4>
                        </div>
                        <div class="card-body">
                        {{ $siswa->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Dashboard</h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="text-center bg-warning p-md-5 p-2 mb-3 text-white">
                            <h1 class="m-0">Selamat Datang Di Gemesaku</h1>
                            <p class="my-0">(Gemar Membaca Seminggu Satu Kali)</p>
                            <p class="ms-2 my-0 text-uppercase">MGMP Bahasa Indonesia Kabupaten Cirebon</p>
                        </div>
                        <div class="row justify-content-center py-5">
                            <div class="col-md-7">
                                <h5 class="text-center main-font mb-3">“The United Nations Educational, Scientific and Cultural Organization”</h5>
                                <p class="text-cenodary text-center mb-0">Literasi ialah seperangkat keterampilan nyata, terutama keterampilan dalam membaca dan menulis yang terlepas dari konteks yang mana ketrampilan itu diperoleh serta siapa yang memperolehnya</p>
                                <p class="text-center">(UNESCO)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>