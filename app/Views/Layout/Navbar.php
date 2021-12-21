<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">E-Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="<?= base_url('/') ?>">Home</a>
                <a class="nav-link" href="/pages/about">About</a>
                <a class="nav-link" href="<?= base_url('/pages/contact') ?>">Contact</a>
                <a class="nav-link" href="<?= base_url('/buku/index') ?>">Book</a>
                <a class="nav-link" href="<?= base_url('/kategori/index') ?>">Kategori</a>
                <a class="nav-link" href="<?= base_url('/anggota/index') ?>">Anggota</a>
                <a class="nav-link" href="<?= base_url('/admin/index') ?>">Admin</a>
            </div>
            <?php if (logged_in()) : ?>
                <a class="nav-link" href="/logout">Logout</a>
                <!-- <span class="navbar-text" style="text-align: right;">
                    <?= user()->username; ?>
                </span> -->
            <?php else : ?>
                <a class="nav-link" href="/login">Login</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="navbar-header">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (logged_in()) : ?>
                    <li><a class="nav-link active" href="<?= base_url('/') ?>">Selamat datang, <?= user()->username; ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

</nav>