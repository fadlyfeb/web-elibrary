<?php
session_start();
include("connectDB.php");
if (isset($_SESSION['nisnip'])) {
  $nisnip = $_SESSION['nisnip'];
}

if (isset($_POST['save'])) {
  $id_admin = $_POST['id_admin'];
  $nama = $_POST['nama'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $nomor_hp = $_POST['nomor_hp'];
  $alamat = $_POST['alamat'];
  $pass = $_POST['pass'];

  // Update data ke tabel akunadmin
  $updateQuery = "UPDATE akunadmin SET id_admin='$id_admin', nama='$nama', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nomor_hp='$nomor_hp', alamat='$alamat', pass='$pass' WHERE nip='$nisnip'";
  $updateResult = mysqli_query($conn, $updateQuery);
  if ($updateResult) {
    // Redirect to users-profile.php after successful update
    header("Location: users-profile.php");
    exit();
  } else {
    echo "Update failed: " . mysqli_error($conn);
  }
}

// Retrieve profile data
$query = "SELECT * FROM akunadmin WHERE nip='$nisnip'";
$result = mysqli_query($conn, $query);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $id_admin = $row['id_admin'];
  $nama = $row['nama'];
  $nip = $row['nip'];
  $jenis_kelamin = $row['jenis_kelamin'];
  $tanggal_lahir = $row['tanggal_lahir'];
  $nomor_hp = $row['nomor_hp'];
  $alamat = $row['alamat'];
  $pass = $row['pass'];
} else {
  echo "Failed to retrieve profile data: " . mysqli_error($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
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
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $nama; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $nama; ?></h6>
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
          <span class="text-danger" >Sign Out</span>
        </a>
      </li><!-- End Sign Out -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboardadmin.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/default.jpg" alt="Profile" class="rounded-circle">
              <h2><?php echo $nama; ?></h2>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Ringkasan</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Detail Profile</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Id Admin</div>
                    <div class="col-lg-9 col-md-8"><?php echo $id_admin; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                    <div class="col-lg-9 col-md-8"><?php echo $nama; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">NIP</div>
                    <div class="col-lg-9 col-md-8"><?php echo $nip; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                    <div class="col-lg-9 col-md-8"><?php echo $jenis_kelamin; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                    <div class="col-lg-9 col-md-8"><?php echo $tanggal_lahir; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No. Telepon</div>
                    <div class="col-lg-9 col-md-8"><?php echo $nomor_hp; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                    <div class="col-lg-9 col-md-8"><?php echo $alamat; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Password</div>
                    <div class="col-lg-9 col-md-8"><?php echo $pass; ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Profile -->
                  <form method="POST" action="">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="inputIdAdmin">Id Admin</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="inputIdAdmin" type="text" name="id_admin"
                                        value="<?php echo $id_admin ?>"  readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="inputNama">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="inputNama" type="text" name="nama"
                                        value="<?php echo $nama ?>">
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="inputNip">NIP</label>
                        <div class="col-sm-10">
                        <input class="form-control" id="inputNip" type="text" name="nis" pattern="[0-9]+" value="<?php echo $_SESSION['nisnip']; ?>" readonly>
                        </div>
                    </div>
    
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioLakiLaki" value="Laki-Laki" <?php if ($jenis_kelamin == 'Laki-Laki') echo 'checked'; ?>>
                                            <label class="form-check-label" for="radioLakiLaki">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="radioPerempuan" value="Perempuan" <?php if ($jenis_kelamin == 'Perempuan') echo 'checked'; ?>>
                                            <label class="form-check-label" for="radioPerempuan">Perempuan</label>
                            </div>
                        </div>
                    </fieldset>
    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="inputTanggalLahir">Tanggal Lahir</label>
                        <div class="col-sm-10">
                        <input class="form-control" id="inputTanggalLahir" type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir ?>">
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="inputNomorHp">No. Telepon</label>
                        <div class="col-sm-10">
                        <input class="form-control" id="inputNomorHp" type="text" name="nomor_hp" pattern="[0-9]+" value="<?php echo $nomor_hp ?>">
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="inputAlamat">Alamat</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" id="inputAlamat" name="alamat" rows="4"><?php echo $alamat; ?></textarea>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="inputPassword">Password</label>
                        <div class="col-sm-10">
                        <input class="form-control" id="inputPassword" type="text" name="pass"
                                            value="<?php echo $pass ?>">
                        </div>
                    </div>
        
                    <div class="col-sm-10">
                        <label class="col-sm-6 col-form-label"></label>
                        <button class="btn btn-primary" type="submit" name="save">Simpan</button>
                    </div>
        
                </form><!-- End Edit Profile -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

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