<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1><?= $judul; ?></h1>
            <form class="mt-3" method="POST" enctype="multipart/form-data" action="/buku/update/<?= $buku['buku_id']; ?>">
                <?= csrf_field(); ?>
                <input type="hidden" name="buku_slug" value="<?= $buku['buku_slug']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $buku['buku_gambar']; ?>">
                <div class="form-group row">
                    <label for="buku_judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('buku_judul')) ? 'is-invalid' : ''; ?>" id="buku_judul" name="buku_judul" autofocus value="<?= (old('buku_judul')) ? old('buku_judul') : $buku['buku_judul']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('buku_judul'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="buku_penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="buku_penulis" name="buku_penulis" value="<?= (old('buku_penulis')) ? old('buku_penulis') : $buku['buku_penulis']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="buku_penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="buku_penerbit" name="buku_penerbit" value="<?= (old('buku_penerbit')) ? old('buku_penerbit') : $buku['buku_penerbit']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="buku_isbn" class="col-sm-2 col-form-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="buku_isbn" name="buku_isbn" value="<?= (old('buku_isbn')) ? old('buku_isbn') : $buku['buku_isbn']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="buku_stok" class="col-sm-2 col-form-label">Stok Buku</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="buku_stok" name="buku_stok" value="<?= (old('buku_stok')) ? old('buku_stok') : $buku['buku_stok']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="buku_halaman" class="col-sm-2 col-form-label">Halaman</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="buku_halaman" name="buku_halaman" value="<?= (old('buku_halaman')) ? old('buku_halaman') : $buku['buku_halaman']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="buku_kategori" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="buku_kategori">
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['kategori_id']; ?>"><?= $k['kategori_nama']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="buku_sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
                    <div class="col-sm-10">
                        <textarea name="buku_sinopsis" id="buku_sinopsis" class="form-control" cols="30" rows="10"><?= (old('buku_sinopsis')) ? old('buku_sinopsis') : $buku['buku_sinopsis']; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="buku_gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/buku/<?= $buku['buku_gambar']; ?>" class="img-tumbnail img-preview" width="100">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('buku_gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="buku_gambar" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('buku_gambar'); ?>
                            </div>
                            <label class="custom-file-label" for="buku_gambar"><?= $buku['buku_gambar']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Buku</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
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
<?= $this->endSection('content'); ?>