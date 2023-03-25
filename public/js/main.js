$(document).ready( function () {
    $('#table-1').DataTable();

    // modal add pembimbing
    $("#add-pembimbing").click(function(){

        $.ajax({
            url: "pembimbing/modal",
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
                url: "register",
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
            url: "pembimbing/modal",
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
                url: "pembimbing/" + pembimbing,
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
            url: "pembimbing/modal",
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
} );