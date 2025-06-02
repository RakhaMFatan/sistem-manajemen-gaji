<?php
include '../../config/koneksi.php';

$nama = $_POST['nama'];
$divisi = $_POST['divisi'];
$alamat = $_POST['alamat'];
$umur = $_POST['umur'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$status = $_POST['status'];
$id_jabatan = $_POST['id_jabatan'];
$id_rating = $_POST['id_rating'];

$foto = '';

// Cek jika ada file di-upload
if ($_FILES['foto']['name']) {
  $namaFile = $_FILES['foto']['name'];
  $tmpFile = $_FILES['foto']['tmp_name'];
  $ukuran = $_FILES['foto']['size'];
  $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
  $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];

  if (in_array($ext, $allowedExt)) {
    if ($ukuran < 1048576) { // < 1MB
      $namaBaru = uniqid() . '.' . $ext;
      move_uploaded_file($tmpFile, '../../uploads/' . $namaBaru);
      $foto = $namaBaru;
    } else {
      echo "Ukuran gambar maksimal 1MB";
      exit;
    }
  } else {
    echo "Format gambar hanya JPG, JPEG, PNG, WEBP";
    exit;
  }
}

// Simpan ke database
$query = mysqli_query($koneksi, "
  INSERT INTO karyawan (id_jabatan, id_rating, nama, divisi, alamat, umur, jenis_kelamin, status, foto)
  VALUES ('$id_jabatan', '$id_rating', '$nama', '$divisi', '$alamat', '$umur', '$jenis_kelamin', '$status', '$foto')
");

if ($query) {
  header('Location: ../../index.php?page=karyawan');
  exit;
} else {
  echo "Gagal menyimpan data karyawan.";
}
?>
