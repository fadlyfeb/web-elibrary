<?php
session_start();
include("config.php");

// Jika pengguna sudah login, arahkan ke halaman selamat datang
if (isset($_SESSION['password'])) {
    header("location: main.php");
    exit();
}
// Jika batal
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['batal'])) {
        header("Location: index.php");
        exit;
    } 
}
// Inisialisasi variabel dan pesan kesalahan
$password = $confirmPassword = $nama = $nis = $jenisKelamin = $tanggalLahir = $nomorHP = $alamat = "";
$passwordErr = $confirmPasswordErr = $namaErr = $nisErr = $jenisKelaminErr = $tanggalLahirErr = $nomorHPErr = $alamatErr = "";

// Pengecekan saat tombol register diklik
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi nama
    if (empty($_POST["nama"])) {
        $namaErr = "Nama harus diisi";
    } else {
        $nama = test_input($_POST["nama"]);
        // Periksa apakah nama hanya mengandung huruf dan spasi
        if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $namaErr = "Hanya huruf dan spasi yang diizinkan";
        }
    }

    // Validasi NIS
    if (empty($_POST["nis"])) {
        $nisErr = "NIS harus diisi";
    } else {
        $nis = test_input($_POST["nis"]);
        // Periksa apakah NIS hanya mengandung angka
        if (!preg_match("/^[0-9]*$/", $nis)) {
            $nisErr = "Hanya angka yang diizinkan";
        }
    }

    // Validasi jenis kelamin
    if (empty($_POST["jenis_kelamin"])) {
        $jenisKelaminErr = "Jenis kelamin harus dipilih";
    } else {
        $jenisKelamin = test_input($_POST["jenis_kelamin"]);
    }

    // Validasi tanggal lahir
    if (empty($_POST["tanggal_lahir"])) {
        $tanggalLahirErr = "Tanggal lahir harus diisi";
    } else {
        $tanggalLahir = test_input($_POST["tanggal_lahir"]);
        // Tambahkan validasi tanggal sesuai kebutuhan Anda
    }

    // Validasi nomor HP
    if (empty($_POST["nomor_hp"])) {
        $nomorHPErr = "Nomor HP harus diisi";
    } else {
        $nomorHP = test_input($_POST["nomor_hp"]);
        // Periksa apakah nomor HP hanya mengandung angka
        if (!preg_match("/^[0-9]*$/", $nomorHP)) {
            $nomorHPErr = "Hanya angka yang diizinkan";
        }
    }

    // Validasi alamat
    if (empty($_POST["alamat"])) {
        $alamatErr = "Alamat harus diisi";
    } else {
        $alamat = test_input($_POST["alamat"]);
    }

    // Validasi password
    if (empty($_POST["password"])) {
        $passwordErr = "Password harus diisi";
    } else {
        $password = test_input($_POST["password"]);
        // Tambahkan validasi password sesuai kebutuhan Anda, misalnya, minimal 8 karakter, harus mengandung huruf besar, huruf kecil, dan angka.
    }

    // Validasi konfirmasi password
    if (empty($_POST["confirm_password"])) {
        $confirmPasswordErr = "Konfirmasi password harus diisi";
    } else {
        $confirmPassword = test_input($_POST["confirm_password"]);
        if ($confirmPassword !== $password) {
            $confirmPasswordErr = "Konfirmasi password tidak cocok";
        }
    }

    // Jika tidak ada kesalahan validasi, lanjutkan dengan proses registrasi
    if (empty($namaErr) && empty($nisErr) && empty($jenisKelaminErr) && empty($tanggalLahirErr) && empty($nomorHPErr) && empty($alamatErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
    
        // Cek apakah NIS sudah digunakan
        $checkNisQuery = "SELECT * FROM akunuser WHERE nis = '$nis'";
        $checkNisResult = mysqli_query($conn, $checkNisQuery);
        if (mysqli_num_rows($checkNisResult) > 0) {
            setcookie("message", "NIS sudah dipakai", time()+60);
            header("location: index.php#popupRegisUser");
        }
        else {
            // Tambahkan data ke tabel akunuser
            $insertQuery = "INSERT INTO akunuser (nama, nis, jenis_kelamin, tanggal_lahir, nomor_hp, alamat, pass) VALUES ('$nama', '$nis', '$jenisKelamin', '$tanggalLahir', '$nomorHP', '$alamat', '$password')";
            if (mysqli_query($conn, $insertQuery)) {
                $_SESSION['nama'] = $nama;
                header("location: index.php#popupForm");
                exit();
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }
    }
}

// Fungsi untuk membersihkan dan memvalidasi data input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>