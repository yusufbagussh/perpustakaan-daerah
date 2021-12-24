<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <h2 class="mt-2">Detail Anggota Perpustakaan</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4 p-2">
                        <img src="/img/profile/<?= $anggota['anggota_foto']; ?>" class="card-img" width="100px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $anggota['anggota_nama']; ?></h5>
                            <p class="card-text"><small class="text-muted"><b>Jenis Kelamin</b>: <?= $anggota['anggota_jenis_kelamin']; ?></small></p>
                            <p class="card-text"><small class="text-muted"><b>Tempat Lahir</b>: <?= $anggota['anggota_tempat_lahir']; ?></small></p>
                            <p class="card-text"><small class="text-muted"><b>Tanggal Lahir</b>: <?= $anggota['anggota_tanggal_lahir']; ?></small></p>
                            <p class="card-text"><small class="text-muted"><b>Alamat</b>: <?= $anggota['anggota_alamat']; ?></small></p>
                            <p class="card-text"><small class="text-muted"><b>Nomor Identitas</b>: <?= $anggota['anggota_nomor_identitas']; ?></small></p>
                            <p class="card-text"><small class="text-muted"><b>Jenis Kartu</b>: <?= $anggota['anggota_jenis_kartu']; ?></small></p>
                            <a href="/anggota/ubahanggota/<?= $anggota['anggota_id']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/anggota/deleteanggota/<?= $anggota['anggota_id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?');">Delete</button>
                            </form>

                            <a href="/anggota/tambahanggota" class="btn btn-primary">Tambah Data Buku</a>
                            <br>
                            <a href="/anggota">Kembali ke halaman awal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>