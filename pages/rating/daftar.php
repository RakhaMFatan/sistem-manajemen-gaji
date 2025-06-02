<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Rating</h2>
    <a href="index.php?page=rating&aksi=tambah" class="btn btn-primary">+ Tambah Rating</a>
</div>

<table class="table table-striped">
    <thead>
        <tr class="table-dark">
            <th>No</th>
            <th>Rating</th>
            <th>Presentase Bonus (%)</th>
            <th class='text-center'>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM rating ORDER BY rating ASC");
        $no = 1;
        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td class='fw-bold text-dark'>$no</td>";
            echo "<td>{$data['rating']}</td>";
            echo "<td>{$data['presentase_bonus']}%</td>";
            echo "<td class='text-center'>
                <a href='index.php?page=rating&aksi=detail&id={$data['id']}' class='btn btn-info btn-sm'>Detail</a>
                <a href='index.php?page=rating&aksi=edit&id={$data['id']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='pages/rating/hapus.php?id={$data['id']}' onclick='return confirm(\"Hapus data ini?\")' class='btn btn-danger btn-sm'>Hapus</a>
            </td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </tbody>
</table>
