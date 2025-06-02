<h2>Hitung Gaji Karyawan</h2>

<form action="pages/gaji/proses_tambah.php" method="POST">
  <div class="mb-3">
    <label>Pilih Karyawan</label>
    <select name="id_karyawan" class="form-control" required>
      <option value="">- Pilih -</option>
      <?php
      $karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan");
      while ($row = mysqli_fetch_array($karyawan)) {
        echo "<option value='{$row['id']}'>{$row['nama']}</option>";
      }
      ?>
    </select>
  </div>

  <div class="mb-3">
    <label>Lama Lembur (jam)</label>
    <input type="number" name="lama_lembur" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Periode Gaji</label>
    <input type="date" name="periode" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-success">Hitung & Simpan</button>
  <a href="index.php?page=gaji" class="btn btn-secondary">Kembali</a>
</form>
