<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1><?= $judul; ?></h1>
            <form class="mt-3" method="POST" enctype="multipart/form-data" action="/anggota/updateanggota/<?= $anggota['anggota_id']; ?>">
                <?= csrf_field(); ?>
                <input type="hidden" name="fotoLama" value="<?= $anggota['anggota_foto']; ?>">
                <div class="form-group row">
                    <label for="anggota_nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('anggota_nama')) ? 'is-invalid' : ''; ?>" id="anggota_nama" name="anggota_nama" autofocus value="<?= (old('anggota_nama')) ? old('anggota_nama') : $anggota['anggota_nama']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('anggota_nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10 mt-2">
                        <input type="radio" name="anggota_jenis_kelamin" value="Laki - Laki" <?php if ($anggota['anggota_jenis_kelamin'] == 'Laki - Laki') echo 'checked' ?>> Laki - Laki
                        <input type="radio" name="anggota_jenis_kelamin" value="Perempuan" <?php if ($anggota['anggota_jenis_kelamin'] == 'Perempuan') echo 'checked' ?>> Perempuan
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="anggota_tempat_lahir" name="anggota_tempat_lahir" value="<?= (old('anggota_tempat_lahir')) ? old('anggota_tempat_lahir') : $anggota['anggota_tempat_lahir']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="anggota_tanggal_lahir" name="anggota_tanggal_lahir" value="<?= (old('anggota_tanggal_lahir')) ? old('anggota_tanggal_lahir') : $anggota['anggota_tanggal_lahir']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="anggota_alamat" name="anggota_alamat" value="<?= (old('anggota_alamat')) ? old('anggota_alamat') : $anggota['anggota_alamat']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_jenis_kartu" class="col-sm-2 col-form-label">Jenis Kartu Identitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="anggota_jenis_kartu" name="anggota_jenis_kartu" value="<?= (old('anggota_jenis_kartu')) ? old('anggota_jenis_kartu') : $anggota['anggota_jenis_kartu']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_nomor_identitas" class="col-sm-2 col-form-label">Nomor Identitas</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="anggota_nomor_identitas" name="anggota_nomor_identitas" value="<?= (old('anggota_nomor_identitas')) ? old('anggota_nomor_identitas') : $anggota['anggota_nomor_identitas']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="users_id" class="col-sm-2 col-form-label">ID Users</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="users_id" name="users_id" value="<?= (old('users_id')) ? old('users_id') : $anggota['users_id']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_foto" class="col-sm-2 col-form-label">Foto Anggota</label>
                    <div class="col-sm-2">
                        <img src="/img/profile/<?= $anggota['anggota_foto']; ?>" class="img-tumbnail img-preview" width="100">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('anggota_foto')) ? 'is-invalid' : ''; ?>" id="gambar" name="anggota_foto" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('anggota_foto'); ?>
                            </div>
                            <label class="custom-file-label" for="anggota_foto"><?= $anggota['anggota_foto']; ?></label>
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
        const anggota_foto = document.querySelector('#gambar');
        const gambarLabel = document.querySelector('.custom-file-label')
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = anggota_foto.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(anggota_foto.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection('content'); ?>