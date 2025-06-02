<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM rating WHERE id = '$id'");
$data = mysqli_fetch_array($query);
?>

<h2>Edit Rating</h2>

<form action="pages/rating/proses_edit.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="mb-3">
        <label>Rating</label>
        <input type="text" name="rating" class="form-control" value="<?= $data['rating'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Presentase Bonus</label>
        <input type="number" name="presentase_bonus" class="form-control" value="<?= $data['presentase_bonus'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php?page=rating" class="btn btn-secondary">Kembali</a>
</form>
