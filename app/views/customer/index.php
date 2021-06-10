<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>Customer/search" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Customer" name="keyword" id="keyword" autocomplete="off">
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
                <th scope="col">Nama</th>
                <th scope="col">Kota</th>
                <th scope="col">Negara</th>
                <th scope="col">No Telp</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($data['customer'] as $cs) :
            ?>

                <tr>
                    <th scope="row"><?= $cs['id']; ?></th>
                    <td><?= $cs['name']; ?></td>
                    <td><?= $cs['city']; ?></td>
                    <td><?= $cs['country']; ?></td>
                    <td><?= $cs['phone']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>Customer/update/<?= $cs['id']; ?>" class="badge bg-warning float-start m-lg-1 tampilModalUpdate" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $cs['id'] ?>" style="text-decoration: none;">Ubah</a>
                        <a href="<?= BASEURL; ?>Customer/delete/<?= $cs['id']; ?>" class="badge bg-danger float-start m-lg-1" style="text-decoration: none;" onclick="return confirm('Ingin dihapus ?');">Hapus</a>

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
                <form action="<?= BASEURL; ?>Customer/insert" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="number" class="form-control" id="id_cs" name="id_cs">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name_cs" name="name_cs">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="city_cs" name="city_cs">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Negara</label>
                        <input type="text" class="form-control" id="country_cs" name="country_cs">
                    </div>
                    <div class="mb-3">
                        <label for="Phone" class="form-label">No Telp</label>
                        <input type="number" class="form-control" id="phone_cs" name="phone_cs">
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

<script src="<?= BASEURL; ?>js/customer.js"></script>