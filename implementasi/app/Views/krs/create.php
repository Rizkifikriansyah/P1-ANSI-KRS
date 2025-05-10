<?= $this->Extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Mata Kuliah</h2>
            <?= $validation->listErrors(); ?>
            <form action="/krs/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="mata_kuliah" class="col-sm-2 col-form-label">Mata Kuliah</label>
                    <div class="col-sm-10">
                        <input type="text" 
                        class="form-control <?= ($validation->hasError('mata_kuliah')) ? 'is-invalid' : ''; ?>" 
                               id="mata_kuliah" 
                               name="mata_kuliah" 
                               value="<?= old('mata_kuliah'); ?>" 
                               autofocus>
                        <div class="invalid-feedback">
                        <?= $validation->getError('mata_kuliah'); ?>

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= old('kelas'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="dosen" class="col-sm-2 col-form-label">Dosen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="dosen" name="dosen" value="<?= old('dosen'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="hari" class="col-sm-2 col-form-label">Hari</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hari" name="hari" value="<?= old('hari'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sks" class="col-sm-2 col-form-label">Sks</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sks" name="sks" value="<?= old('sks'); ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
