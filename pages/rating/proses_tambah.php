<?php
include '../../config/koneksi.php';

$rating = $_POST['rating'];
$bonus  = $_POST['presentase_bonus'];

$query = mysqli_query($koneksi, "INSERT INTO rating (rating, presentase_bonus) VALUES ('$rating', '$bonus')");

if ($query) {
    header('Location: ../../index.php?page=rating');
    exit;
} else {
    echo "Gagal menambahkan data rating: " . mysqli_error($koneksi);
}
?>
