<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>Supplier/search" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Supplier" name="keyword" id="keyword" autocomplete="off">
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
                <th scope="col">Supplier</th>
                <th scope="col">Asal Kota</th>
                <th scope="col">Negara</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($data['supplier'] as $supplier) :
            ?>

                <tr>
                    <th scope="row"><?= $supplier['id']; ?></th>
                    <td><?= $supplier['companyName']; ?></td>
                    <td><?= $supplier['city']; ?></td>
                    <td><?= $supplier['country']; ?></td>
                    <td><?= $supplier['phone']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>Supplier/update/<?= $supplier['id']; ?>" class="badge bg-warning float-start m-lg-1 tampilModalUpdate" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $supplier['id'] ?>" style="text-decoration: none;">Ubah</a>
                        <a href="<?= BASEURL; ?>Supplier/delete/<?= $supplier['id']; ?>" class="badge bg-danger float-start m-lg-1" style="text-decoration: none;" onclick="return confirm('Ingin dihapus ?');">Hapus</a>

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
                <form action="<?= BASEURL; ?>Supplier/insert" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="number" class="form-control" id="id_sp" name="id_sp">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="name_sp" name="name_sp">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Asal Kota</label>
                        <input type="text" class="form-control" id="asal_sp" name="asal_sp">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Negara</label>
                        <input type="text" class="form-control" id="negara_sp" name="negara_sp">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">No Telepon</label>
                        <input type="number" class="form-control" id="tlp_sp" name="tlp_sp">
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

<script src="<?= BASEURL; ?>js/supplier.js"></script>
