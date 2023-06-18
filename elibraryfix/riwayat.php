<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "elibrary";

  // Membuat koneksi ke database
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Memeriksa koneksi
  if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
  }

  // Mendapatkan nilai 'nis' yang dikirim melalui parameter GET
  $nis = $_GET['nis'];

  // Mendapatkan nilai 'sort' yang dikirim melalui parameter GET
  $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

  // Menentukan urutan pengurutan
  $order = '';
  if ($sort === 'asc') {
    $order = 'ASC';
  } elseif ($sort === 'desc') {
    $order = 'DESC';
  }

 // Query SQL untuk mengambil data buku dengan id_kategori tertentu dan judul yang sesuai dengan pencarian
 $sql = "SELECT peminjaman.id_peminjaman, peminjaman.nis, peminjaman.id_buku, peminjaman.tanggal_peminjaman, peminjaman.status_peminjaman, pengembalian.tanggal_pengembalian
 FROM peminjaman
 LEFT JOIN pengembalian ON peminjaman.id_peminjaman = pengembalian.id_peminjaman
 WHERE peminjaman.nis = '$nis'
 ORDER BY peminjaman.judul $order";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat</title>
     <!-- Favicons -->
    <link href="Gambar/LogoFix.png" rel="icon">
    <link href="Gambar/LogoFix.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="frontend/styles/kategori.css"/>
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="boxicons/css/boxicons.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7e6ab84ec3.js" crossorigin="anonymous"></script>
    <style>
       table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table td, table th {
            padding: 8px;
            border: 2px solid black;
        }

        table td {
            background-color: #fff;
        }

        table img {
            width: 100px;
        }

        a:hover {
            text-decoration: underline;
        }

        .add-data-link {
            margin-bottom: 10px;
        }
        .awal{
            font-weight: bold;
            background-color: aqua;
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
            Riwayat
          </h1>
        </header>
        <section>

        <?php
            session_start();
            // Koneksi ke database
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
            
            // Query untuk mengambil riwayat peminjaman
            $sql = "SELECT peminjaman.id_peminjaman, peminjaman.tanggal_peminjaman, peminjaman.status_peminjaman, buku.judul, buku.foto 
                    FROM peminjaman 
                    LEFT JOIN buku ON peminjaman.id_buku = buku.id_buku
                    WHERE peminjaman.nis = '$nis'
                    ORDER BY buku.judul $order";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo" <center>";
                echo "<table width='850' border='2' color='solid black'>
                    <tr>
                        <td class='awal'>No</td>
                        <td class='awal'>Judul<a href='?nis=$nis&sort=asc'>&#x25B2;</a> <a href='?nis=$nis&sort=desc'>&#x25BC;</a></td>
                        <td class='awal'>Foto</td>
                        <td class='awal'>Tanggal Peminjaman<a href='?nis=$nis&sort=asc'>&#x25B2;</a> <a href='?nis=$nis&sort=desc'>&#x25BC;</a></td>
                        <td class='awal'>Status</td>
                    </tr>";
                $i = 1;

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td> $i </td>";
                        echo "<td> {$row['judul']} </td>";
                        echo "<td> <img src='Gambar/{$row['foto']}' width='100' height='150'> </td>";
                        echo "<td> {$row['tanggal_peminjaman']} </td>";
                        echo "<td> {$row['status_peminjaman']} </td>";
                    echo "</tr>";
                    $i++;
                }
                echo "</table>";
                echo" </center>";
            } else {
                echo "Tidak ada data riwayat peminjaman.";
            }
            $conn->close();
        ?>
        </section>
    </main>

    <script src="frontend/libraries/jquery/jquery-3.6.3.min.js"></script>
    <script src="frontend/libraries/bootstrap/js/bootstrap.js"></script>
</body>
</html>
