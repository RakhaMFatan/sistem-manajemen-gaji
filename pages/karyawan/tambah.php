<?php
include 'config/koneksi.php'; // sesuaikan path jika perlu

// Ambil data jabatan dan rating dari database
$jabatanResult = mysqli_query($koneksi, "SELECT id, nama FROM jabatan");
$ratingResult = mysqli_query($koneksi, "SELECT id, rating FROM rating");
?>

<h2>Tambah Karyawan</h2>

<form action="pages/karyawan/proses_tambah.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Divisi</label>
    <input type="text" name="divisi" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control" required></textarea>
  </div>

  <div class="mb-3">
    <label>Umur</label>
    <input type="number" name="umur" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control" required>
      <option value="">- Pilih -</option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
  </div>

  <!-- Jabatan -->
  <div class="mb-3">
    <label>Jabatan</label>
    <select name="id_jabatan" class="form-control" required>
      <option value="">- Pilih Jabatan -</option>
      <?php while ($row = mysqli_fetch_assoc($jabatanResult)) : ?>
        <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nama']) ?></option>
      <?php endwhile; ?>
    </select>
  </div>

  <!-- Rating -->
  <div class="mb-3">
    <label>Rating</label>
    <select name="id_rating" class="form-control" required>
      <option value="">- Pilih Rating -</option>
      <?php while ($row = mysqli_fetch_assoc($ratingResult)) : ?>
        <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['rating']) ?></option>
      <?php endwhile; ?>
    </select>
  </div>

  <!-- Status langsung dari daftar -->
  <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control" required>
      <option value="">- Pilih Status -</option>
      <option value="Aktif">Aktif</option>
      <option value="Tidak Aktif">Tidak Aktif</option>
    </select>
  </div>

  <div class="mb-3">
    <label>Foto (opsional)</label>
    <input type="file" name="foto" class="form-control">
  </div>

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="index.php?page=karyawan" class="btn btn-secondary">Kembali</a>
</form>
