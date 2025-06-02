<?php
include '../../config/koneksi.php';

$id_karyawan = $_POST['id_karyawan'];
$lama_lembur = $_POST['lama_lembur'];
$periode     = $_POST['periode'];

// Ambil data karyawan, jabatan, rating
$data = mysqli_fetch_array(mysqli_query($koneksi, "
    SELECT k.*, j.gaji_pokok, j.tunjangan, r.presentase_bonus, j.id AS id_jabatan
    FROM karyawan k
    JOIN jabatan j ON k.id_jabatan = j.id
    JOIN rating r ON k.id_rating = r.id
    WHERE k.id = '$id_karyawan'
"));

// Ambil tarif lembur dari tabel lembur berdasarkan jabatan
$lembur = mysqli_fetch_array(mysqli_query($koneksi, "
    SELECT id, tarif FROM lembur WHERE id_jabatan = '{$data['id_jabatan']}'
"));

if (!$lembur) {
  echo "<div class='alert alert-danger'>Tarif lembur untuk jabatan ini belum diatur.</div>";
  echo "<a href='../../index.php?page=gaji' class='btn btn-secondary'>Kembali</a>";
  exit;
}

$id_lembur = $lembur['id'];
$tarif     = $lembur['tarif'];

// Hitung
$total_lembur     = $lama_lembur * $tarif;
$total_bonus      = ($data['presentase_bonus'] / 100) * $data['gaji_pokok'];
$total_tunjangan  = $data['tunjangan'];
$total_pendapatan = $data['gaji_pokok'] + $total_tunjangan + $total_bonus + $total_lembur;

// Simpan
$query = mysqli_query($koneksi, "
    INSERT INTO gaji 
    (id_karyawan, id_lembur, periode, lama_lembur, total_lembur, total_bonus, total_tunjangan, total_pendapatan) 
    VALUES 
    ('$id_karyawan', '$id_lembur', '$periode', '$lama_lembur', '$total_lembur', '$total_bonus', '$total_tunjangan', '$total_pendapatan')
");

if ($query) {
    header('Location: ../../index.php?page=gaji');
    exit;
} else {
    echo "Gagal menyimpan data gaji: " . mysqli_error($koneksi);
}
?>
