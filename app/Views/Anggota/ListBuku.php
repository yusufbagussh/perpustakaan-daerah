<?= $this->extend('/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
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
                                <!-- Modal Button -->
                                <button href="#" data-toggle="modal" data-target="#myModal<?php echo $b['buku_id']; ?>" class="btn btn-primary rounded-pill">Detail</button>
                                <!-- <a href="./detailBuku.php?buku_id=<?php echo $b['buku_id'] ?>" class="btn btn-primary rounded-pill px-3">Detail</a> -->
                                <?php if ($b['buku_stok'] < 1) { ?>
                                    <a type="button" class="btn btn-danger rounded-pill">Buku Habis</a>
                                <?php } else { ?>
                                    <a class="btn btn-success rounded-pill" href="pinjamBuku.php?buku_id=<?php echo $b["buku_id"] . "&buku_stok=" . $b['buku_stok'] ?>">Pinjam</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</div>

<?= $this->endSection('content'); ?>