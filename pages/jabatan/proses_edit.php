<?php
include '../../config/koneksi.php';

$id         = $_POST['id'];
$nama       = $_POST['nama'];
$gaji       = $_POST['gaji_pokok'];
$tunjangan  = $_POST['tunjangan'];

$query = mysqli_query($koneksi, "UPDATE jabatan SET 
    nama = '$nama',
    gaji_pokok = '$gaji',
    tunjangan = '$tunjangan'
    WHERE id = '$id'
");

if ($query) {
    header('Location: ../../index.php?page=jabatan');
    exit;
} else {
    echo "Gagal mengedit jabatan: " . mysqli_error($koneksi);
}
?>
