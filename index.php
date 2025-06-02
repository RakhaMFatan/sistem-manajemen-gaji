<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


<?php
include 'config/koneksi.php'; // koneksi ke database
include 'templates/header.php'; // bagian atas (html head dan buka body)
?>

<div class="container-fluid" style="background-color: #EAEFEF;">
  <div class="row">

    <!-- Sidebar versi desktop -->
    <div class="col-md-3 col-lg-2 d-none d-md-block bg-dark text-white p-0 min-vh-100 shadow">
      <?php include 'templates/sidebar.php'; ?>
    </div>

    <!-- Sidebar versi mobile (offcanvas) -->
    <div class="offcanvas offcanvas-start bg-dark text-white d-md-none" tabindex="-1" id="sidebarMenu">
      <?php include 'templates/sidebar.php'; ?>
    </div>

    <!-- Konten Utama -->
    <div class="col-md-9 col-lg-10 p-4">
      <div class="bg-white rounded-lg shadow-lg border-0 p-4">

        <?php
        // Ambil parameter dari URL
        $page = $_GET['page'] ?? 'dashboard';
        $aksi = $_GET['aksi'] ?? '';

        // Routing berdasarkan halaman
        if ($page == 'dashboard') {
            include 'pages/dashboard.php';
        } elseif ($page == 'karyawan') {
            if ($aksi == 'tambah') {
                include 'pages/karyawan/tambah.php';
            } elseif ($aksi == 'edit') {
                include 'pages/karyawan/edit.php';
            } elseif ($aksi == 'detail') {
                include 'pages/karyawan/detail.php';
            } else {
                include 'pages/karyawan/daftar.php';
            }
        } elseif ($page == 'jabatan') {
            if ($aksi == 'tambah') {
                include 'pages/jabatan/tambah.php';
            } elseif ($aksi == 'edit') {
                include 'pages/jabatan/edit.php';
            } elseif ($aksi == 'detail') {
                include 'pages/jabatan/detail.php';
            } else {
                include 'pages/jabatan/daftar.php';
            }
        } elseif ($page == 'rating') {
            if ($aksi == 'tambah') {
                include 'pages/rating/tambah.php';
            } elseif ($aksi == 'edit') {
                include 'pages/rating/edit.php';
            } elseif ($aksi == 'detail') {
                include 'pages/rating/detail.php';
            } else {
                include 'pages/rating/daftar.php';
            }
        } elseif ($page == 'lembur') {
            if ($aksi == 'tambah') {
                include 'pages/lembur/tambah.php';
            } elseif ($aksi == 'edit') {
                include 'pages/lembur/edit.php';
            } elseif ($aksi == 'detail') {
                include 'pages/lembur/detail.php';
            } else {
                include 'pages/lembur/daftar.php';
            }
        } elseif ($page == 'gaji') {
            if ($aksi == 'tambah') {
                include 'pages/gaji/tambah.php';
            } elseif ($aksi == 'detail') {
                include 'pages/gaji/detail.php';
            } elseif ($aksi == 'edit') {
                include 'pages/gaji/edit.php';
            }else {
                include 'pages/gaji/daftar.php';
            }
        } else {
            echo "<h3>Halaman tidak ditemukan!</h3>";
        }
        ?>

      </div>
    </div>

  </div>
</div>

<?php include 'templates/footer.php'; ?>
