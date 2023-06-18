<?php
session_start();


// Koneksi ke database dan ambil data siswa berdasarkan NISNIP
$host = 'localhost';  // Ganti sesuai host database Anda
$username = 'root';  // Ganti sesuai username database Anda
$password = '';  // Ganti sesuai password database Anda
$database = 'elibrary';  // Ganti sesuai nama database Anda

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$nisnip = $_SESSION['nisnip'];

$query = "SELECT * FROM akunuser WHERE nis = '$nisnip'";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama = $row['nama'];
    $jenis_kelamin = $row['jenis_kelamin'];
    $tanggal_lahir = $row['tanggal_lahir'];
    $nomor_hp = $row['nomor_hp'];
    $alamat = $row['alamat'];
    $pass = $row['pass'];

} else {
    $name = "N/A";
    $email = "N/A";
}
if (!$result) {
    die("Query gagal: " . mysqli_error($connection));
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
     <!-- Favicons -->
     <link href="Gambar/LogoFix.png" rel="icon">
    <link href="Gambar/LogoFix.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css"/>
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="frontend/styles/profile.css"/>
    <script src="https://kit.fontawesome.com/7e6ab84ec3.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
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
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-8 mx-auto ">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header text-center">Detail Akun</div>
                        <div class="card-body">
                            <form class="">
                                <!-- Form Group (Nama)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNama">Nama</label>
                                    <input class="form-control" id="inputNama" type="text" placeholder="<?php echo $nama?>" readonly>
                                </div>
                                <!-- Form Group (NIS)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNis">NIS</label>
                                    <input class="form-control" id="inputNis" type="text" placeholder="<?php echo $_SESSION['nisnip']; ?>" readonly>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Jenis Kelamin)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputJenisKelamin">Jenis Kelamin</label>
                                        <input class="form-control" id="inputJenisKelamin" type="text" placeholder="<?php echo $jenis_kelamin?>" readonly>
                                    </div>
                                    <!-- Form Group (Tanggal Lahir)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputTanggalLahir">Tanggal Lahir</label>
                                        <input class="form-control" id="inputTanggalLahir" type="text" placeholder="<?php echo $tanggal_lahir ?>" readonly>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNomorHp">Nomor HP</label>
                                    <input class="form-control" id="inputNomorHp" type="text" placeholder="<?php echo $nomor_hp?>" readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputAlamat">Alamat</label>
                                    <input class="form-control" id="inputAlamat" type="text" placeholder="<?php echo $alamat?>" readonly>
                                </div>

                                <div class="mb-3">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control" id="inputPassword" type="password" name="Password" placeholder="<?php echo $pass ?>" readonly>
                                    </div>
                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="button" onclick="window.location.href='updateakunuser.php'">Edit</button>
                                    <button class="btn btn-primary" type="button" onclick="deleteUser()">Hapus Akun</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="frontend/libraries/jquery/jquery-3.6.3.min.js"></script>
    <script src="frontend/libraries/bootstrap/js/bootstrap.js"></script>
    <script>
    function deleteUser() {
        if (confirm("Apakah Anda yakin ingin menghapus akun?")) {
            // Mengirim permintaan penghapusan ke file PHP yang akan menghapus akun dari database
            window.location.href = 'deleteuser.php';
        }
    }

    // Mencegah pengguna kembali ke halaman sebelumnya setelah menghapus akun
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>


</body>
</html>
