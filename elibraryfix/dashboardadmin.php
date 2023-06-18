<?php
session_start();
  include("connectDB.php");
  if (isset($_SESSION['nisnip'])) {
    $nisnip = $_SESSION['nisnip'];
  }
    //Profile
    $sql = "SELECT nama FROM akunadmin WHERE nip='$nisnip'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $profile = $row['nama'];

    //Admin
    $sql = "SELECT COUNT(id_admin) AS total FROM akunadmin";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $jumlahAdmin = $row['total'];

    //User
    $sql = "SELECT COUNT(id_user) AS total FROM akunuser";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $jumlahUser = $row['total'];

    //Buku
    $sql = "SELECT COUNT(id_buku) AS total FROM buku";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $jumlahBuku = $row['total'];

    //Kategori
    $sql = "SELECT COUNT(id_kategori) AS total FROM kategori";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $jumlahKategori = $row['total'];

    //Peminjaman
    $sql = "SELECT COUNT(id_peminjaman) AS total FROM peminjaman where status_peminjaman='peminjaman'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $jumlahPeminjaman = $row['total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/LogoFix.png" rel="icon">
  <link href="assets/img/LogoFix.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet"/>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboardadmin.php" class="logo d-flex align-items-center">
        <img src="assets/img/LogoFix.png" alt="Logo">
        <span class="d-none d-lg-block">Perpustakaan 86</span>
      </a>
      <i class="ri-list-check-2 toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/default.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $profile; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $profile; ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboardadmin.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-data-kategori.php">
              <i class="bi bi-circle"></i><span>Data Kategori</span>
            </a>
          </li>
          <li>
            <a href="tables-data-buku.php">
              <i class="bi bi-circle"></i><span>Data Buku</span>
            </a>
          </li>
          <li>
            <a href="tables-data-peminjaman.php">
              <i class="bi bi-circle"></i><span>Data Peminjaman</span>
            </a>
          </li>
          <li>
            <a href="tables-data-user.php">
              <i class="bi bi-circle"></i><span>Data User</span>
            </a>
          </li>
          <li>
            <a href="tables-data-admin.php">
              <i class="bi bi-circle"></i><span>Data Admin</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-right text-danger"></i>
          <span class="text-danger">Sign Out</span>
        </a>
      </li><!-- End Sign Out -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="dashboardadmin.php">Dashboard</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Admin Terdaftar -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Admin Terdaftar<span>| Jumlah</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="ri-admin-line"></i>
                </div>
                <div class="ps-3">
                  <h6><?php echo $jumlahAdmin; ?> Orang</h6>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Admin Terdaftar -->

            <!-- User Terdaftar -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">User Terdaftar<span>| Jumlah</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-user-3-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $jumlahUser; ?> Orang</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End User Terdaftar -->

            <!-- Buku Terdaftar -->
            <div class="col-xxl-4 col-md-6">

              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Buku Terdaftar <span>| Jumlah</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-book-open-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $jumlahBuku; ?> Buku</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Buku Terdaftar -->

            <!-- Kategori Terdaftar -->
            <div class="col-xxl-4 col-md-6">

              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Kategori Terdaftar <span>| Jumlah</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-file-list-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $jumlahKategori; ?> Kategori</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Kategori Terdaftar -->

            <!-- Buku Dalam Peminjaman -->
            <div class="col-xxl-4 col-md-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Buku Dalam Peminjaman <span>| Jumlah</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-timer-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $jumlahPeminjaman; ?> Peminjaman</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Buku Dalam Peminjaman -->
      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>