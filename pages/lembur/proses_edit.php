<?php
include '../../config/koneksi.php';

$id = $_POST['id'];
$tarif = $_POST['tarif'];
$id_jabatan = $_POST['id_jabatan'];

$query = mysqli_query($koneksi, "
  UPDATE lembur SET
    tarif = '$tarif',
    id_jabatan = '$id_jabatan'
  WHERE id = '$id'
");

if ($query) {
  header("Location: ../../index.php?page=lembur");
} else {
  echo "Gagal mengubah data tarif lembur.";
}
?>
