<?php
$id = $_GET['id'];

// Ambil data jabatan
$q_jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE id = '$id'");
$data_jabatan = mysqli_fetch_assoc($q_jabatan);

// Ambil daftar karyawan dengan jabatan ini
$q_karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_jabatan = '$id'");
?>

<h2>Detail Jabatan: <?= htmlspecialchars($data_jabatan['nama']) ?></h2>
<hr>
<p><strong>Gaji Pokok:</strong> Rp<?= number_format($data_jabatan['gaji_pokok']) ?></p>
<p><strong>Tunjangan:</strong> Rp<?= number_format($data_jabatan['tunjangan']) ?></p>
<hr>
<h4 class="mt-4">Karyawan dengan Jabatan Ini:</h4>

<?php if (mysqli_num_rows($q_karyawan) > 0): ?>
<table class="table table-bordered border-primary">
  <thead>
    <tr class="table-dark">
      <th scope="col">No</th>
      <th scope="col">Nama Karyawan</th>
      <th scope="col">Divisi</th>
      <th scope="col">Tanggal Masuk</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php $no = 1; while ($k = mysqli_fetch_assoc($q_karyawan)): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($k['nama']) ?></td>
      <td><?= htmlspecialchars($k['divisi']) ?></td>
      <td><?= date('d-m-Y', strtotime($k['created_at'])) ?></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<?php else: ?>
<div class="alert alert-warning">Belum ada karyawan dengan jabatan ini.</div>
<?php endif; ?>

<a href="index.php?page=jabatan" class="btn btn-secondary">Kembali</a>
