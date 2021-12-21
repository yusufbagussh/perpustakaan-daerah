<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1><?= $judul; ?></h1>
            <form class="mt-3" method="POST" enctype="multipart/form-data" action="/admin/updateadmin/<?= $admin['admin_id']; ?>">
                <?= csrf_field(); ?>
                <input type="hidden" name="fotoLama" value="<?= $admin['admin_foto']; ?>">
                <div class="form-group row">
                    <label for="admin_nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('admin_nama')) ? 'is-invalid' : ''; ?>" id="admin_nama" name="admin_nama" autofocus value="<?= (old('admin_nama')) ? old('admin_nama') : $admin['admin_nama']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('admin_nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="users_id" class="col-sm-2 col-form-label">ID Users</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="users_id" name="users_id" value="<?= (old('users_id')) ? old('users_id') : $admin['users_id']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="admin_foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/profile/<?= $admin['admin_foto']; ?>" class="img-tumbnail img-preview" width="100">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('admin_foto')) ? 'is-invalid' : ''; ?>" id="gambar" name="admin_foto" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('admin_foto'); ?>
                            </div>
                            <label class="custom-file-label" for="admin_foto"><?= $admin['admin_foto']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Identitas Anggota</button>
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