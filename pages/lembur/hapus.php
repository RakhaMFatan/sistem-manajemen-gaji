<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

// Cek apakah lembur ini digunakan di tabel gaji
$cekGaji = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM gaji WHERE id_lembur = '$id'");
$totalGaji = mysqli_fetch_assoc($cekGaji)['total'];

if ($totalGaji > 0) {
  echo "<div class='alert alert-danger'>Gagal menghapus. Data lembur ini masih digunakan di tabel gaji.</div>";
  echo "<a href='../../index.php?page=lembur' class='btn btn-secondary mt-3'>Kembali</a>";
  exit;
}

// Jika tidak digunakan, hapus
$query = mysqli_query($koneksi, "DELETE FROM lembur WHERE id = '$id'");

if ($query) {
    header('Location: ../../index.php?page=lembur');
} else {
    echo "<div class='alert alert-danger'>Gagal menghapus data lembur.</div>";
    echo "<a href='../../index.php?page=lembur' class='btn btn-secondary mt-3'>Kembali</a>";
}
?>
