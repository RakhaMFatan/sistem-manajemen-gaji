<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

// Ambil daftar jabatan dan rating
$jabatanResult = mysqli_query($koneksi, "SELECT id, nama FROM jabatan");
$ratingResult = mysqli_query($koneksi, "SELECT id, rating FROM rating");
?>

<h2>Edit Karyawan</h2>

<form action="pages/karyawan/proses_edit.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $data['id'] ?>">

  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
  </div>

  <div class="mb-3">
    <label>Divisi</label>
    <input type="text" name="divisi" class="form-control" value="<?= htmlspecialchars($data['divisi']) ?>" required>
  </div>

  <div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control" required><?= htmlspecialchars($data['alamat']) ?></textarea>
  </div>

  <div class="mb-3">
    <label>Umur</label>
    <input type="text" name="umur" class="form-control" value="<?= htmlspecialchars($data['umur']) ?>" required>
  </div>

  <div class="mb-3">
    <label>Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control" required>
      <option value="">- Pilih -</option>
      <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
      <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
    </select>
  </div>

  <div class="mb-3">
    <label>Jabatan</label>
    <select name="id_jabatan" class="form-control" required>
      <option value="">- Pilih Jabatan -</option>
      <?php while ($j = mysqli_fetch_assoc($jabatanResult)) : ?>
        <option value="<?= $j['id'] ?>" <?= $j['id'] == $data['id_jabatan'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($j['nama']) ?>
        </option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="mb-3">
    <label>Rating</label>
    <select name="id_rating" class="form-control" required>
      <option value="">- Pilih Rating -</option>
      <?php while ($r = mysqli_fetch_assoc($ratingResult)) : ?>
        <option value="<?= $r['id'] ?>" <?= $r['id'] == $data['id_rating'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($r['rating']) ?>
        </option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="mb-3">
    <label>Status</label>
    <input type="text" name="status" class="form-control" value="<?= htmlspecialchars($data['status']) ?>" required>
  </div>

  <div class="mb-3">
    <label>Foto (kosongkan jika tidak diubah)</label>
    <input type="file" name="foto" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  <a href="index.php?page=karyawan" class="btn btn-secondary">Batal</a>
</form>
