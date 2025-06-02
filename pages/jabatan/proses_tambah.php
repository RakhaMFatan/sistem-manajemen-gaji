<?php
include '../../config/koneksi.php';

$nama       = $_POST['nama'];
$gaji_pokok = $_POST['gaji_pokok'];
$tunjangan  = $_POST['tunjangan'];

$query = mysqli_query($koneksi, "INSERT INTO jabatan (nama, gaji_pokok, tunjangan)
VALUES ('$nama', '$gaji_pokok', '$tunjangan')");

if ($query) {
    header('Location: ../../index.php?page=jabatan');
    exit;
} else {
    echo "Gagal menambahkan jabatan: " . mysqli_error($koneksi);
}
?>
