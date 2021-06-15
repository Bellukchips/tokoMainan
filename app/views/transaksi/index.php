<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>Transaksi/search" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Transaksi" name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-outline-secondary" type="submit" id="tombolcari">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Transaksi
            </button>
        </div>
    </div>

    <div class="col-lg-6">
        <?php FlashMsg::flash(); ?>
    </div>
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col">ID Customer</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Kuantitas</th>
                <th scope="col">Total</th>
                <th scope="col">Tanggal Pembelian</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($data['transaksi'] as $cs) :
            ?>

                <tr>

                    <th scope="row"><?= $cs['id_cs']; ?></th>
                    <td><?= $cs['name_cs']; ?></td>
                    <td><?= $cs['name_prdk']; ?></td>
                    <td><?= $cs['qty']; ?></td>
                    <td><?= $cs['total']; ?></td>
                    <td><?= $cs['ord_date']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>Transaksi/update/<?= $cs['id_order']; ?>" class="badge bg-warning float-start m-lg-1 tampilModalUpdate" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $cs['id_order'] ?>" style="text-decoration: none;">Ubah</a>
                        <a href="<?= BASEURL; ?>Transaksi/delete/<?= $cs['id_order']; ?>" class="badge bg-danger float-start m-lg-1" style="text-decoration: none;" onclick="return confirm('Ingin dihapus ?');">Hapus</a>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Transaksi Pembelian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>Transaksi/insert" method="post" name="transaksiForm">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID Order</label>
                        <input type="number" class="form-control" id="id_order" name="id_order" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="id_cs" class="form-label">ID Customer</label>
                        <select id="id_cs" name="id_cs" class="form-select">
                            <?php
                            foreach ($data['cs'] as $cs) :
                            ?>
                                <option value="<?= $cs['id']; ?>"><?= $cs['name']; ?> -> <?= $cs['id']; ?></option>
                            <?php

                            endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="produk_id" class="form-label">Produk</label></label>
                        <select class="form-select" id="produk_id" name="produk_id" aria-label="Default select example">
                            <?php
                            foreach ($data['produk'] as $produk) :
                            ?>
                                <option value="<?= $produk['id']; ?>"><?= $produk['prod_name']; ?> -> <?= $produk['id']; ?></option>
                            <?php

                            endforeach ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="price" name="price" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="qty" class="form-label">Kuantitas</label>
                        <input type="number" class="form-control" id="qty" name="qty" required>
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" class="form-control" id="total" name="total" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="order_date" class="form-label">Tanggal Order</label>
                        <input type="date" class="form-control" id="order_date" name="order_date" value="<?= date("Y-m-d") ?>" required>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= BASEURL; ?>js/transaction.js"></script>