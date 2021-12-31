<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- ------------------------------------------------------------ -->
<div class=" container mt-5">
    <center>
        <h2>Daftar Buku</h2>
        <div class="container">
            <!-- <div class="row">
                <div class="col-6 mb-4">
                    <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Search for card name...">
                </div>
            </div> -->
            <div class="col-6">
                <div class="input-group mb-3">
                    <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Masukkan Keyword">
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-2" id="myProducts">
                <?php foreach ($buku as $b) : ?>
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <!-- <img src="./uploads/cover/<?php echo $b['buku_gambar'] ?>" class="card-img-top p-0" alt="..." width="auto"></img> -->
                            <img src="/img/buku/<?= $b['buku_gambar']; ?>" class="card-img-top p-0" alt="..." width="auto" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" style="">
                            <div class="card-body w-100" height="225">
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em" style="padding-top: 10px;">
                                    <div class=" card-title"><?php echo $b['buku_judul'] ?></div>
                                </text>
                                <span class="badge bg-light text-dark"><?php echo $b['buku_penulis'] ?></span>
                                <br>
                                <span class="badge bg-info text-dark"><?php echo $b['kategori_nama'] ?></span>
                            </div>
                            <div class="card-footer">
                                <a href="/buku/detailbukuanggota/<?= $b['buku_slug']; ?>" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </center>
</div>

<script>
    function myFunction() {
        var input, filter, cards, cardContainer, title, i;
        input = document.getElementById("myFilter");
        filter = input.value.toUpperCase();
        cardContainer = document.getElementById("myProducts");
        cards = cardContainer.getElementsByClassName("col");
        for (i = 0; i < cards.length; i++) {
            title = cards[i].querySelector(".card-title");
            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
</script>
<?= $this->endSection('content'); ?>
<div class="album p-3 bg-light rounded px-10">
    <div class="col-6">
        <div class="input-group mb-3">
            <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Masukkan Keyword" name="keyword">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-2" id="myProducts">

        <?php foreach ($buku as $b) : ?>
            <div class="col" id="card">
                <div class="card shadow-sm h-100">
                    <!-- <img src="./uploads/cover/<?php echo $b['buku_gambar'] ?>" class="card-img-top p-0" alt="..." width="auto"></img> -->
                    <img src="/img/buku/<?= $b['buku_gambar']; ?>" class="card-img-top p-0" alt="..." width="auto" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" style="">
                    <div class="card-body w-100" height="225">
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em" style="padding-top: 10px;">
                            <h6 id="card-title"><?php echo $b['buku_judul'] ?></h6>
                        </text>
                        <span class="badge bg-light text-dark"><?php echo $b['buku_penulis'] ?></span>
                        <br>
                        <span class="badge bg-info text-dark"><?php echo $b['kategori_nama'] ?></span>
                    </div>
                    <div class="card-footer">
                        <a href="/buku/detailbukuanggota/<?= $b['buku_slug']; ?>" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
</div>