<?php
  session_start();
  include("connectDB.php");
  if (isset($_SESSION['nisnip'])) {
    $nisnip = $_SESSION['nisnip'];
  }
  
    $sql = "SELECT nama FROM akunadmin WHERE nip='$nisnip'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $profile = $row['nama'];
  
  //Edit buku
  if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];
    $fotoDelete = $_GET['fotoDelete'];
  
    // Query untuk mendapatkan data buku berdasarkan id
    $sql = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
    $result = mysqli_query($conn, $sql);
    $buku = mysqli_fetch_assoc($result);
  
    // Proses pengeditan data buku
    if (isset($_POST['simpan'])) {
      $id_buku = $_POST['id_buku'];
      $id_kategori = $_POST['id_kategori'];
      $judul = $_POST['judul'];
      $penulis = $_POST['penulis'];
      $penerbit = $_POST['penerbit'];
      $tahun_terbit = $_POST['tahun_terbit'];
      $jumlah_halaman = $_POST['jumlah_halaman'];
      $stok = $_POST['stok'];
      $deskripsi = $_POST['deskripsi'];
      $tmp_file = $_FILES['foto']['tmp_name'];
      $foto = $_FILES['foto']['name'];
  
      $updateQuery = "UPDATE buku SET id_buku = '$id_buku', id_kategori = '$id_kategori', judul = '$judul', penulis = '$penulis', tahun_terbit = '$tahun_terbit', jumlah_halaman = '$jumlah_halaman', stok = '$stok', deskripsi = '$deskripsi', foto = '$foto' WHERE id_buku = '$id_buku'";
      if (mysqli_query($conn, $updateQuery)) {
        //Hapus file sebelum upload file baru
        $path = "Gambar/";
        unlink($path. $fotoDelete);
        //Upload file baru
        $dir = "Gambar/$foto";
        move_uploaded_file($tmp_file, $dir);
        header("Location: tables-data-buku.php");
        exit();
      } else {
        echo "Error: " . mysqli_error($conn);
        exit();
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Data Buku</title>
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
        <a class="nav-link collapsed" href="dashboardadmin.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
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
        <h1>Edit Data Buku</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboardadmin.php">Dashboard</a></li>
            <li class="breadcrumb-item">Data</li>
            <li class="breadcrumb-item"><a href="tables-data-buku.php">Data Buku</a></li>
            <li class="breadcrumb-item active">Edit Data Buku</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    
      <section class="section">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Edit Data Buku</h5>
    
            <!-- Edit Data Buku -->
            <form method="POST" enctype = "multipart/form-data">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Id Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_buku" value="<?php echo $buku['id_buku']; ?>" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Id Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_kategori" value="<?php echo $buku['id_kategori']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="judul" value="<?php echo $buku['judul']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="penulis" value="<?php echo $buku['penulis']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="penerbit" value="<?php echo $buku['penerbit']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" name="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Jumlah Halaman</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" name="jumlah_halaman" value="<?php echo $buku['jumlah_halaman']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                        <input type="number" min="0" class="form-control" name="stok" value="<?php echo $buku['stok']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" style="height: 100px" name="deskripsi"><?php echo $buku['deskripsi']; ?></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <span>*File sebelumnya : <?php echo $buku['foto']; ?></span>
                        <input class="form-control" type="file" name="foto">
                    </div>
                </div>
    
                <div class="col-sm-10">
                    <label class="col-sm-6 col-form-label"></label>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    <a href="tables-data-buku.php" class="btn btn-danger">Cancel</a>
                </div>
    
            </form><!-- End Edit Data Buku -->
    
            </div>
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