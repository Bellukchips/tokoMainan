<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>Product/search" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Produk" name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-outline-secondary" type="submit" id="tombolcari">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data
            </button>
        </div>
    </div>

    <div class="col-lg-6">
        <?php FlashMsg::flash(); ?>
    </div>
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Supplier</th>
                <th scope="col">Harga (/unit)</th>
                <th scope="col">Jumlah Paket</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($data['produk'] as $produk) :
            ?>

                <tr>
                    <th scope="row"><?= $produk['id']; ?></th>
                    <td><?= $produk['prod_name']; ?></td>
                    <td><?= $produk['companyName']; ?></td>
                    <td><?= $produk['unit_price']; ?></td>
                    <td><?= $produk['package']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>Product/update/<?= $produk['id']; ?>" class="badge bg-warning float-start m-lg-1 tampilModalUpdate" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $produk['id'] ?>" style="text-decoration: none;">Ubah</a>
                        <a href="<?= BASEURL; ?>Product/delete/<?= $produk['id']; ?>" class="badge bg-danger float-start m-lg-1" style="text-decoration: none;" onclick="return confirm('Ingin dihapus ?');">Hapus</a>

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
                <h5 class="modal-title" id="judulModal">Insert Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>Product/insert" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="number" class="form-control" id="id_prdk" name="id_prdk">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="name_prdk" name="name_prdk">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Harga (/unit)</label>
                        <input type="number" class="form-control" id="price_prdk" name="price_prdk">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Jumlah Paket</label>
                        <input type="number" class="form-control" id="package_prdk" name="package_prdk">
                    </div>
                    <div class="mb-3">
                        <label for="Phone" class="form-label">Supplier</label></label>
                        <select class="form-select" aria-label="Default select example">
                            <?php
                            foreach ($data['supplier'] as $supplier) :
                            ?>
                                <option value="<?= $supplier['id']; ?>"><?= $supplier['companyName']; ?> -> <?= $supplier['id']; ?></option>

                            <?php endforeach ?>
                        </select>
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

<script src="<?= BASEURL; ?>js/product.js"></script>