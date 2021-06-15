$(function() {
    $('.tambahData').click(function() {
        $('#judulModal').html('Tambah Data Customer');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#id_order').val(Math.floor((Math.random() * 20000) + 10000));
        $('#id_order').attr('readonly')
        $('#produk_id').change(function() {

            //ambil value  dari dropdown yang dipilih
            var id = $('#produk_id option:selected').val();
            $.ajax({
                url: 'http://localhost/tokoMainan/public/Transaksi/getId',
                data: { id: id },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    //jika sukses maka tampilkan harganya dalam input text price
                    $('#price').val(data.unit_price)
                }
            });
        })
        $('#qty').change(function() {
            var price = $('#price').val();
            var qty = $('#qty').val();

            var total = price * qty;
            $('#total').val(total)

        })
    })
    $('.tampilModalUpdate').click(function() {
        $('#produk_id').change(function() {

            //ambil value  dari dropdown yang dipilih
            var id = $('#produk_id option:selected').val();
            $.ajax({
                url: 'http://localhost/tokoMainan/public/Transaksi/getId',
                data: { id: id },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    //jika sukses maka tampilkan harganya dalam input text price
                    $('#price').val(data.unit_price)
                }
            });
        })
        $('#qty').change(function() {
            var price = $('#price').val();
            var qty = $('#qty').val();

            var total = price * qty;
            $('#total').val(total)

        })
        $('#judulModal').html('Ubah Data Transaksi');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/tokoMainan/public/Transaksi/update');
        const id = $(this).data('id');
        // console.log(id)

        $.ajax({
            url: 'http://localhost/tokoMainan/public/Transaksi/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#id_order').val(data.id_order)
                $('#id_cs').val(data.id_cs)
                $('#produk_id').val(data.prod_id)
                $('#price').val(data.price)
                    // $('#qty').val(data.qty)
                    // $('#total').val(data.total)
                $('#order_date').val(data.ord_date)

            }
        })
    })
    $("#formModal").on('hidden.bs.modal', function() {
        $('.modal-body form').attr('action', 'http://localhost/tokoMainan/public/Transaksi/insert');
        $('#id_order').val('')
        $('#id_cs').val('')
        $('#produk_id').val('')
        $('#price').val('')
        $('#qty').val('')
        $('#total').val('')
        $('#order_date').val('')

    });

})