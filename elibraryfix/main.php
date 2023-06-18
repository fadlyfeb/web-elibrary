<?php
session_start();
include("config.php");

if (isset($_SESSION['nisnip'])) {
  $nisnip = $_SESSION['nisnip'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Favicons -->
    <link href="Gambar/LogoFix.png" rel="icon">
    <link href="Gambar/LogoFix.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="frontend/styles/mainn.css"/>
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
                  <a href="profile.php?nisnip=<?php echo urlencode($nisnip); ?>">
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
            SELAMAT DATANG
            <br />
            DI PERPUSTAKAAN 86
          </h1>
          <p class="mt-3">
            "Bersama Buku, Terhubung dengan Dunia Luas"
          </p>
        </header>

        <section>
          <div class="container">
            <center>
              <div class="container">
                <div class="books" style="margin-top: 40px;">
                  <h2 >COMING SOON</h2>
                </div>
              </div>
            <div class="box-banner" style="max-width: 80%; ">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="Gambar/baner1.jpg" alt="First slide"  height="300">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="Gambar/baner2.jpg" alt="Second slide" height="300">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="Gambar/baner3.jpg" alt="Third slide" height="300">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </center>
          </div>
        </section>

        <section>
    <div class="container" style="margin-top: 30px; margin-bottom: 15px;">
        <div class="row justify-content-center">
            <div>
                <button class="btn btn-default filter-button" data-filter="all">Semua</button>
                <button class="btn btn-default filter-button" data-filter="top4">Terlama</button>
                <button class="btn btn-default filter-button" data-filter="bottom4">Terbaru</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" id="terbaru">
            <?php

            
$query = "SELECT foto, judul, stok FROM buku";
$result = mysqli_query($conn, $query);
    

            // Menampilkan buku berdasarkan filter yang dipilih
            function displayBooks($result)
            {
                if (mysqli_num_rows($result) > 0) {
                    $counter = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-sm-4 col-md-3 col-lg-3 filter photo">';
                        echo '<div class="card">';
                        echo '<figure class="box-card">';
                        echo "<img src='Gambar/{$row['foto']}' class='card-img-top' alt='...''>";
                        echo '<figcaption>';
                        echo '<h3>Details</h3>';
                        echo '</figcaption>';
                        echo '<a href="detail_book.php?id_buku=BUK' . str_pad($counter, 4, '0', STR_PAD_LEFT) . '"></a>';
                        echo '</figure>';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row['judul'] . '</h5>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $counter++;
                    }
                } else {
                    echo '<p>Tidak ada buku yang ditemukan.</p>';
                }
            }

            // Menampilkan semua buku
            displayBooks($result);

            ?>
            </div>
            </div>
</section>
     
      
      </main>
  
      <script src="frontend/libraries/jquery/jquery-3.6.3.min.js"></script>
<script src="frontend/libraries/bootstrap/js/bootstrap.js"></script>
<script>
    const nisnip = '<?php echo urlencode($_SESSION['nisnip']); ?>';
  const profileUrl = `profile.php?nisnip=${nisnip}`;
  document.querySelector('.btn-login').addEventListener('click', function() {
    window.location.href = profileUrl;
  });
    $(document).ready(function () {
        $(".filter-button").click(function () {
            var value = $(this).attr('data-filter');

            if (value == "all") {
                $('.filter').show('1000');
            } else if (value == "top4") {
                $('.filter').hide();
                $('.filter').slice(0, 4).show('3000');
            } else if (value == "bottom4") {
                $('.filter').hide();
                $('.filter').slice(-4).show('3000');
            }
        });
    });

              // Tambahkan kode JavaScript untuk menangani klik dropdown
              const dropdownSejarah = document.querySelector('.dropdown-item-sejarah');
              const dropdownFilsafat = document.querySelector('.dropdown-item-filsafat');
              const dropdownKomputer = document.querySelector('.dropdown-item-komputer');

              dropdownSejarah.addEventListener('click', function() {
              const idKategori = 'KTGI001'; // ID kategori yang akan dikirim

              // Alihkan pengguna ke halaman kategori_sejarah.php dengan mengirim data melalui URL
              window.location.href = 'kategori_sejarah.php?id_kategori=' + idKategori;
              });

              dropdownFilsafat.addEventListener('click', function() {
              const idKategori = 'KTGI002'; // ID kategori yang akan dikirim

              // Alihkan pengguna ke halaman kategori_filsafat.php dengan mengirim data melalui URL
              window.location.href = 'kategori_filsafat.php?id_kategori=' + idKategori;
              });
              
              dropdownKomputer.addEventListener('click', function() {
              const idKategori = 'KTGI003'; // ID kategori yang akan dikirim

              // Alihkan pengguna ke halaman kategori_komputer.php dengan mengirim data melalui URL
              window.location.href = 'kategori_komputer.php?id_kategori=' + idKategori;
              });
      </script>
</body>
</html>