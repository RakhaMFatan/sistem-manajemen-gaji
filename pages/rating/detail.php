<?php
$id = $_GET['id'];

// Ambil data rating
$q_rating = mysqli_query($koneksi, "SELECT * FROM rating WHERE id = '$id'");
$data_rating = mysqli_fetch_assoc($q_rating);

// Ambil daftar karyawan dengan rating ini
$q_karyawan = mysqli_query($koneksi, "
  SELECT k.nama, r.rating, r.presentase_bonus
  FROM karyawan k
  LEFT JOIN rating r ON k.id_rating = r.id
  WHERE k.id_rating = '$id'
");

?>

<h2>Detail Rating: <?= htmlspecialchars($data_rating['rating']) ?></h2>
<p><strong>Presentasi Bonus:</strong> <?= number_format($data_rating['presentase_bonus']) ?>%</p>
<hr>

<h4 class="mt-4">Karyawan dengan Rating Ini:</h4>

<?php if (mysqli_num_rows($q_karyawan) > 0): ?>
<table class="table table-bordered">
  <thead>
  <tr>
    <th>No</th>
    <th>Nama Karyawan</th>
    <th>Rating</th>
    <th>Presentase Bonus</th>
  </tr>
</thead>
<tbody>
  <?php $no = 1; while ($k = mysqli_fetch_assoc($q_karyawan)): ?>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($k['nama']) ?></td>
    <td><?= htmlspecialchars($k['rating']) ?></td>
    <td><?= htmlspecialchars($k['presentase_bonus']) ?>%</td>
  </tr>
  <?php endwhile; ?>
</tbody>
</table>
<?php else: ?>
<div class="alert alert-warning">Belum ada karyawan dengan rating ini.</div>
<?php endif; ?>

<a href="index.php?page=rating" class="btn btn-secondary">Kembali</a>
