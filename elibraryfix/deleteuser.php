<?php
session_start();

$host = 'localhost';  // Ganti sesuai host database Anda
$username = 'root';  // Ganti sesuai username database Anda
$password = '';  // Ganti sesuai password database Anda
$database = 'elibrary';  // Ganti sesuai nama database Anda

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$nisnip = $_SESSION['nisnip'];

$query = "DELETE FROM akunuser WHERE nis = '$nisnip'";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($connection));
}

mysqli_close($connection);
echo '<script>window.location.replace("index.php");</script>';
// Setelah menghapus akun, arahkan ke halaman index.php
header("Location: index.php");
exit();
?>