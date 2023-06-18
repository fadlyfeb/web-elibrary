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
$id_buku = $_SESSION['id_buku'];

// Ambil data dari permintaan AJAX
$data = json_decode(file_get_contents("php://input"));

// Ekstrak data
$idPeminjaman = $data->idPeminjaman;
$nis = $data->nis;
$tglPeminjaman = $data->tglPeminjaman;

// Query INSERT untuk menyimpan data ke dalam tabel peminjaman
$query = "INSERT INTO peminjaman (id_peminjaman, nis, id_buku, tanggal_peminjaman, status_peminjaman) 
          VALUES ('$idPeminjaman', '$nis', '$id_buku', '$tglPeminjaman', 'peminjaman')";

$result = mysqli_query($conn, $query);

if ($result) {
    // Berhasil menyimpan peminjaman
    $response = array("success" => true);
} else {
    // Gagal menyimpan peminjaman
    $response = array("success" => false);
}

// Mengembalikan tanggapan sebagai JSON
echo json_encode($response);
?>
