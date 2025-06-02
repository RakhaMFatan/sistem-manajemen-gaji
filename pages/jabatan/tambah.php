<h2>Tambah Jabatan</h2>

<form action="pages/jabatan/proses_tambah.php" method="POST">
    <div class="mb-3">
        <label>Nama Jabatan</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tunjangan</label>
        <input type="number" name="tunjangan" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php?page=jabatan" class="btn btn-secondary">Kembali</a>
</form>
