
<?= $this->Extend('layout/template'); ?>

<?= $this->section ('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Mata Kuliah</h1>
            <a href="/krs/create" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Mata Kuliah</th>
      <th scope="col">Kelas</th>
      <th scope="col">Dosen Pengajar</th>
      <th scope="col">Hari</th>
      <th scope="col">Sks</th>
    </tr>
  </thead>
  <?= $i = 1; ?>
  <tbody>
    <?php foreach($krs as $k) : ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><?= $k['mata_kuliah']; ?></td>
      <td><?= $k['kelas']; ?></td>
      <td><?= $k['dosen']; ?></td>
      <td><?= $k['hari']; ?></td>
      <td><?= $k['sks']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        </div>
    </div>
</div>

<?= $this->endSection (); ?>