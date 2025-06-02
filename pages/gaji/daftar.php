<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Gaji Karyawan</h2>
    <a href="index.php?page=gaji&aksi=tambah" class="btn btn-primary">+ Hitung Gaji</a>
</div>

<table class="table table-striped text-center">
    <thead>
        <tr class="table-dark">
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Periode</th>
            <th>Total Pendapatan</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($koneksi, "
            SELECT g.*, k.nama 
            FROM gaji g 
            JOIN karyawan k ON g.id_karyawan = k.id
            ORDER BY g.periode DESC
        ");

        $no = 1;
        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td class='fw-bold text-dark'>{$no}</td>";
            echo "<td>{$data['nama']}</td>";
            echo "<td>" . date('d M Y', strtotime($data['periode'])) . "</td>";
            echo "<td>Rp " . number_format($data['total_pendapatan']) . "</td>";
            echo "<td class='text-center'>
                <a href='index.php?page=gaji&aksi=detail&id={$data['id']}' class='btn btn-info btn-sm'>Detail</a>
                <a href='index.php?page=gaji&aksi=edit&id={$data['id']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='pages/gaji/hapus.php?id={$data['id']}' onclick='return confirm(\"Yakin ingin hapus?\")' class='btn btn-danger btn-sm'>Hapus</a>
            </td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </tbody>
</table>
