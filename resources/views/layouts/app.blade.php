{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Gemesaku</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}"> --}}

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      
      {{-- Topbar --}}
      @include('layouts.topbar')

      {{-- Sidebar --}}
      @include('layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          {{ $slot }}
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left small">
          Copyright &copy; Gemesaku 2023 <div class="bullet"></div> Design By <a href="">Muhammad Mu'min Azis</a>
        </div>
      </footer>
    </div>
  </div>

  @if(session('success'))
  <div class="message" data-message="{{ session('success') }}"></div>
  @endif

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
  {{-- <script src="{{ asset('js/dropzone.min.js') }}"></script> --}}
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  
  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
  <script src="{{ asset('assets/js/page/modules-sweetalert.js') }}"></script>
  {{-- <script src="{{ asset('assets/js/page/components-multiple-upload.js') }}"></script> --}}
  
  {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
  <script>
    $(document).ready( function () {
        $('#table-1').DataTable();

        // modal add pembimbing
        $("#add-pembimbing").click(function(){
            $.ajax({
                url: "{{ url('pembimbing/modal') }}",
                type: "get",
                data: {
                    modalType: 'create'
                },
                success: function(data){
                    $('.modal-add-pembimbing').html(data);
                },
                error: function(e){
                    $('.modal-add-pembimbing').html("<div class='text-danger'>Maaf terjadi kesalahan...</div>");
                }
            })
        })
        $("#add-pembimbing").fireModal({
            title: 'Tambah Pembimbing',
            body: $(".modal-add-pembimbing"),
            autoFocus: false,
            onFormSubmit: function(modal, e, form) {
                // Form Data
                let form_data = $(e.target).serialize();
            
                // DO AJAX HERE
                let fake_ajax = setTimeout(function() {
                    $.ajax({
                    url: "{{ url('register') }}",
                    type: "post",
                    data: form_data,
                    success: function(data){
                        form.stopProgress();
                        swal({
                            icon: 'success',
                            text: data.message
                        }).then(() => {
                            location.reload()
                        });
                    },
                    error: function(e){
                        form.stopProgress();
                        let errors = e.responseJSON.errors;
                        $.each(errors, function(prefix, val){
                        $('.' + prefix).addClass('is-invalid');
                        $('.messErr_' + prefix).text(val[0]);
                        })
                    }
                    })
            
                    clearInterval(fake_ajax);
                }, 1000);
            
                e.preventDefault();
                },
                shown: function(modal, form) {
                console.log(form)
                },
                buttons: [
                {
                    text: 'Tambahkan',
                    submit: true,
                    class: 'btn btn-primary btn-shadow',
                    handler: function(modal) {
                    }
                }
                ]
            });
        
        // modal edit pembimbing
        $(".edit-pembimbing").click(function(){
            let pembimbing = $(this).data('pembimbing');
            $.ajax({
                url: "{{ url('pembimbing/modal') }}",
                type: "get",
                data: {
                    modalType: 'edit',
                    username: pembimbing
                },
                success: function(data){
                    $('.modal-edit-pembimbing').html(data);
                },
                error: function(e){
                    $('.modal-edit-pembimbing').html("<div class='text-danger'>Maaf terjadi kesalahan...</div>");
                }
            })
        })
        $(".edit-pembimbing").fireModal({
            title: 'Edit Pembimbing',
            body: $(".modal-edit-pembimbing"),
            autoFocus: false,
            onFormSubmit: function(modal, e, form) {
                // Form Data
                let form_data = $(e.target).serialize();
                let pembimbing = $(e.target.pembimbing).val();
            
                // DO AJAX HERE
                let fake_ajax = setTimeout(function() {
                    $.ajax({
                    url: "{{ url('pembimbing/edit/') }}" + pembimbing,
                    type: "put",
                    data: form_data,
                    success: function(data){
                        form.stopProgress();
                        swal({
                            icon: 'success',
                            text: data.message
                        }).then(() => {
                            location.reload()
                        });
                    },
                    error: function(e){
                        form.stopProgress();
                        let errors = e.responseJSON.errors;
                        $.each(errors, function(prefix, val){
                        $('.' + prefix).addClass('is-invalid');
                        $('.messErr_' + prefix).text(val[0]);
                        })
                    }
                    })
                    form.stopProgress();
            
                    clearInterval(fake_ajax);
                }, 1000);
            
                e.preventDefault();
                },
                shown: function(modal, form) {
                console.log(form)
                },
                buttons: [
                {
                    text: 'Edit',
                    submit: true,
                    class: 'btn btn-primary btn-shadow',
                    handler: function(modal) {
                    }
                }
                ]
            });

        // modal lihat pembimbing
        $(".lihat-pembimbing").click(function(){
            let pembimbing = $(this).data('pembimbing');
            $.ajax({
                url: "{{ url('pembimbing/modal') }}",
                type: "get",
                data: {
                    modalType: "lihat",
                    username: pembimbing
                },
                success: function(data){
                    $('.page-modal-lihat-pembimbing').html(data);
                },
                error: function(e){
                    $('.page-modal-lihat-pembimbing').html("<div class='text-danger'>Maaf terjadi kesalahan...</div>");
                }
            })
        })
        $(".lihat-pembimbing").fireModal({title: "Pembimbing", body: $('#modal-lihat-pembimbing')});

        // modal add siswa
        $("#add-siswa").click(function(){
            $.ajax({
                url: "{{ url('siswa/modal') }}",
                type: "get",
                data: {
                    modalType: 'create'
                },
                success: function(data){
                    $('.modal-add-siswa').html(data);
                },
                error: function(e){
                    $('.modal-add-siswa').html("<div class='text-danger'>Maaf terjadi kesalahan...</div>");
                }
            })
        })
        $("#add-siswa").fireModal({
            title: 'Tambah Siswa',
            body: $(".modal-add-siswa"),
            autoFocus: false,
            onFormSubmit: function(modal, e, form) {
                // Form Data
                let form_data = $(e.target).serialize();
            
                // DO AJAX HERE
                let fake_ajax = setTimeout(function() {
                    $.ajax({
                    url: "{{ route('siswa.store') }}",
                    type: "post",
                    data: form_data,
                    success: function(data){
                        form.stopProgress();
                        swal({
                            icon: 'success',
                            text: data.message
                        }).then(() => {
                            location.reload()
                        });
                    },
                    error: function(e){
                        form.stopProgress();
                        let errors = e.responseJSON.errors;
                        $.each(errors, function(prefix, val){
                        $('.' + prefix).addClass('is-invalid');
                        $('.messErr_' + prefix).text(val[0]);
                        })
                    }
                    })
            
                    clearInterval(fake_ajax);
                }, 1000);
            
                e.preventDefault();
                },
                shown: function(modal, form) {
                console.log(form)
                },
                buttons: [
                {
                    text: 'Tambahkan',
                    submit: true,
                    class: 'btn btn-primary btn-shadow',
                    handler: function(modal) {
                    }
                }
                ]
            });

        // modal edit pembimbing
        $(".edit-siswa").click(function(){
            let siswa = $(this).data('siswa');
            $.ajax({
                url: "{{ url('siswa/modal') }}",
                type: "get",
                data: {
                    modalType: 'edit',
                    username: siswa
                },
                success: function(data){
                    $('.modal-edit-siswa').html(data);
                },
                error: function(e){
                    $('.modal-edit-siswa').html("<div class='text-danger'>Maaf terjadi kesalahan...</div>");
                }
            })
        })
        $(".edit-siswa").fireModal({
            title: 'Edit siswa',
            body: $(".modal-edit-siswa"),
            autoFocus: false,
            onFormSubmit: function(modal, e, form) {
                // Form Data
                let form_data = $(e.target).serialize();
                let siswa = $(e.target.siswa).val();
            
                // DO AJAX HERE
                let fake_ajax = setTimeout(function() {
                    $.ajax({
                    url: "{{ url('siswa/edit/') }}" + siswa,
                    type: "put",
                    data: form_data,
                    success: function(data){
                        form.stopProgress();
                        swal({
                            icon: 'success',
                            text: data.message
                        }).then(() => {
                            location.reload()
                        });
                    },
                    error: function(e){
                        form.stopProgress();
                        let errors = e.responseJSON.errors;
                        $.each(errors, function(prefix, val){
                        $('.' + prefix).addClass('is-invalid');
                        $('.messErr_' + prefix).text(val[0]);
                        })
                    }
                    })
                    form.stopProgress();
            
                    clearInterval(fake_ajax);
                }, 1000);
            
                e.preventDefault();
                },
                shown: function(modal, form) {
                console.log(form)
                },
                buttons: [
                {
                    text: 'Edit',
                    submit: true,
                    class: 'btn btn-primary btn-shadow',
                    handler: function(modal) {
                    }
                }
                ]
            });

        // Book

        // modal lihat book
        $(".lihat-book").click(function(){
            let book = $(this).data('book');
            $.ajax({
                url: "{{ url('buku/modal') }}",
                type: "get",
                data: {
                    modalType: "lihat",
                    username: book
                },
                success: function(data){
                    $('.modal-lihat-book').html(data);
                },
                error: function(e){
                    $('.modal-lihat-book').html("<div class='text-danger'>Maaf terjadi kesalahan...</div>");
                }
            })
        })
        $(".lihat-book").fireModal({title: "Rincian Buku", body: $('.modal-lihat-book')});
        
        // modal lihat kegiatan
        $(".lihat-kegiatan").click(function(){
            let kegiatan = $(this).data('kegiatan');
            $.ajax({
                url: "{{ url('kegiatan/modal') }}",
                type: "get",
                data: {
                    modalType: "lihat",
                    username: kegiatan
                },
                success: function(data){
                    $('.modal-lihat-kegiatan').html(data);
                },
                error: function(e){
                    $('.modal-lihat-kegiatan').html("<div class='text-danger'>Maaf terjadi kesalahan...</div>");
                }
            })
        })
        $(".lihat-kegiatan").fireModal({title: "Photo Kegiatan", body: $('.modal-lihat-kegiatan')});
        
        // modal edit kegiatan
        $(".edit-kegiatan").click(function(){
            let kegiatan = $(this).data('kegiatan');
            $.ajax({
                url: "{{ url('kegiatan/modal') }}",
                type: "get",
                data: {
                    modalType: "edit",
                    username: kegiatan
                },
                success: function(data){
                    $('.modal-edit-kegiatan').html(data);
                },
                error: function(e){
                    $('.modal-edit-kegiatan').html("<div class='text-danger'>Maaf terjadi kesalahan...</div>");
                }
            })
        })
        $(".edit-kegiatan").fireModal({title: "Edit Photo Kegiatan", body: $('.modal-edit-kegiatan')});
        
        // modal edit book
        $(".edit-book").click(function(){
            let book = $(this).data('book');
            $.ajax({
                url: "{{ url('buku/modal') }}",
                type: "get",
                data: {
                    modalType: "edit",
                    username: book
                },
                success: function(data){
                    $('.modal-edit-buku').html(data);
                },
                error: function(e){
                    $('.modal-edit-buku').html("<div class='text-danger'>Maaf terjadi kesalahan...</div>");
                }
            })
        })
        $(".edit-book").fireModal({title: "Edit Rincian Buku", body: $('.modal-edit-buku')});
        
        // modal edit video
        $(".edit-video").click(function(){
            let video = $(this).data('video');
            $.ajax({
                url: "{{ url('video/modal') }}",
                type: "get",
                data: {
                    username: video
                },
                success: function(data){
                    $('.modal-edit-video').html(data);
                },
                error: function(e){
                    $('.modal-edit-video').html("<div class='text-danger'>Maaf terjadi kesalahan...</div>");
                }
            })
        })
        $(".edit-video").fireModal({title: "Edit Rincian video", body: $('.modal-edit-video')});

        // Upload Buku
        $(".upload-buku").fireModal({title: "Upload Ringkasan Bukti", body: $('.modal-upload-buku')});
        
        // Upload Kegiatan
        $("#upload-kegiatan").fireModal({title: "Upload Photo Kegiatan", body: $('.modal-upload-kegiatan')});

        // Upload Video
        $(".upload-video").fireModal({title: "Upload Bukti Pembelajaran", body: $('.modal-upload-video')});

        // Edit profile
        $(".edit-profile").fireModal({title: "Edit Profile", body: $('.modal-edit-profile')});

        // Change name of photo
        $('.photo').on('change', function(){
            $('.label-photo').text($(this).val());
        })

        // Confirm delete pembimbing
        $('.not-link').click(function(e){
            e.preventDefault();
        });
        $(document).on('click', '.confirm-delete', function(){
            swal({
                title: 'Hapus?',
                text: 'Semua yang berkaitan dengan data ini akan hilang...',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).prev().trigger('click');
                }
            });
        })

        // Message
        if($('.message').data('message') != null){
            swal({
                icon: 'success',
                text: $('.message').data('message')
            });
        }
    } );
</script>
</body>
</html>
