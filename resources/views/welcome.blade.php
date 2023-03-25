<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body id="home">
    {{-- navbar --}}
    @include('main-layouts.navbar')
    
    <section class="bg-warning">
        <div class="container mt-5 py-5">
            <div class="row">
                <div class="col-md-5 d-md-block d-none">
                    @include('main-layouts.svg')
                </div>
                <div class="col-md-6 d-flex justify-content-center flex-column align-items-center">
                    <h1 class="main-font display-1 text-white fw-semibold mb-0">GEMESAKU</h1>
                    <p class="text-white ms-2 my-0">(Gerakan Membaca Seminggu Satu Kali)</p>
                    <p class="text-white ms-2 my-0 text-uppercase text-center">MGMP Bahasa Indonesia Kabupaten Cirebon</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-5 py-5" id="hasil_pembelajaran">
        <div class="container">
            <h1 class="text-center main-font">Hasil Pembelajaran</h1>
            <p class="text-secondary text-center mb-5 small">Data ini diambil dari hasil karya siswa yang mengikuti gemesaku dari masing-masing sekolah</p>
            <div class="row justify-content-center mb-4">
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control shadow-sm" placeholder="Masukan nama anda.." aria-label="Recipient's username" aria-describedby="button-addon2" id="btn-search">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="row" id="page-search">
                <div class="col text-center p-5">
                    <div class="spinner-border text-dark" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="pengenalan_program" class="mt-5">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7">
                    <h2 class="text-center main-font mb-4">“The United Nations Educational, Scientific and Cultural Organization”</h2>
                    <p class="text-cenodary text-center mb-0">Literasi ialah seperangkat keterampilan nyata, terutama keterampilan dalam membaca dan menulis yang terlepas dari konteks yang mana ketrampilan itu diperoleh serta siapa yang memperolehnya</p>
                    <h5 class="text-center">(UNESCO)</h5>
                </div>
            </div>
            
            <h1 class="text-center text-uppercase mb-4">Pengenalan Program</h1>
            <div class="row">
                <div class="col">
                    <div class="card p-3 py-4 border-0 shadow bg-warning text-white">
                        <h5 class="mb-3"><i class="bi bi-bookmark-heart"></i> Salam Literasi !</h5>
                        <div class="row mb-3">
                            <div class="col-md-7 mb-2">
                                <img src="{{ asset('img/main/image-1.jpg') }}" alt="image" class="img-fluid">
                            </div>
                            <div class="col-md-5">
                                <h3 class="fw-semibold">GEMESAKU Tahun 2018</h3>
                                <hr>
                                <p>Gerakan membaca seminggu satu buku (GEMESAKU) merupakan kegiatan Literasi Sekolah berisi tantangan  membaca yang ditujukan untuk para guru dan peserta didik di sekolah.</p>
                                <p>Kegiatan ini digagas oleh Bapak Rudianto, M. Pd. yang bekerjasama dengan Dinas Kearsipan dan Perpustakaan Daerah pada tahun 2018. </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <img src="{{ asset('img/main/image-2.jpg') }}" alt="image" class="img-fluid">
                            </div>
                            <div class="col-md-6 mb-2">
                                <img src="{{ asset('img/main/image-3.jpg') }}" alt="image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('main-layouts.gallery')

    <div class="my-5 p-5"></div>

    @include('main-layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            noSearch();
            // Search
            $('#btn-search').on('keyup', function(){
                let val = $(this).val();
                if(val != ''){
                    $.ajax({
                        url: "{{ route('search') }}",
                        type: 'get',
                        data: {typeModal: 'main', val},
                        success: function(data){
                            $('#page-search').html(data);
                        },
                        error:function(e){
                        $('#page-search').html(`<div class="col bg-secondary p-5">
                                <p class="text-white text-center">Maaf belum ada Karya yang diupload...</p>
                            </div>`);
                        }
                    })
                }else if (val == ''){
                    noSearch();
                }
            })

            function noSearch(){
                $.ajax({
                    url: "{{ route('search') }}",
                    type: 'get',
                    data: {typeModal: 'search'},
                    success: function(data){
                        $('#page-search').html(data);
                    },
                    error:function(e){
                        $('#page-search').html(`<div class="col bg-secondary p-5">
                            <p class="text-white text-center">Maaf belum ada Karya yang diupload...</p>
                        </div>`);
                    }
                })
            }
        })
    </script>

</body>
</html>