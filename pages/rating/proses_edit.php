<?php
include '../../config/koneksi.php';

$id     = $_POST['id'];
$rating = $_POST['rating'];
$bonus  = $_POST['presentase_bonus'];

$query = mysqli_query($koneksi, "UPDATE rating SET rating = '$rating', presentase_bonus = '$bonus' WHERE id = '$id'");

if ($query) {
    header('Location: ../../index.php?page=rating');
    exit;
} else {
    echo "Gagal mengedit data rating: " . mysqli_error($koneksi);
}
?>
