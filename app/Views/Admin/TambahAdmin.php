<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1><?= $judul; ?></h1>
            <form class="mt-3" method="POST" action="/admin/simpanadmin" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="admin_nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('admin_nama')) ? 'is-invalid' : ''; ?>" id="admin_nama" name="admin_nama" autofocus value="<?= old('admin_nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('admin_nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="users_id" class="col-sm-2 col-form-label">User ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="users_id" name="users_id" value="<?= user()->id; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="admin_foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-tumbnail img-preview" width="100">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('admin_foto')) ? 'is-invalid' : ''; ?>" id="gambar" name="admin_foto" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('admin_foto'); ?>
                            </div>
                            <label class="custom-file-label" for="admin_foto">Pilih Gambar..</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Admin</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    function previewImg() {
        const admin_foto = document.querySelector('#gambar');
        const gambarLabel = document.querySelector('.custom-file-label')
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = admin_foto.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(admin_foto.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection('content'); ?>