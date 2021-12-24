<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url() ?>/favicon.svg" type="image/gif">
    <title>E-Perpustakaan | Registrasi Ulang</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1><?= $judul; ?> - Lengkapi Data Anda</h1>
                <form class="mt-3" method="POST" action="/anggota/simpananggota" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="anggota_nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="anggota_nama" name="anggota_nama" autofocus value="<?= old('anggota_nama'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('anggota_nama'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="anggota_jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10 mt-2">
                            <input type="radio" name="anggota_jenis_kelamin" value="Laki - Laki"> Laki - Laki
                            <input type="radio" name="anggota_jenis_kelamin" value="Perempuan"> Perempuan
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="anggota_tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="anggota_tempat_lahir" name="anggota_tempat_lahir" value="<?= old('anggota_tempat_lahir'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="anggota_tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="anggota_tanggal_lahir" name="anggota_tanggal_lahir" value="<?= old('anggota_tanggal_lahir'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="anggota_alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="anggota_alamat" name="anggota_alamat" value="<?= old('anggota_alamat'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="anggota_nomor_identitas" class="col-sm-2 col-form-label">Nomor Indentitas</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="anggota_nomor_identitas" name="anggota_nomor_identitas" value="<?= old('anggota_nomor_identitas'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="anggota_jenis_kartu" class="col-sm-2 col-form-label">Jenis Kartu Identitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="anggota_jenis_kartu" name="anggota_jenis_kartu" value="<?= old('anggota_jenis_kartu'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="users_id" class="col-sm-2 col-form-label">User ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="users_id" name="users_id" value="<?= user()->id; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="anggota_foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-2">
                            <img src="/img/default.png" class="img-tumbnail img-preview" width="100">
                        </div>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('anggota_foto')) ? 'is-invalid' : ''; ?>" id="gambar" name="anggota_foto" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('anggota_foto'); ?>
                                </div>
                                <label class="custom-file-label" for="anggota_foto">Pilih Gambar..</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/home/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script>
        function previewImg() {
            const gambar = document.querySelector('#gambar');
            const gambarLabel = document.querySelector('.custom-file-label')
            const imgPreview = document.querySelector('.img-preview');

            gambarLabel.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

</body>

</html>