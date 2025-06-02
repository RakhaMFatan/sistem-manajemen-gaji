<h2>Tambah Rating</h2>

<form action="pages/rating/proses_tambah.php" method="POST">
    <div class="mb-3">
        <label>Rating (huruf)</label>
        <input type="text" name="rating" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Presentase Bonus (%)</label>
        <input type="number" name="presentase_bonus" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php?page=rating" class="btn btn-secondary">Kembali</a>
</form>
