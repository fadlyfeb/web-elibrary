<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elibrary";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Tangkap session nisnip
$nisnip = $_SESSION['nisnip'];
// Tangkap nilai variabel id_buku dari URL
$id_buku = $_GET['id_buku'];
// Simpan ID buku ke sesi
$_SESSION['id_buku'] = $id_buku;
// Mengambil data buku dari database berdasarkan id_buku yang diterima
$sql = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $judul = $row['judul'];
    $penulis = $row['penulis'];
    $penerbit = $row['penerbit'];
    $tahun_terbit = $row['tahun_terbit'];
    $jumlah_halaman = $row['jumlah_halaman'];
    $stok = $row['stok'];
    if($stok != 0){
        $stok = $row['stok'];
    }else{
        $stok = 0;
    }
    $sinopsis = $row['deskripsi'];
    $foto = $row['foto']; // Mengubah blob menjadi base64
} else {
    echo "Buku tidak ditemukan.";
    exit;
}

// Mengambil data pengguna
$queryPengguna = "SELECT nama FROM akunuser WHERE nis = '$nisnip'";
$resultPengguna = $conn->query($queryPengguna);
if ($resultPengguna->num_rows > 0) {
    // Data pengguna ditemukan, tampilkan nama
    $rowPengguna = $resultPengguna->fetch_assoc();
    $nama = $rowPengguna["nama"];
    
}

echo "<script>";
echo "var stokBuku = " . $stok . ";";
echo "</script>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
     <!-- Favicons -->
     <link href="Gambar/LogoFix.png" rel="icon">
    <link href="Gambar/LogoFix.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css"/>
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="frontend/styles/detail_books.css"/>
    <script src="https://kit.fontawesome.com/7e6ab84ec3.js" crossorigin="anonymous"></script>
    <style>
    .nav-link:hover {
        color: #8fc3f7 !important;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="Gambar/LogoFix.png" alt="Logo" width="30px" height="30px">    
            <font style="font-weight: bold;">PERPUSTAKAAN</font></a>
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
    <div class="book-details" id="bookDetails">
    <main>
        <section>
            <div class="container">
                <div class="row" id="back">
                    <a href="main.php">
                        <button class="btn" id="btn-back" type="button">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                    </a>
                    <h3>Detail Buku</h3>
                </div>
                <div class="row no-gutters">
                    <div class="col-6 col-md-4">
                        <center>
                            <?php echo "<img class='img-details' src='Gambar/{$foto}' width='220px' height='300px' alt='...'>"; ?>
                        </center>
                    </div>
                    <div class="col-12 col-sm-6 col-md-8">
                        <div class="col">
                            <h1 class=""><?php echo $judul; ?></h1>
                            <div class="fs-5 mb-5 lead">
                                <table>
                                    <tr>
                                        <td>Author</td>
                                        <td>:</td>
                                        <td><?php echo $penulis; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Penerbit</td>
                                        <td>:</td>
                                        <td><?php echo $penerbit; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tahun terbit</td>
                                        <td>:</td>
                                        <td><?php echo $tahun_terbit; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah halaman</td>
                                        <td>:</td>
                                        <td><?php echo $jumlah_halaman; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><?php echo $stok; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="button-option">
                                <button class="btn btn-outline-dark flex-shrink-0" id="book-now" type="button">
                                    <i class="bi bi-book"></i>
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="sinopsis">
                        <h2>Sinopsis</h2>
                        <p><?php echo $sinopsis; ?></p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </div>
      <div id="popupForm" class="popup">
        <form id="formPeminjaman">
            <div style="margin-top: -58px; margin-left:323px;">
                <button class="btn-close" id="btnCloseForm" type="button">
                    X
                </button>
            </div>
            <h2>Form Peminjaman</h2>
            <label for="nama">Nama:</label>
            <input class="form-control" id="nama" type="text" value="<?php echo $nama ?>" readonly>

            <label for="nim">Nisn:</label>
            <input class="form-control" id="nis" type="text" value="<?php echo $_SESSION['nisnip']; ?>" readonly>

            <label for="nama">Judul Buku:</label>
            <input class="form-control" id="judulBuku" type="text" value="<?php echo $judul ?>" readonly>

            <label for="tglPeminjaman">Tanggal Peminjaman:</label>
            <input class="form-control" id="tglPeminjaman" type="date" name="tanggalPeminjaman" min="<?php echo date('Y-m-d'); ?>">

            <label for="checkboxDenda">
                <input type="checkbox" id="checkboxDenda">
                Saya mengetahui bahwa rentang pengembalian 2 minggu dari waktu peminjaman dan saya siap menerima konsekuensi berupa denda jika terlambat mengembalikan buku
            </label>
            <button type="submit" id="btnSubmit" disabled>Submit</button>
        </form>
    </div>

    <!-- Pop up hasil inputan dan code QR -->
    <div id="popupBukti" class="popup" style="display: none;">
        <div style="margin-top: -58px; margin-left:323px;">
            <button class="btn-close-bukti"  id="btnCloseBukti">X</button>
        </div>
        <h2>Bukti Peminjaman</h2>
        <center>
            <p id="buktiPeminjaman"></p>
            <img id="qrCode" src="" alt="QR Code"></center><br><br>
        </center>
        <button id="btnDownload">Download</button>
    </div>
    
    <div id="popupTidakTersedia" class="popup" style="background-color:#ffe6e6; border: 2px solid black;">
        <div style="margin-top: -58px; margin-left:308px;">
            <button class="btn-close-bukti"  id="btnCloseStok">X</button>
        </div>
        <center>
            <img src="Gambar/ilusDetail.png" style="margin-top: -15px;">
            <h2 style="margin-top: -10px;">Maaf, Stok Buku tidak tersedia</h2>
        </center>
        
    </div>
    <script src="frontend/libraries/jquery/jquery-3.6.3.min.js"></script>
    <script src="frontend/libraries/bootstrap/js/bootstrap.js"></script>
    <script src="frontend/scripts/script.js"></script>
    <script src="frontend/scripts/qrcode.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
</body>
</html>
