<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "
    SELECT g.*, k.nama, j.nama AS jabatan, r.rating, r.presentase_bonus, l.tarif 
    FROM gaji g
    JOIN karyawan k ON g.id_karyawan = k.id
    JOIN jabatan j ON k.id_jabatan = j.id
    JOIN rating r ON k.id_rating = r.id
    JOIN lembur l ON g.id_lembur = l.id
    WHERE g.id = '$id'
");
$data = mysqli_fetch_array($query);
?>

<h2>Detail Gaji</h2>
<table class="table table-bordered">
    <tr><th>Nama Karyawan</th><td><?= $data['nama'] ?></td></tr>
    <tr><th>Jabatan</th><td><?= $data['jabatan'] ?></td></tr>
    <tr><th>Periode</th><td><?= date('F Y', strtotime($data['periode'])) ?></td></tr>
    <tr><th>Gaji Pokok</th><td>Rp <?= number_format($data['total_pendapatan'] - $data['total_lembur'] - $data['total_bonus'] - $data['total_tunjangan']) ?></td></tr>
    <tr><th>Tunjangan</th><td>Rp <?= number_format($data['total_tunjangan']) ?></td></tr>
    <tr><th>Bonus</th><td>Rp <?= number_format($data['total_bonus']) ?> (<?= $data['presentase_bonus'] ?>%)</td></tr>
    <tr><th>Lembur</th><td><?= $data['lama_lembur'] ?> jam x Rp <?= number_format($data['tarif']) ?> = Rp <?= number_format($data['total_lembur']) ?></td></tr>
    <tr><th>Total Pendapatan</th><td><strong>Rp <?= number_format($data['total_pendapatan']) ?></strong></td></tr>
</table>
<a href="index.php?page=gaji" class="btn btn-secondary">Kembali</a>
