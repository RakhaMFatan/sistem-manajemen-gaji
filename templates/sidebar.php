<!-- Sidebar -->
<?php $page = $_GET['page'] ?? 'dashboard'; ?>

<div class="p-3">
  <!-- Header Sidebar -->
  <div class="d-flex align-items-center m-3 mb-4">
    <i class="bi bi-building" style="font-size: 50px;"></i>
    <div> 
      <h6 class="mb-0 fw-bold">Sistem</h6>
      <small class="text-white fw-bold">Manajemen Gaji</small>
    </div>
  </div>

  <hr class="text-white">

  <!-- Navigasi Sidebar -->
  <ul class="nav flex-column">
    <li class="nav-item mb-2">
      <a href="index.php?page=dashboard" class="nav-link text-white rounded-2 <?= ($page == 'dashboard') ? 'bg-primary text-white' : 'hover-bg-primary' ?>">
        <i class="bi bi-speedometer2 fs-5"> </i>Dashboard
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="index.php?page=karyawan" class="nav-link text-white rounded-2 <?= ($page == 'karyawan') ? 'bg-primary text-white' : 'hover-bg-primary' ?>">  
      <i class="bi bi-people fs-5"> </i>Daftar Karyawan
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="index.php?page=jabatan" class="nav-link text-white rounded-2 <?= ($page == 'jabatan') ? 'bg-primary text-white' : 'hover-bg-primary' ?>">
        <i class="bi bi-briefcase me-2 fs-5"> </i>Daftar Jabatan
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="index.php?page=rating" class="nav-link text-white rounded-2 <?= ($page == 'rating') ? 'bg-primary text-white' : 'hover-bg-primary' ?>">
        <i class="bi bi-bar-chart fs-5"> </i>Daftar Rating
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="index.php?page=lembur" class="nav-link text-white rounded-2 <?= ($page == 'lembur') ? 'bg-primary text-white' : 'hover-bg-primary' ?>">
        <i class="bi bi-clock-history fs-5"> </i>Tarif Lembur
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="index.php?page=gaji" class="nav-link text-white rounded-2 <?= ($page == 'gaji') ? 'bg-primary text-white' : 'hover-bg-primary' ?>">
        <i class="bi bi-wallet fs-5"> </i>Gaji Karyawan
      </a>
    </li>
  </ul>
</div>
