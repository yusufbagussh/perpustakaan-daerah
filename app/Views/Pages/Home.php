<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php
            if (in_groups('member')) {
            ?>
                <h1>Selamat Datang di E-Library, Anda Login sebagai Member</h1>
            <?php
            } else if (in_groups('member')) {
            ?>
                <h1>Selamat Datang di E-Library, Anda Login sebagai Admin</h1>
            <?php
            } else {
            ?>
                <h1>Selamat Datang di E-Library</h1>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>