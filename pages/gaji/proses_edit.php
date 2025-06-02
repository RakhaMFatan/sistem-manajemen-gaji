<?php
include '../../config/koneksi.php';

$id = $_POST['id'];
$id_karyawan = $_POST['id_karyawan'];
$periode = $_POST['periode'];
$id_lembur = $_POST['id_lembur'];
$lama_lembur = $_POST['lama_lembur'];

// Ambil data karyawan
$q = mysqli_query($koneksi, "
  SELECT k.id_jabatan, k.id_rating, j.gaji_pokok, j.tunjangan, r.presentase_bonus, l.tarif
  FROM karyawan k
  JOIN jabatan j ON k.id_jabatan = j.id
  JOIN rating r ON k.id_rating = r.id
  JOIN lembur l ON l.id = '$id_lembur'
  WHERE k.id = '$id_karyawan'
");
$data = mysqli_fetch_assoc($q);

// Hitung kembali
$total_lembur = $lama_lembur * $data['tarif'];
$total_bonus = ($data['presentase_bonus'] / 100) * $data['gaji_pokok'];
$total_tunjangan = $data['tunjangan'];
$total_pendapatan = $data['gaji_pokok'] + $total_lembur + $total_bonus + $total_tunjangan;

// Update gaji
$update = mysqli_query($koneksi, "
  UPDATE gaji SET
    periode = '$periode',
    id_lembur = '$id_lembur',
    lama_lembur = '$lama_lembur',
    total_lembur = '$total_lembur',
    total_bonus = '$total_bonus',
    total_tunjangan = '$total_tunjangan',
    total_pendapatan = '$total_pendapatan'
  WHERE id = '$id'
");

if ($update) {
  header("Location: ../../index.php?page=gaji");
  exit;
} else {
  echo "Gagal mengupdate data gaji.";
}
