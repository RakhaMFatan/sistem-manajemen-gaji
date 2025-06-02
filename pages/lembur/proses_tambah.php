<?php
include '../../config/koneksi.php';

$tarif = $_POST['tarif'];
$id_jabatan = $_POST['id_jabatan'];

$query = mysqli_query($koneksi, "
  INSERT INTO lembur (tarif, id_jabatan)
  VALUES ('$tarif', '$id_jabatan')
");

if ($query) {
  header("Location: ../../index.php?page=lembur");
} else {
  echo "Gagal menambahkan tarif lembur.";
}
?>
