<?php
$id = $_GET['id'];
$q_gaji = mysqli_query($koneksi, "
  SELECT g.*, k.nama, k.id_jabatan, k.id_rating, j.gaji_pokok, j.tunjangan, r.presentase_bonus
  FROM gaji g
  JOIN karyawan k ON g.id_karyawan = k.id
  JOIN jabatan j ON k.id_jabatan = j.id
  JOIN rating r ON k.id_rating = r.id
  WHERE g.id = '$id' ");

$data = mysqli_fetch_assoc($q_gaji);

// Ambil tarif lembur yang tersedia
$q_lembur = mysqli_query($koneksi, "SELECT * FROM lembur");
?>

<h2>Edit Gaji Karyawan</h2>

<form action="pages/gaji/proses_edit.php" method="POST">
  <input type="hidden" name="id" value="<?= $data['id'] ?>">
  <input type="hidden" name="id_karyawan" value="<?= $data['id_karyawan'] ?>">

  <div class="mb-3">
    <label>Nama Karyawan</label>
    <input type="text" class="form-control" value="<?= $data['nama'] ?>" readonly>
  </div>

  <div class="mb-3">
    <label>Periode</label>
    <input type="date" name="periode" class="form-control" value="<?= date('Y-m-d', strtotime($data['periode'])) ?>" required>
  </div>

  <div class="mb-3">
    <label>Tarif Lembur</label>
    <select name="id_lembur" class="form-control" required>
      <?php while ($l = mysqli_fetch_assoc($q_lembur)) : ?>
        <option value="<?= $l['id'] ?>" <?= $l['id'] == $data['id_lembur'] ? 'selected' : '' ?>>
          Rp<?= number_format($l['tarif']) ?>/jam
        </option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="mb-3">
    <label>Lama Lembur (jam)</label>
    <input type="number" name="lama_lembur" class="form-control" value="<?= $data['lama_lembur'] ?>" required>
  </div>

  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  <a href="index.php?page=gaji" class="btn btn-secondary">Batal</a>
</form>
