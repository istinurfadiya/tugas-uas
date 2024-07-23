-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2024 pada 04.44
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_kampus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `kodeanggota` varchar(5) NOT NULL,
  `namaanggota` varchar(50) DEFAULT NULL,
  `jeniskelamin` varchar(15) DEFAULT NULL,
  `alamatanggota` varchar(60) DEFAULT NULL,
  `tlpanggota` int(32) NOT NULL,
  `tempatlahir` varchar(20) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`kodeanggota`, `namaanggota`, `jeniskelamin`, `alamatanggota`, `tlpanggota`, `tempatlahir`, `tgllahir`) VALUES
('A01', 'anggota satu', 'laki-laki', 'alamat satu', 0, 'tempat satu', '2024-07-01'),
('A02', 'anggota dua', 'perempuan', 'alamt dua', 0, 'alamat dua', '2024-07-02'),
('A03', 'anggota tiga', 'laki-laki', 'alamt tiga', 0, 'alamat tiga', '2024-07-03'),
('A04', 'anggota empat', 'perempuan', 'alamta empat', 0, 'tempat empat', '2024-07-04'),
('A05', 'anggota lima', 'laki-laki', 'alamat lima', 0, 'tempat lima', '2024-07-05'),
('A06', 'anggota enam', 'perempuan', 'alamta enam', 0, 'tempat enam', '2024-07-06'),
('A07', 'anggota tujuh', 'laki-laki', 'alamat tujuh', 0, 'tempat tujuh', '2024-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `judulbuku` varchar(70) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `kodepenulis` varchar(3) NOT NULL,
  `kodepenerbit` varchar(3) NOT NULL,
  `kodekategori` varchar(2) NOT NULL,
  `tglterbit` date NOT NULL,
  `jmlhhalaman` int(3) NOT NULL,
  `kodebuku` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`judulbuku`, `isbn`, `kodepenulis`, `kodepenerbit`, `kodekategori`, `tglterbit`, `jmlhhalaman`, `kodebuku`) VALUES
('judul ', 'semilan', 'P03', 'T02', 'K3', '2024-07-09', 2, '9'),
('judul empat', 'empat', 'P04', 'T01', 'K4', '2024-07-04', 3, 'empat'),
('judul tiga', 'tig', 'P03', 'T03', 'K3', '2024-07-03', 1, 'tiga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `kodetransaksi` int(5) NOT NULL,
  `kodebuku` varchar(5) NOT NULL,
  `tglpinjam` date NOT NULL,
  `jumlahbuku` int(2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tglkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`kodetransaksi`, `kodebuku`, `tglpinjam`, `jumlahbuku`, `status`, `tglkembali`) VALUES
(12, 'empat', '2024-07-03', 45, 'aktiv', '2024-07-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kodekategori` varchar(2) NOT NULL,
  `namakategori` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kodekategori`, `namakategori`) VALUES
('K2', 'kategori dua'),
('K3', 'kategori tiga'),
('K4', 'kategori empat'),
('K5', 'kategori lima'),
('KI', 'kategori satu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mastertransaksi`
--

CREATE TABLE `mastertransaksi` (
  `kodetransaksi` int(5) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `kodeanggota` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mastertransaksi`
--

INSERT INTO `mastertransaksi` (`kodetransaksi`, `tgltransaksi`, `kodeanggota`) VALUES
(1, '2024-01-13', 'A01'),
(2, '2024-07-16', 'A02'),
(3, '2024-07-03', 'A03'),
(4, '2024-07-04', 'A04'),
(5, '2024-07-05', 'A05'),
(6, '0000-00-00', 'A06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `kodepenerbit` varchar(3) NOT NULL,
  `namapenerbit` varchar(50) DEFAULT NULL,
  `alamatpenerbit` varchar(80) DEFAULT NULL,
  `tlppenerbit` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`kodepenerbit`, `namapenerbit`, `alamatpenerbit`, `tlppenerbit`) VALUES
('T01', 'penertbit sat', 'alamat sat', '087775237016'),
('T02', 'penertbit dua', 'alamat dua', '087654789231'),
('T03', 'penertbit tiga', 'alamat tiga', '087398756431');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis`
--

CREATE TABLE `penulis` (
  `kodepenulisan` varchar(3) NOT NULL,
  `namapenulis` varchar(50) DEFAULT NULL,
  `alamatpenulis` varchar(60) DEFAULT NULL,
  `telppenulis` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penulis`
--

INSERT INTO `penulis` (`kodepenulisan`, `namapenulis`, `alamatpenulis`, `telppenulis`) VALUES
('23', 's', 'df', '234'),
('657', 'jnnvvk', 'mcmvmvlm', '0998'),
('P03', 'Penulis tig', 'alamat tiga', '17682826'),
('P04', 'Penulis empat', 'alamat empat', '176097989');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `gambar_barang` varchar(100) NOT NULL,
  `stok_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `nama_barang`, `gambar_barang`, `stok_barang`) VALUES
(10, 'buku sejrah islam', 'th_21.jpg', 7),
(11, 'sejarah majapahit', 'th_22.jpg', 21),
(12, 'buku sejarah manusia', 'th_15.jpg', 23),
(13, 'buku tentang sejarah', 'th_14.jpg', 45),
(14, 'sejarah indonesia ', 'th_13.jpg', 34),
(15, 'filsafat islam', 'th_6.jpg', 32),
(16, 'filsafat umum', 'th_5.jpg', 24),
(17, 'filosofi teras', 'th_(2).jpg', 45),
(18, 'flsafat ilmu', 'th2.jpg', 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `peminjam` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_request`
--

INSERT INTO `tbl_request` (`id`, `nama_barang`, `peminjam`, `level`, `jml_barang`, `tgl_pinjam`, `tgl_kembali`) VALUES
(1, 'Terminal', 'bambang subroto', 'nama', 1, '03 Juli 2024 - 05:45 ', '04 Juli 2024 - 10:50 '),
(2, 'sejarah indonesia ', 'bambang subroto', 'fkjfkeflekf', 54, '03 Juli 2024 - 05:25 ', '02 Juli 2024 - 08:40 '),
(3, 'buku sejrah islam', 'admin', 'siswa', 76, '03 Juli 2024 - 09:00 ', '10 Juli 2024 - 10:00 '),
(4, 'buku sejrah islam', 'mansur@gmail.com', 'siswa', 12, '03 Juli 2024 - 09:55 ', '01 Juli 2024 - 08:40 '),
(5, 'buku sejrah islam', 'mansur@gmail.com', 'siswa', 12, '03 Juli 2024 - 09:55 ', '01 Juli 2024 - 08:40 '),
(6, 'buku sejrah islam', 'mansur@gmail.com', 'siswa', 12, '03 Juli 2024 - 09:55 ', '01 Juli 2024 - 08:40 '),
(7, 'buku tentang sejarah', 'mansur', 'siswa', 3, '02 Juli 2024 - 08:40 ', '04 Juli 2024 - 10:45 ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(1100) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `role` enum('admin','mahasiswa') NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `nim`, `prodi`, `role`, `password`, `username`) VALUES
(2, 'rohani', 'rohani@gmail.com', 'SI19220033', 'SISTEM INFORMASI', 'admin', '21232f297a57a5a743894a0e4a801fc3', ''),
(5, 'maymunah', 'munah@gmail.com', 'SI19220043', 'sistem informasi', '', '202cb962ac59075b964b07152d234b70', ''),
(6, 'sonia', 'sonia@gmail.com', 'SI19220032', 'sistem informasi', '', '99c5e07b4d5de9d18c350cdf64c5aa3d', ''),
(7, 'lisa', 'amel@gmail.com', 'SI19220029', 'si', '', '0ef174fc614c8d61e2d63329ef7f46c0', ''),
(8, 'lisa', 'amel@gmail.com', 'SI19220029', 'si', '', '0ef174fc614c8d61e2d63329ef7f46c0', ''),
(9, 'mn', 'mansur.@gmail.com', 'si17200026', 'sistem informasi', '', 'af0ba11942d932e2dcfe5aee0857f775', ''),
(10, 'adi', 'mansur.@gmail.com', 'si17200026', 'sistem informasi', '', 'af0ba11942d932e2dcfe5aee0857f775', ''),
(11, 'mansur', 'mansur.@gmail.com', 'si17200026', 'sistem informasi', 'admin', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(12, 'mansur', 'mansur.@gmail.com', 'si17200026', 'sistem informasi', 'admin', 'af0ba11942d932e2dcfe5aee0857f775', ''),
(13, 'mansur', 'mansur.@gmail.com', 'si17200026', 'sistem informasi', 'admin', 'af0ba11942d932e2dcfe5aee0857f775', ''),
(14, 'admin', 'akud@gmail.com', 'si17200026', 'sistem informasi', 'admin', '21232f297a57a5a743894a0e4a801fc3', ''),
(15, 'lisa', 'dia@gmail.com', 'si17200026', '', '', '465b1f70b50166b6d05397fca8d600b0', ''),
(16, 'mansur', 'mansur@gmail.com', 'si17200026', '', '', 'bcd724d15cde8c47650fda962968f102', ''),
(17, 'mansur', 'mansur@gmail.com', 'si17200026', '', '', '6fd80956c10ddff952b27b10f19caaef', ''),
(18, 'mansur', '', '', '', 'admin', '6fd80956c10ddff952b27b10f19caaef', ''),
(19, 'isti', 'isti@gmail.com', 'si17200026', '', '', 'b518d60581cfcd1c861145739d4666d6', ''),
(21, 'isti', 'mansur@gmail.com', 'si17200026', 'sistem informasi', '', 'af0ba11942d932e2dcfe5aee0857f775', ''),
(22, 'isti', 'mn@gmail.com', 'si17200026', 'sistem informasi', '', '412566367c67448b599d1b7666f8ccfc', ''),
(23, 'isti', 'mn@gmail.com', 'si17200026', 'sistem informasi', '', '412566367c67448b599d1b7666f8ccfc', ''),
(24, 'isti', 'mn@gmail.com', 'si17200026', 'sistem informasi', '', '412566367c67448b599d1b7666f8ccfc', ''),
(25, 'adi', 'adi@gmail.com', 'admin', 'sistem informasi', '', 'c46335eb267e2e1cde5b017acb4cd799', ''),
(26, 'oke', 'oke@gmail.com', 'si17200026', 'teknik informatika', '', '0079fcb602361af76c4fd616d60f9414', ''),
(27, 'mansur', 'oke@gmail.com', 'si17200026', 'sistem informasi', '', '465b1f70b50166b6d05397fca8d600b0', ''),
(28, 'dimana', 'dimana@gmail.com', 'si2514224', 'teknik informatika', '', '56a85ec25d3e838399c1acf232f957a4', ''),
(29, 'adi', 'mansurstmik716@gmail.com', 'si17200026', 'sistem informasi', '', 'af0ba11942d932e2dcfe5aee0857f775', 'mansur'),
(30, 'mansur', 'mansurstmik716@gmail.com', 'si17200026', 'Sistem Informasi', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`kodeanggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kodebuku`),
  ADD KEY `kategori` (`kodekategori`),
  ADD KEY `penulis` (`kodepenulis`),
  ADD KEY `penerbit` (`kodepenerbit`);

--
-- Indeks untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`kodetransaksi`),
  ADD KEY `buku` (`kodebuku`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kodekategori`);

--
-- Indeks untuk tabel `mastertransaksi`
--
ALTER TABLE `mastertransaksi`
  ADD PRIMARY KEY (`kodetransaksi`),
  ADD KEY `master` (`kodeanggota`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`kodepenerbit`);

--
-- Indeks untuk tabel `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`kodepenulisan`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `kodetransaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `mastertransaksi`
--
ALTER TABLE `mastertransaksi`
  MODIFY `kodetransaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`kodekategori`) REFERENCES `kategori` (`kodekategori`),
  ADD CONSTRAINT `penerbit` FOREIGN KEY (`kodepenerbit`) REFERENCES `penerbit` (`kodepenerbit`),
  ADD CONSTRAINT `penulis` FOREIGN KEY (`kodepenulis`) REFERENCES `penulis` (`kodepenulisan`);

--
-- Ketidakleluasaan untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `buku` FOREIGN KEY (`kodebuku`) REFERENCES `buku` (`kodebuku`);

--
-- Ketidakleluasaan untuk tabel `mastertransaksi`
--
ALTER TABLE `mastertransaksi`
  ADD CONSTRAINT `master` FOREIGN KEY (`kodeanggota`) REFERENCES `anggota` (`kodeanggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
