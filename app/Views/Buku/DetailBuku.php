<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>
<?php //dd($buku) 
?>
<div class="container">
    <div class="row">
        <div class="col">

            <h2 class="mt-2">Detail Buku</h2>

            <div class="card mb-3" style="max-width: 750px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/buku/<?= $buku[0]['buku_gambar']; ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $buku[0]['buku_judul']; ?></h5>
                            <p class="card-text"> <b>Penulis</b> : <?= $buku[0]['buku_penulis']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Perbit</b>: <?= $buku[0]['buku_penerbit']; ?></small></p>
                            <p class="card-text"><small class="text-muted"><b>Kategori</b>: <?= $buku[0]['kategori_nama']; ?></small></p>
                            <p class="card-text"><small class="text-muted"><b>ISBN</b>: <?= $buku[0]['buku_isbn']; ?></small></p>
                            <p class="card-text"><small class="text-muted"><b>Stok</b>: <?= $buku[0]['buku_stok']; ?></small></p>
                            <p class="card-text"><small class="text-muted"><b>Halaman</b>: <?= $buku[0]['buku_halaman']; ?></small></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <p class="card-text"> <b>Sinopsis</b> : </p>
                            <p><?= $buku[0]['buku_sinopsis']; ?></p>
                            <div style="text-align: center;">
                                <a href="/buku/ubah/<?= $buku[0]['buku_slug']; ?>" class="btn btn-warning">Edit</a>

                                <form action="/buku/<?= $buku[0]['buku_id']; ?>" method="POST" class="d-inline">
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
</div>

<?= $this->endSection('content'); ?>