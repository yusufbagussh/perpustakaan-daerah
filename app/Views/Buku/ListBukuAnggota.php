<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- ------------------------------------------------------------ -->
<div class=" container">
    <center>
        <h2>Daftar Buku</h2>

        <div class="album p-3 bg-light rounded px-10">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-2">
                <?php foreach ($buku as $b) : ?>
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <!-- <img src="./uploads/cover/<?php echo $b['buku_gambar'] ?>" class="card-img-top p-0" alt="..." width="auto"></img> -->
                            <img src="/img/buku/<?= $b['buku_gambar']; ?>" class="card-img-top p-0" alt="..." width="auto" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" style="">
                            <div class="card-body w-100" height="225">
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em" style="padding-top: 10px;">
                                    <h6 class=""><?php echo $b['buku_judul'] ?></h6>
                                </text>
                                <span class="badge bg-light text-dark"><?php echo $b['buku_penulis'] ?></span>
                                <br>
                                <span class="badge bg-warning text-dark"><?php echo $b['kategori_nama'] ?></span>
                            </div>
                            <div class="card-footer">
                                <a href="/buku/detailbukuanggota/<?= $b['buku_slug']; ?>" class="btn btn-success">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <br>
            <a href="/" class="btn btn-primary">Home</a>
        </div>
</div>

<?= $this->endSection('content'); ?>