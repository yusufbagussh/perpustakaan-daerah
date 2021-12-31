<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top">E-Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <?php
                if (in_groups('admin') && ('superadmin')) {
                ?>
                    <li class="nav-item"><a class="nav-link" href="#page-top">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Tim</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/buku/index') ?>">Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/kategori/index') ?>">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/anggota/index') ?>">Anggota</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/admin/index') ?>">Admin</a></li>
                <?php
                } else {
                ?>
                    <li class="nav-item"><a class="nav-link" href="#page-top">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Tim</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/buku/listbukuanggota') ?>">Buku</a></li>
                <?php } ?>
                <?php if (logged_in()) : ?>
                    <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                    <!-- <span class="navbar-text" style="text-align: right;">
                    <?= user()->username; ?>
                </span> -->
                <?php else : ?>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                <?php endif; ?>
                <?php if (logged_in()) : ?>
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('/') ?>"><?= user()->username; ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>