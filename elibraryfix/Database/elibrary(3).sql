-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2023 pada 16.16
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elibrary`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akunadmin`
--

CREATE TABLE `akunadmin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nip` char(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akunadmin`
--

INSERT INTO `akunadmin` (`id_admin`, `nama`, `nip`, `jenis_kelamin`, `tanggal_lahir`, `nomor_hp`, `alamat`, `pass`) VALUES
(1, 'kiki', '0987654321', 'Laki-Laki', '2003-02-10', '089', 'jalan2', 'kiki'),
(2, 'udin', '123', 'Laki-Laki', '2003-02-10', '123', 'jalan', '123'),
(4, 'rizki', '7890', 'Laki-Laki', '2023-05-11', '089', 'fatmawati', '123456'),
(5, 'elsa', '2110', 'Perempuan', '2023-06-03', '089', 'pondok', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akunuser`
--

CREATE TABLE `akunuser` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nis` char(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akunuser`
--

INSERT INTO `akunuser` (`id_user`, `nama`, `nis`, `jenis_kelamin`, `tanggal_lahir`, `nomor_hp`, `alamat`, `pass`) VALUES
(1, 'rizki123', '123', 'Laki-Laki', '2010-01-29', '123', 'jalan', 'rizki123'),
(2, 'alucard', '22', 'Laki-Laki', '2023-05-02', '2', 'da', 'rizki123'),
(3, 'alucard', '222', 'Laki-Laki', '2023-05-02', '123', 'e', 'rizki123'),
(4, 'udin', '3333', 'Laki-Laki', '2023-05-29', '123', 'd', 'rizki123'),
(5, 'udin', '1234567890', 'Laki-Laki', '2003-02-10', '088', 'jalanjalan', 'udin'),
(6, 'tur', '321', 'Perempuan', '2003-02-10', '123', 'jalankemana', '123'),
(9, 'faturia', '123456', 'Laki-Laki', '2023-06-07', '089590', 'pondok labu', 'fatur123'),
(10, 'fadly', '211', 'Laki-Laki', '2023-06-01', '098', 'kampung', '123'),
(11, 'elsaa', '21100', 'Laki-Laki', '2023-06-01', '098', 'pondok', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` char(7) NOT NULL,
  `id_kategori` char(7) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(10) NOT NULL,
  `jumlah_halaman` varchar(5) NOT NULL,
  `stok` int(5) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `stok`, `deskripsi`, `foto`) VALUES
('BUK0001', 'KTGI001', 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'Harper', '2014', '443', 9, 'Buku ini menggambarkan perjalanan panjang manusia mulai dari zaman prasejarah hingga era modern. Dengan bahasa yang menarik dan penelitian yang mendalam, Harari mengajak pembaca memahami perubahan besar dalam sejarah manusia dan dampaknya terhadap perkembangan sosial, budaya, dan teknologi.', 'coverbuku1.jpeg'),
('BUK0002', 'KTGI003', 'Design Patterns: Elements of Reusable Object-Oriented Software', 'Erich Gamma, Richard Helm, Ralph Johnson, dan John Vlissides', 'Addison-Wesley Professional', '1994', '395', 8, 'Buku ini mengenalkan pola-pola desain yang dapat digunakan dalam pengembangan perangkat lunak berbasis objek. Penulis, yang dikenal sebagai Gang of Four (GoF), menyajikan solusi-solusi yang teruji dan terbukti untuk masalah umum dalam pengembangan perangkat lunak. Buku ini membantu pembaca memahami prinsip-prinsip desain yang baik dan meningkatkan keahlian dalam merancang sistem yang lebih fleksibel dan mudah dimodifikasi.', 'coverbuku12.jpg'),
('BUK0003', 'KTGI002', 'The Ethics', 'Baruch Spinoza', 'Penguin Classics', '1677', '368', 0, 'Buku ini merupakan salah satu karya penting dalam sejarah filsafat etika. Spinoza mengembangkan sistem etika rasional yang didasarkan pada konsep-konsep seperti substansi, atribut, dan kebahagiaan. Dia mengeksplorasi hubungan antara pikiran, tubuh, dan emosi manusia, serta pentingnya pemahaman yang benar untuk mencapai kebebasan dan kebahagiaan yang sejati.', 'coverbuku6.jpg'),
('BUK0004', 'KTGI001', 'A Brief History of Time', 'Stephen Hawking', 'Bantam Books', '1988', '212', 10, 'Buku ini menjelaskan konsep-konsep kompleks dalam fisika dan kosmologi secara jelas dan menarik. Hawking membahas topik seperti asal-usul alam semesta, lubang hitam, dan teori segala-galanya. Dengan gaya penulisan yang mudah dipahami, buku ini menjadi panduan populer bagi pembaca yang ingin memahami dasar-dasar fisika dan perkembangan pemikiran ilmiah.', 'coverbuku4.jpg'),
('BUK0005', 'KTGI002', 'Being and Time', 'Martin Heidegger', 'Harper Perennial Modern Classics', '1927', '592', 10, 'Buku ini merupakan karya monumental dari filsuf Jerman, Martin Heidegger. Melalui analisis mendalam tentang eksistensi manusia, Heidegger membahas konsep-konsep seperti keberadaan, waktu, dan kebenaran. Dalam gaya penulisan yang kompleks namun kaya, buku ini mengajak pembaca untuk merenungkan makna hidup, relasi manusia dengan dunia, dan signifikansi keberadaan.', 'coverbuku5.jpg'),
('BUK0006', 'KTGI001', 'Sapiens: From Animals into Gods', 'Yuval Noah Harari', 'Vintage Books', '2018', '400', 10, 'Buku ini merupakan kelanjutan dari buku \"Sapiens\" yang mengupas evolusi manusia dari segi budaya, agama, dan pemerintahan. Harari menganalisis bagaimana manusia berhasil menciptakan sistem kompleks yang membentuk peradaban seperti yang kita kenal hari ini. Dengan gaya tulisan yang menggugah, buku ini mengajak pembaca untuk melihat peran manusia dalam sejarah dan masa depan.', 'coverbuku3.jpg'),
('BUK0007', 'KTGI003', 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 'Prentice Hall', '2008', '464', 9, 'Buku ini membahas pentingnya menulis kode yang bersih, mudah dimengerti, dan mudah dirawat. Martin menggambarkan prinsip-prinsip desain dan praktik yang membantu pengembang perangkat lunak menghasilkan kode yang berkualitas tinggi. Dengan contoh kode nyata dan penjelasan yang jelas, buku ini memandu pembaca menuju pemahaman yang lebih baik tentang seni menulis kode yang baik.', 'coverbuku10.jpg'),
('BUK0008', 'KTGI002', 'Simulacra and Simulation', 'Jean Baudrillard', 'University of Michigan Press', '1981', '164', 10, 'Buku ini mengeksplorasi konsep-konsep seperti realitas, representasi, dan simulasi dalam masyarakat kontemporer. Baudrillard mengajukan argumen bahwa kita hidup dalam dunia di mana perbedaan antara realitas dan imitasi semakin samar.', 'coverbuku8.jpg'),
('BUK0009', 'KTGI003', 'The Pragmatic Programmer: Your Journey to Mastery', 'Andrew Hunt dan David Thomas', 'Addison-Wesley Professional', '1999', '352', 10, 'Buku ini memberikan wawasan praktis dan berharga bagi pengembang perangkat lunak. Dengan fokus pada prinsip-prinsip dan praktik terbaik, Hunt dan Thomas memberikan panduan yang sangat berguna untuk meningkatkan keahlian dalam pemrograman dan pemecahan masalah. Buku ini mengajarkan cara berpikir kritis dan efektif dalam pengembangan perangkat lunak.', 'coverbuku9.jpg'),
('BUK0010', 'KTGI002', 'Beyond Good and Evil', 'Friedrich Nietzsche', 'Penguin Classics', '1886', '240', 10, 'Buku ini mengajukan pertanyaan tentang moralitas dan nilai-nilai yang diterima secara konvensional. Nietzsche menantang pemikiran tradisional tentang baik dan jahat, menekankan pentingnya kebebasan dan kemandirian dalam menentukan nilai-nilai. Dalam karyanya yang kontroversial ini, Nietzsche mendorong kita untuk melampaui konsep-konsep yang telah ditetapkan dan mempertanyakan landasan moral kita.', 'coverbuku7.jpg'),
('BUK0011', 'KTGI003', 'Introduction to the Theory of Computation', 'Michael Sipser', 'Cengage Learning', '2012', '504', 10, 'Buku ini memberikan pengantar yang komprehensif tentang teori komputasi, termasuk otomata, bahasa formal, dan kompleksitas komputasional. Sipser menjelaskan konsep-konsep ini dengan cara yang jelas dan terstruktur, menjadikan buku ini sebagai bahan referensi yang sangat baik bagi mahasiswa dan profesional di bidang ilmu komputer.', 'coverbuku11.jpg'),
('BUK0012', 'KTGI001', 'The Guns of August', 'Barbara W. Tuchman', 'Ballantine Books', '1962', '511', 9, 'Buku ini mengulas peristiwa penting di awal Perang Dunia I, khususnya pada bulan Agustus 1914. Tuchman menyoroti keputusan politik, pertempuran militer, dan dinamika di balik konflik global yang mendebarkan ini. Dengan gaya narasi yang memikat, buku ini memberikan wawasan mendalam tentang kegagalan diplomasi dan perang yang mengubah dunia.', 'coverbuku2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(7) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KTGI001', 'Sejarah'),
('KTGI002', 'Filsafat'),
('KTGI003', 'Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` char(6) NOT NULL,
  `nis` char(10) NOT NULL,
  `id_buku` char(7) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `status_peminjaman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nis`, `id_buku`, `tanggal_peminjaman`, `status_peminjaman`) VALUES
('055308', '123', 'BUK0002', '2023-06-08', 'telat dikembalikan'),
('131460', '123', 'BUK0006', '2023-06-09', 'dikembalikan'),
('142524', '123', 'BUK0006', '2023-06-09', 'dikembalikan'),
('288059', '123', 'BUK0001', '2023-06-08', 'dikembalikan'),
('326531', '123', 'BUK0001', '2023-06-08', 'dikembalikan'),
('369247', '123', 'BUK0001', '2023-07-01', 'peminjaman'),
('469580', '123', 'BUK0001', '2023-06-23', 'dikembalikan'),
('487692', '123', 'BUK0012', '2023-07-08', 'peminjaman'),
('507549', '123', 'BUK0001', '2023-06-08', 'peminjaman'),
('540018', '123', 'BUK0003', '2023-07-01', 'peminjaman'),
('553802', '123456', 'BUK0002', '2023-06-22', 'peminjaman'),
('617325', '123', 'BUK0001', '2023-06-08', 'peminjaman'),
('686863', '21100', 'BUK0002', '2023-06-29', 'peminjaman'),
('701418', '123', 'BUK0002', '2023-06-08', 'telat dikembalikan'),
('856825', '123', 'BUK0001', '2023-06-24', 'peminjaman'),
('895374', '123', 'BUK0007', '2023-06-24', 'peminjaman');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `kurangStok` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET stok = stok - 1 where id_buku = NEW.id_buku;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akunadmin`
--
ALTER TABLE `akunadmin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `akunuser`
--
ALTER TABLE `akunuser`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akunadmin`
--
ALTER TABLE `akunadmin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `akunuser`
--
ALTER TABLE `akunuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
