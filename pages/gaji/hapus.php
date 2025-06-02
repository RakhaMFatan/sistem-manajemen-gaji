<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

// Jalankan query hapus
$query = mysqli_query($koneksi, "DELETE FROM gaji WHERE id = '$id'");

if ($query) {
    header('Location: ../../index.php?page=gaji');
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
