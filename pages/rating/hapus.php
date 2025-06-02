<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM rating WHERE id = '$id'");

if ($query) {
    header('Location: ../../index.php?page=rating');
    exit;
} else {
    echo "Gagal menghapus rating: " . mysqli_error($koneksi);
}
?>
