<?php
session_start();
include("config.php");

if (isset($_SESSION['nisnip'])) {
  $nisnip = $_SESSION['nisnip'];
}
$id_kategori = "KTGI003";

// Query SQL untuk mengambil data buku dengan id_kategori tertentu
$sql = "SELECT id_buku, foto, judul FROM buku WHERE id_kategori = '$id_kategori'";
$result = $conn->query($sql);

// Ambil nilai pencarian dari URL jika tersedia
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query SQL untuk mengambil data buku dengan id_kategori tertentu dan memenuhi pencarian
$sql = "SELECT id_buku, foto, judul FROM buku WHERE id_kategori = '$id_kategori' AND judul LIKE '%$search%'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
     <!-- Favicons -->
     <link href="Gambar/LogoFix.png" rel="icon">
    <link href="Gambar/LogoFix.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="frontend/styles/kategori.css"/>
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="boxicons/css/boxicons.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7e6ab84ec3.js" crossorigin="anonymous"></script>
    <style>
    .nav-link:hover {
        color: #8fc3f7 !important;
    }
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                <img src="Gambar/LogoFix.png" alt="Logo" width="30px" height="30px">  
                <font style="font-weight: bold;">PERPUSTAKAAN 86</font></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" href="main.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a 
                            href="#" 
                            class="nav-link dropdown-toggle" 
                            id="navbardrop"
                            data-toggle="dropdown"
                        >Kategori
                        </a>
                        <div class="dropdown-menu">
                            <a href="kategori_sejarah.php?id_kategori=KTGI001" class="dropdown-item dropdown-item-sejarah">Sejarah</a>
                            <a href="kategori_filsafat.php?id_kategori=KTGI002" class="dropdown-item dropdown-item-filsafat">Filsafat</a>
                            <a href="kategori_komputer.php?id_kategori=KTGI003" class="dropdown-item dropdown-item-komputer">Komputer</a>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a href="riwayat.php?nis=<?php echo $nisnip; ?>" class="nav-link">Riwayat</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Keluar</a>
                    </li>
                  </ul>
                  <a href="profile.php">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" style="color: black;">
                      <i class="fa-solid fa-user"></i>
                    </button>
                  </a>
                </div>
            </div>
      </nav> 
      <main>
        <header class="text-center">
          <h1>
            Komputer
          </h1>
          <form action="" method="GET">
            <div class="d-flex justify-content-center h-100">
              <div class="search">
                <input type="text" class="search-input" placeholder="search..." name="search">
                <button type="submit" class="search-icon">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </header>
        <section>
  
        <div class="container" style="margin-top: 30px;">
          <div class="row" id="terbaru">
            <?php
              // Looping untuk menampilkan data buku
              while ($row = $result->fetch_assoc()) {
                $id_buku = $row["id_buku"];
                $foto = $row["foto"];
                $judul = $row["judul"];
            ?>
            <div class="col-sm-4 col-md-3 col-lg-3 filter photo">
              <div class="card">
                <figure class="box-card">
                <?php echo "<img class='card-img-top' src='Gambar/{$foto}' alt='...'>"; ?>
                  <figcaption>
                    <h3>Details</h3>
                  </figcaption>
                  <a href="detail_book.php?id_buku=<?php echo $id_buku; ?>&search=<?php echo urlencode($search); ?>"></a>

                </figure>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $judul; ?></h5>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
    </section>
      </main>
  
      <script src="frontend/libraries/jquery/jquery-3.6.3.min.js"></script>
      <script src="frontend/libraries/bootstrap/js/bootstrap.js"></script>
</body>
</html>
