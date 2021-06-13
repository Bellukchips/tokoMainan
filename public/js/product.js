$(function(){
    
    $('.tambahData').click(function() {
        $('#judulModal').html('Tambah Data Produk');
        $('#id_prdk').removeAttr('readonly');
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });
    $('.tampilModalUpdate').click(function() {
        $('#judulModal').html('Ubah Data Produk');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('#id_prdk').attr('readonly', 'readonly');
        $('.modal-body form').attr('action', 'http://localhost/tokoMainan/public/Barang/update');
        const id = $(this).data('id');
        // console.log(id);
        $.ajax({
            url: 'http://localhost/tokoMainan/public/Barang/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#id_prdk').val(data.id);
                $('#name_prdk').val(data.prod_name);
                $('#supplier_prdk').val(data.supplier_id);
                $('#price_prdk').val(data.unit_price);
                $('#package_prdk').val(data.package);
            }
        });

    });
    
    $("#formModal").on('hidden.bs.modal', function() {
        $('.modal-body form').attr('action', 'http://localhost/tokoMainan/public/Product/insert');
        $('#id_prdk').val('');
        $('#name_prdk').val('');
        $('#price_prdk').val('');
        $('#package_prdk').val('');
        $('#supplier_prdk').val('');
    });


})