$(function() {

    $('.tambahData').click(function() {
        $('#judulModal').html('Tambah Data Customer');
        $('#id_cs').removeAttr('readonly');
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });
    $('.tampilModalUpdate').click(function() {
        $('#judulModal').html('Ubah Data Customer');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('#id_cs').attr('readonly', 'readonly');
        $('.modal-body form').attr('action', 'http://localhost/tokoMainan/public/Customer/update');
        const id = $(this).data('id');
        // console.log(id);
        $.ajax({
            url: 'http://localhost/tokoMainan/public/Customer/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#id_cs').val(data.id);
                $('#name_cs').val(data.name);
                $('#city_cs').val(data.city);
                $('#country_cs').val(data.country);
                $('#phone_cs').val(data.phone);
            }
        });

    });
    $("#formModal").on('hidden.bs.modal', function() {
        $('.modal-body form').attr('action', 'http://localhost/tokoMainan/public/Customer/insert');
        $('#id_cs').val('');
        $('#name_cs').val('');
        $('#city_cs').val('');
        $('#country_cs').val('');
        $('#phone_cs').val('');
    });



});