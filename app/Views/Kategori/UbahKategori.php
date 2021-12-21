<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1><?= $judul; ?></h1>
            <form class="mt-3" method="POST" enctype="multipart/form-data" action="/kategori/ubahkategori/<?= $kategori['kategori_id']; ?>">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="kategori_id" class="col-sm-2 col-form-label">ID Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kategori_id')) ? 'is-invalid' : ''; ?>" id="kategori_id" name="kategori_id" autofocus value="<?= (old('kategori_id')) ? old('kategori_id') : $kategori['kategori_id']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kategori_id'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori_nama" class="col-sm-2 col-form-label">Nama Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" value="<?= (old('kategori_nama')) ? old('kategori_nama') : $kategori['kategori_nama']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Kategori</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>