<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1><?= $judul; ?></h1>
            <form class="mt-3" method="POST" enctype="multipart/form-data" action="/kategori/ubahkategori/<?= $kategori['id_kategori']; ?>">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="id_kategori" class="col-sm-2 col-form-label">ID Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('id_kategori')) ? 'is-invalid' : ''; ?>" id="id_kategori" name="id_kategori" autofocus value="<?= (old('id_kategori')) ? old('id_kategori') : $kategori['id_kategori']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kategori'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= (old('nama_kategori')) ? old('nama_kategori') : $kategori['nama_kategori']; ?>">
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