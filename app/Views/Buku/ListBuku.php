<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Daftar Buku</h1>
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Keyword" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/buku/tambah" class="btn btn-primary mb-3">Tambah Data Buku</a>

            <?php if (session()->getFlashdata('tambah')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('tambah'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('hapus')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('hapus'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (3 * ($currentPage - 1)); ?>
                    <?php foreach ($buku as $b) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/buku/<?= $b['buku_gambar']; ?>" alt="" class="sampul" style="width: 100px;"></td>
                            <td><?= $b['buku_judul']; ?></td>
                            <td><?= $b['buku_penulis']; ?></td>
                            <td><?= $b['kategori_nama']; ?></td>
                            <td><a href="/buku/<?= $b['buku_slug']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>