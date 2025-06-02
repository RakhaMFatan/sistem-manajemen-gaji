<?php
$id = $_GET['id'];

// Ambil data lembur
$qLembur = mysqli_query($koneksi, "
  SELECT * FROM lembur WHERE id = '$id'
");
$data = mysqli_fetch_assoc($qLembur);

// Ambil semua jabatan untuk dropdown
$qJabatan = mysqli_query($koneksi, "SELECT id, nama FROM jabatan");
?>

<h2>Edit Tarif Lembur</h2>

<form action="pages/lembur/proses_edit.php" method="POST">
  <input type="hidden" name="id" value="<?= $data['id'] ?>">

  <div class="mb-3">
    <label>Tarif Per Jam (Rp)</label>
    <input type="number" name="tarif" class="form-control" value="<?= $data['tarif'] ?>" required>
  </div>

  <div class="mb-3">
    <label>Jabatan Terkait</label>
    <select name="id_jabatan" class="form-control" required>
      <option value="">- Pilih Jabatan -</option>
      <?php while ($jabatan = mysqli_fetch_assoc($qJabatan)) : ?>
        <option value="<?= $jabatan['id'] ?>" <?= $jabatan['id'] == $data['id_jabatan'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($jabatan['nama']) ?>
        </option>
      <?php endwhile; ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  <a href="index.php?page=lembur" class="btn btn-secondary">Batal</a>
</form>
