<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Jabatan</h2>
    <a href="index.php?page=jabatan&aksi=tambah" class="btn btn-primary">+ Tambah Jabatan</a>
</div>

<table class="table table-striped">
    <thead>
        <tr class="table-dark">
            <th>No</th>
            <th>Nama Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY created_at DESC");
        $no = 1;
        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td class='fw-bold text-dark'>$no</td>";
            echo "<td>{$data['nama']}</td>";
            echo "<td>Rp " . number_format($data['gaji_pokok']) . "</td>";
            echo "<td>Rp " . number_format($data['tunjangan']) . "</td>";
            echo "<td class='text-center'>
                <a href='index.php?page=jabatan&aksi=detail&id={$data['id']}' class='btn btn-info btn-sm'>Detail   </a>
                <a href='index.php?page=jabatan&aksi=edit&id={$data['id']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='pages/jabatan/hapus.php?id={$data['id']}' onclick='return confirm(\"Hapus data ini?\")' class='btn btn-danger btn-sm'>Hapus</a>
            </td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </tbody>
</table>
