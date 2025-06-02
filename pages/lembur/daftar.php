<?php
$query = mysqli_query($koneksi, "
  SELECT l.*, j.nama AS nama_jabatan 
  FROM lembur l
  LEFT JOIN jabatan j ON l.id_jabatan = j.id
  ORDER BY l.id DESC"
);
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Tarif Lembur</h2>
        <a href="index.php?page=lembur&aksi=tambah" class="btn btn-primary">+ Tambah Tarif</a>
</div>

<table class="table table-striped">
  <thead>
    <tr class="table-dark">
      <th>No</th>
      <th>Tarif (Rp)</th>
      <th>Jabatan Terkait</th>
      <th class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($query)) : ?>
      <tr>
        <td><?= $no++ ?></td>
        <td>Rp<?= number_format($row['tarif']) ?> / jam</td>
        <td><?= htmlspecialchars($row['nama_jabatan']) ?></td>
        <td class="text-center">
          <a href="index.php?page=lembur&aksi=detail&id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
          <a href="index.php?page=lembur&aksi=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="pages/lembur/hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>

        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
