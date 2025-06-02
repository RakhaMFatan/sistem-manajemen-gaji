<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "
  SELECT l.*, j.nama AS nama_jabatan 
  FROM lembur l
  LEFT JOIN jabatan j ON l.id_jabatan = j.id
  WHERE l.id = '$id'
");

$data = mysqli_fetch_assoc($query);

// Cek jika data tidak ditemukan
if (!$data) {
  echo "<div class='alert alert-danger'>Data tidak ditemukan.</div>";
  echo "<a href='index.php?page=lembur' class='btn btn-secondary'>Kembali</a>";
  exit;
}
?>

<h2>Detail Tarif Lembur</h2>

<table class="table table-bordered">
  <tr>
    <th>Tarif Per Jam</th>
    <td>Rp<?= number_format($data['tarif']) ?></td>
  </tr>
  <tr>
    <th>Jabatan Terkait</th>
    <td><?= htmlspecialchars($data['nama_jabatan']) ?></td>
  </tr>
  <tr>
    <th>ID Jabatan</th>
    <td><?= $data['id_jabatan'] ?></td>
  </tr>
</table>

<a href="index.php?page=lembur" class="btn btn-secondary">Kembali</a>
