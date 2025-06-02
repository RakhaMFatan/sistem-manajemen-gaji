<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Karyawan</h2>
    <a href="index.php?page=karyawan&aksi=tambah" class="btn btn-primary">+ Tambah Karyawan</a>
</div>

<table class="table table-striped ">
    <thead>
        <tr class="table-dark">
            <th>No</th>
            <th>Nama</th>
            <th>Divisi</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $query = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY created_at ASC");
        $no = 1;
        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td class='fw-bold text-dark'>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($data['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($data['divisi']) . "</td>";
            echo "<td>" . htmlspecialchars($data['jenis_kelamin']) . "</td>";
            echo "<td>" . htmlspecialchars($data['status']) . "</td>";
            echo "<td class='text-center'>
                    <a href='index.php?page=karyawan&aksi=detail&id={$data['id']}' class='btn btn-info btn-sm'>Detail</a>
                    <a href='index.php?page=karyawan&aksi=edit&id={$data['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='pages/karyawan/hapus.php?id={$data['id']}' onclick='return confirm(\"Yakin ingin hapus?\")' class='btn btn-danger btn-sm'>Hapus</a>
                </td>";
            echo "</tr>";
        }
?>

    </tbody>
</table>
