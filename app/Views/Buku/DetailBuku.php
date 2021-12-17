<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <h2 class="mt-2">Detail Buku</h2>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $buku['gambar']; ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $buku['judul']; ?></h5>
                            <p class="card-text"> <b>Penulis</b> : <?= $buku['penulis']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Perbit</b>: <?= $buku['penerbit']; ?></small></p>
                            <p class="card-text"><small class="text-muted"><b>Kategori</b>: <?= $buku['kategori']; ?></small></p>

                            <a href="/buku/ubah/<?= $buku['slug']; ?>" class="btn btn-warning">Edit</a>

                            <a href="/buku/delete/<?= $buku['id_buku']; ?>" class="btn btn-danger">Delete</a>

                            <form action="/buku/<?= $buku['id_buku']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?');">Delete</button>
                            </form>

                            <a href="/buku/tambah" class="btn btn-primary">Tambah Data Buku</a>
                            <br>
                            <a href="/buku">Kembali ke halaman awal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>