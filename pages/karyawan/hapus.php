<?php
include '../../config/koneksi.php';
$id = $_GET['id'];

// Cek apakah ada data gaji terkait karyawan ini
$cekGaji = mysqli_query($koneksi, "SELECT * FROM gaji WHERE id_karyawan = '$id'");

if (mysqli_num_rows($cekGaji) > 0) {
    // Kalau ada data gaji, tampilkan pesan
    echo "<script>
        alert('Gagal menghapus. Karyawan ini masih memiliki data gaji.');
        window.location.href = '../../index.php?page=karyawan';
    </script>";
    exit;
}

// Kalau tidak ada data gaji, baru hapus
$hapus = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id = '$id'");

if ($hapus) {
    echo "<script>
        alert('Karyawan berhasil dihapus.');
        window.location.href = '../../index.php?page=karyawan';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data karyawan.');
        window.location.href = '../../index.php?page=karyawan';
    </script>";
}
?>
