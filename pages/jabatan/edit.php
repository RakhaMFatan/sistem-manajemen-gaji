<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE id = '$id'");
$data = mysqli_fetch_array($query);
?>

<h2>Edit Jabatan</h2>

<form action="pages/jabatan/proses_edit.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="mb-3">
        <label>Nama Jabatan</label>
        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" class="form-control" value="<?= $data['gaji_pokok'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Tunjangan</label>
        <input type="number" name="tunjangan" class="form-control" value="<?= $data['tunjangan'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php?page=jabatan" class="btn btn-secondary">Kembali</a>
</form>
