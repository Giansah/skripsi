$(function () {

    $('.tampilModalTambah').on('click', function () {
        $('#newMenuModalLabel').html('Add New Menu');
        $('.modal-footer button[type=submit]').html('Add');
    });


    $('.tampilModalUbah').on('click', function () {

        $('#newMenuModalLabel').html('Edit Menu');
        $('.modal-footer button[type=submit]').html('Edit');

        const id = $(this).data('id');

        $.ajax({

            url: 'http://localhost/phpmvc/public/menu/editmenu',
            data: { id: id },
            method: 'post',
            dataType: 'JSON',
            success: function (data) {
                $('#menu').val(data.menu);
            }

        });

    });





});