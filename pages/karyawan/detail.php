<?php
include __DIR__ . '/../../config/koneksi.php';

$id = $_GET['id'];

// Ambil data lengkap karyawan
$query = mysqli_query($koneksi,
    "SELECT k.*, 
           j.nama AS nama_jabatan, 
           r.rating AS rating, 
           r.presentase_bonus 
    FROM karyawan k
    LEFT JOIN jabatan j ON k.id_jabatan = j.id
    LEFT JOIN rating r ON k.id_rating = r.id
    WHERE k.id = '$id'
");

$data = mysqli_fetch_array($query);
$foto = !empty($data['foto']) ? $data['foto'] : 'default.jpg';
?>

<h2 class="mb-4">Detail Karyawan</h2>

<div class="row">
    <!-- Kolom Foto -->
    <div class="col-md-4 text-center">
        <img src="uploads/<?= $foto ?>" alt="<?= $data['nama'] ?>" class="rounded shadow-sm mb-3" style="width: 100%; max-width: 250px; height: auto; object-fit: cover;">
        <h5 class="fw-bold mt-2"><?= htmlspecialchars($data['nama']) ?></h5>
        <span class="badge bg-success"><?= htmlspecialchars($data['status']) ?></span>
    </div>

    <!-- Kolom Detail -->
    <div class="col-md-8">
        <table class="table table-bordered">
            <tr>
                <th>Divisi</th>
                <td><?= htmlspecialchars($data['divisi']) ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= htmlspecialchars($data['alamat']) ?></td>
            </tr>
            <tr>
                <th>Umur</th>
                <td><?= htmlspecialchars($data['umur']) ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?= htmlspecialchars($data['jenis_kelamin']) ?></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td><?= htmlspecialchars($data['nama_jabatan'] ?? '-') ?></td>
            </tr>
            <tr>
                <th>Rating</th>
                <td>
                    <?= htmlspecialchars($data['rating'] ?? '-') ?>
                    (<?= $data['presentase_bonus'] ?? '0' ?>%)
                </td>
            </tr>
            <tr>
                <th>Waktu Input</th>
                <td><?= date('d-m-Y H:i:s', strtotime($data['created_at'])) ?></td>
            </tr>
        </table>
        <a href="index.php?page=karyawan" class="btn btn-secondary">Kembali</a>
    </div>
</div>
