<?php
include '../../config/koneksi.php';
$id = $_GET['id'];

// Cek apakah ada data karyawan terkait jabatan ini
$cekJabatan = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_jabatan = '$id'");

if (mysqli_num_rows($cekJabatan) > 0) {
    // Kalau ada data karyawan, tampilkan pesan
    echo "<script>
        alert('Gagal menghapus. Jabatan ini masih memiliki data karyawan.');
        window.location.href = '../../index.php?page=jabatan';
    </script>";
    exit;
}

// Kalau tidak ada data karyawan, baru hapus
$hapus = mysqli_query($koneksi, "DELETE FROM jabatan WHERE id = '$id'");

if ($hapus) {
    echo "<script>
        alert('Jabatan berhasil dihapus.');
        window.location.href = '../../index.php?page=jabatan';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data Jabatan.');
        window.location.href = '../../index.php?page=jabatan';
    </script>";
}
?>
