// ketika document sudah siap
$(function() {

    //Jquery panggil class dengan nama tambahData
    // dan jika di click maka:
    $('.tambahData').click(function() {
        //ubah element dari id judulmodal menjadi Tambah data supplier
        $('#judulModal').html('Tambah Data Supplier');
        //hapus attribut readonly pada id id_sp
        $('#id_sp').removeAttr('readonly');
        // ubah element dari class modal-footer pada bagian button dengan type submit menjadi Tambah data
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });
    //Jquery panggil class dengan nama tampilModalUpdate
    // dan jika di click maka:
    $('.tampilModalUpdate').click(function() {
        //ubah element dari id judulModal menjadi Ubah data supplier
        $('#judulModal').html('Ubah Data Supplier');
        // ubah element dari class modal-footer pada bagian button dengan type submit menjadi Ubah data
        $('.modal-footer button[type=submit]').html('Ubah Data');
        // tambahkan attribut readonly pada id id_sp
        $('#id_sp').attr('readonly', 'readonly');
        //ubah attribut action pada form menjadi url ini
        $('.modal-body form').attr('action', 'http://localhost/tokoMainan/public/Supplier/update');
        const id = $(this).data('id');
        // console.log(id);
        $.ajax({
            url: 'http://localhost/tokoMainan/public/Supplier/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#id_sp').val(data.id);
                $('#name_sp').val(data.companyName);
                $('#asal_sp').val(data.city);
                $('#negara_sp').val(data.country);
                $('#tlp_sp').val(data.phone);
            }
        });

    });
    //jquery panggil id formModal 
    //jika modal tersebut di hidden
    //maka ubah semua value pada text field menjadi kosong
    // dan ubah juga attribut action pada form menjadi url ini
    $("#formModal").on('hidden.bs.modal', function() {
        $('.modal-body form').attr('action', 'http://localhost/tokoMainan/public/Supplier/insert');
        $('#id_sp').val('');
        $('#name_sp').val('');
        $('#asal_sp').val('');
        $('#negara_sp').val('');
        $('#tlp_sp').val('');
    });



});