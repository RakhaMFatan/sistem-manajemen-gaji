<?php
// Hitung jumlah karyawan
$qKaryawan = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM karyawan");
$totalKaryawan = mysqli_fetch_assoc($qKaryawan)['total'];

// Hitung jumlah karyawan aktif dan tidak aktif
$qAktif = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM karyawan WHERE status = 'Aktif'");
$totalAktif = mysqli_fetch_assoc($qAktif)['total'];

$qNonAktif = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM karyawan WHERE status = 'Tidak Aktif'");
$totalNonAktif = mysqli_fetch_assoc($qNonAktif)['total'];

// Hitung jumlah jabatan
$qJabatan = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM jabatan");
$totalJabatan = mysqli_fetch_assoc($qJabatan)['total'];

// Hitung jumlah rating
$qRating = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM rating");
$totalRating = mysqli_fetch_assoc($qRating)['total'];
?>

<h2 class="mb-4 fw-bold text-center">
  <i class="bi bi-building"></i> SELAMAT DATANG DI PT. Jaya ID
</h2>
<hr>

<marquee behavior="" direction="">
  🔔 Selamat Datang di Sistem Manajemen Gaji PT. Jaya ID |
  💡 Lihat detail <i class="bi bi-person-badge"></i> karyawan,
  <i class="bi bi-briefcase-fill"></i> jabatan,
  dan <i class="bi bi-bar-chart-fill"></i> rating di masing-masing menu
</marquee>

<!-- Card jumlah data -->
<div class="row g-4 my-2">

  <!-- Jabatan -->
  <div class="col-md-4 mt-5">
    <div class="card shadow-lg rounded-4 border-0 bg-light pt-2">
      <div class="card-body text-center" style="border: 1px solid black; border-radius: 12px">
        <a href="index.php?page=jabatan" style="text-decoration: none;">
          <h5 class="card-title"><i class="bi bi-briefcase-fill me-2"></i>Jumlah Jabatan</h5>
          <h4><?= $totalJabatan ?></h4>
        </a>
      </div>
    </div>
  </div>

  <!-- Karyawan -->
  <div class="col-md-4">
    <div class="card shadow rounded-4 border-0 bg-light">
      <div class="card-body text-center" style="border: 1px solid black; border-radius: 12px">
          <a href="index.php?page=karyawan" style="text-decoration: none;">
            <h5 class="card-title"><i class="bi bi-people-fill me-2"></i>Jumlah Karyawan</h5>
            <h4><?= $totalKaryawan ?></h4>
            <p class="mt-2 mb-0 small">
              <span class="badge bg-success me-1 py-2 px-3"><i class="bi bi-check-circle-fill fs-6">  </i> Aktif: <?= $totalAktif ?></span>
              <span class="badge bg-danger py-2 px-3 mt-2"><i class="bi bi-x-circle-fill fs-6">  </i> Tidak Aktif: <?= $totalNonAktif ?></span>
          </a>
        </p>
      </div>
    </div>
  </div>

  <!-- Rating -->
  <div class="col-md-4 mb-4 mt-5">
    <div class="card shadow rounded-4 border-0 bg-light pt-2">
      <div class="card-body text-center" style="border: 1px solid black; border-radius: 12px">
          <a href="index.php?page=rating" style="text-decoration: none;">
            <h5 class="card-title"><i class="bi bi-bar-chart-fill"></i> Jumlah Rating</h5>
            <h4><?= $totalRating ?></h4>
          </a>
      </div>
    </div>
  </div>
</div>
<hr>

<!-- Karyawan terbaru -->
<h5 class="my-4 text-center fs-5 fw-bold">
  <i class="bi bi-clock-history me-2"></i>Karyawan Terbaru
</h5>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY created_at DESC LIMIT 8");
  while ($data = mysqli_fetch_array($query)) {
    $foto = !empty($data['foto']) ? $data['foto'] : 'default.jpg';
    $status = $data['status'];
    $badgeClass = $status === 'Aktif' ? 'bg-success' : 'bg-danger';
    $statusIcon = $status === 'Aktif' ? '<i class="bi bi-check-circle-fill fs-6">  </i>' : '<i class="bi bi-x-circle-fill fs-6">  </i>';
  ?>
    <div class="col">
      <div class="card h-100 shadow rounded-4 overflow-hidden">
        <img src="uploads/<?= $foto ?>" class="card-img-top" alt="<?= $data['nama'] ?>" style="height: 180px; object-fit: cover;">

        <div class="card-body text-center">
          <h5 class="card-title mb-0">
            <i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($data['nama']) ?>
          </h5>
          <p class="text-muted small mb-1">
            <i class="bi bi-diagram-3-fill me-1"></i><?= htmlspecialchars($data['divisi']) ?>
          </p>
          <span class="badge <?= $badgeClass ?>">
            <?= $statusIcon ?> <?= $status ?>
          </span>
        </div>

        <div class="card-footer text-center">
          <small class="text-muted">
            <i class="bi bi-calendar-event me-1"></i>Masuk: <?= date('d-m-Y', strtotime($data['created_at'])) ?>
          </small>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
