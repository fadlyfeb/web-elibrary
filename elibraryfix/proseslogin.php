<?php
    // session dimulai
    session_start();
    include("config.php");
    if (isset($_POST['login'])) {
        $nisnip = $_POST['nisnip'];
        $password = $_POST['password'];

        if ($nisnip != '' && $password != '') {
            // query untuk mengecek apakah ada data user dengan nis/nip dan password yang dikirim dari form
            $sqluser = "SELECT * FROM akunuser WHERE nis='$nisnip' AND pass='$password'";
            $sqladmin = "SELECT * FROM akunadmin WHERE nip='$nisnip' AND pass='$password'";
            $queryuser = mysqli_query($conn, $sqluser);
            $queryadmin = mysqli_query($conn, $sqladmin);
            $datauser = mysqli_fetch_assoc($queryuser); // ambil data dari hasil query
            $dataadmin = mysqli_fetch_assoc($queryadmin); // ambil data dari hasil query

            if (mysqli_num_rows($queryuser) < 1 && mysqli_num_rows($queryadmin) < 1) {
                // buat sebuah cookie untuk menampung data pesan kesalahan
                setcookie("message", "Maaf, NIS/NIP atau password salah", time() + 3);
                header("location: index.php#popupForm"); // redirect ke halaman login.php
            } else {
                if ($dataadmin['nip'] == $nisnip && $dataadmin['pass'] == $password) {
                    $_SESSION['nisnip'] = $dataadmin['nip'];
                    $_SESSION['nama'] = $dataadmin['nama'];
                    header("location: dashboardadmin.php");
                } else {
                    $_SESSION['nisnip'] = $datauser['nisnip'];
                    $_SESSION['nama'] = $datauser['nama'];
                    $_SESSION['nisnip'] = $nisnip;
                    header("location: main.php?nisnip=$nisnip");
                }
            }
        } else {
            setcookie("message", "*NIS/NIP atau Password kosong", time() + 30);
            header("location: index.php#popupForm"); // redirect ke halaman login.php
        }
    }
?>
