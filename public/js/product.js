$(function(){
    
    $('.tambahData').click(function() {
        $('#judulModal').html('Tambah Data Customer');
        $('#id_brg').removeAttr('readonly');
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });
    $("#formModal").on('hidden.bs.modal', function() {
        $('.modal-body form').attr('action', 'http://localhost/tokoMainan/public/Product/insert');
        $('#id_brg').val('');
        $('#prod_name_brg').val('');
        $('#supplier_id_brg').val('');
        $('#unit_price_brg').val('');
        $('#package_brg').val('');
    });


})