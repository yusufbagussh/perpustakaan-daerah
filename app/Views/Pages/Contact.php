<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Contact Us</h1>
            <?php foreach ($staff as $s) : ?>
                <ul>
                    <li><?= $s['nama']; ?></li>
                    <li><?= $s['nim']; ?></li>
                    <li><?= $s['instansi']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>