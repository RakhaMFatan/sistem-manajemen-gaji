<?php
$jabatanResult = mysqli_query($koneksi, "SELECT id, nama FROM jabatan");
?>

<h2>Tambah Tarif Lembur</h2>

<form action="pages/lembur/proses_tambah.php" method="POST">
  <div class="mb-3">
    <label>Tarif Per Jam (Rp)</label>
    <input type="number" name="tarif" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Jabatan Terkait (Keterangan)</label>
    <select name="id_jabatan" class="form-control" required>
      <option value="">- Pilih Jabatan -</option>
      <?php while ($row = mysqli_fetch_assoc($jabatanResult)) : ?>
        <option value="<?= $row['id'] ?>">
          <?= htmlspecialchars($row['nama']) ?>
        </option>
      <?php endwhile; ?>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="index.php?page=lembur" class="btn btn-secondary">Kembali</a>
</form>
