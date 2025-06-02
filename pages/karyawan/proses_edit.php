<?php
include '../../config/koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$divisi = $_POST['divisi'];
$alamat = $_POST['alamat'];
$umur = $_POST['umur'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$status = $_POST['status'];
$id_jabatan = $_POST['id_jabatan'];
$id_rating = $_POST['id_rating'];

$foto = ''; // default kosong

// Jika ada file foto di-upload
if (!empty($_FILES['foto']['name'])) {
  $namaFile = $_FILES['foto']['name'];
  $tmpFile = $_FILES['foto']['tmp_name'];
  $ukuran = $_FILES['foto']['size'];
  $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
  $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];

  if (in_array($ext, $allowedExt)) {
    if ($ukuran < 1048576) { // maksimal 1MB
      $namaBaru = uniqid() . '.' . $ext;
      move_uploaded_file($tmpFile, '../../uploads/' . $namaBaru);
      $foto = $namaBaru;

      // Update dengan foto
      $query = mysqli_query($koneksi, "
        UPDATE karyawan SET 
          id_jabatan = '$id_jabatan',
          id_rating = '$id_rating',
          nama = '$nama',
          divisi = '$divisi',
          alamat = '$alamat',
          umur = '$umur',
          jenis_kelamin = '$jenis_kelamin',
          status = '$status',
          foto = '$foto'
        WHERE id = '$id'
      ");
    } else {
      echo "Ukuran gambar maksimal 1MB."; exit;
    }
  } else {
    echo "Format gambar harus JPG, JPEG, PNG, atau WEBP."; exit;
  }

} else {
  // Update tanpa ganti foto
  $query = mysqli_query($koneksi, "
    UPDATE karyawan SET 
      id_jabatan = '$id_jabatan',
      id_rating = '$id_rating',
      nama = '$nama',
      divisi = '$divisi',
      alamat = '$alamat',
      umur = '$umur',
      jenis_kelamin = '$jenis_kelamin',
      status = '$status'
    WHERE id = '$id'
  ");
}

// Cek apakah berhasil
if ($query) {
  header('Location: ../../index.php?page=karyawan');
  exit;
} else {
  echo "Gagal mengupdate data.";
}
?>
