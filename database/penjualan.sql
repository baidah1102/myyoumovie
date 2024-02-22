-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Feb 2024 pada 01.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` int(50) NOT NULL,
  `nama_film` varchar(50) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `trailer` varchar(100) NOT NULL,
  `teater` int(2) NOT NULL,
  `harga` int(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `nama_film`, `sinopsis`, `trailer`, `teater`, `harga`, `gambar`) VALUES
(1, 'RAYA AND THE LAST DRAGON', 'Dahulu kala, di dunia fantasi Kumandra, manusia dan naga hidup bersama secara harmonis. Namun, ketika monster jahat yang dikenal sebagai Druun mengancam daratan, para naga mengorbankan diri mereka untuk menyelamatkan umat manusia. Sekarang, 500 tahun kemudian, monster yang sama telah kembali, dan seorang prajurit hadir untuk mencari naga terakhir dan menghentikan Druun untuk selamanya.', 'https://youtu.be/1VIZ89FEjYI?si=w5nrSr65cYGgvb6O', 1, 45000, 'raya.jpg'),
(2, 'BEAUTY AND THE BEAST', '', '', 1, 45000, 'beauty.jpg'),
(3, 'INSIDE OUT', '', '', 1, 45000, 'inside.jpg'),
(4, 'MOANA', '', '', 1, 45000, 'moana.jpg'),
(5, 'MONSTERS,Inc', '', '', 2, 50000, 'monster.jpg'),
(6, 'ELEMENTAL', '', '', 2, 50000, 'elemental.jpg'),
(7, 'ZOOTOPIA', '', '', 2, 50000, 'zootopia.jpg'),
(8, 'GOOSEBUMPS', '', '', 2, 50000, 'goosebumps.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `teater` int(11) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `user_id`, `id_film`, `harga`, `teater`, `waktu`, `jumlah`, `total`) VALUES
(120001, 101001, 1, 45000, 1, '12:00', 1, 45000),
(120002, 101003, 1, 45000, 1, '', 0, 0),
(120003, 101003, 1, 45000, 1, '', 0, 0),
(120004, 101003, 1, 45000, 1, '08:00', 3, 135000),
(120005, 101003, 2, 45000, 1, '12:00', 2, 90000),
(120006, 101003, 3, 45000, 1, '08:00', 2, 90000),
(120007, 101004, 3, 45000, 1, '12:00', 4, 180000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(254) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `token` char(128) DEFAULT NULL,
  `role` enum('admin','anggota','','') NOT NULL DEFAULT 'anggota',
  `last_login` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `email`, `token`, `role`, `last_login`) VALUES
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ASEP SR', 'Laki-Laki', '2024-01-02', 'medan', 'admin@mod.com', 'c0e024d9200b5705bc4804722636378a', 'admin', '2024-01-31 16:13:21'),
(101001, 'asep', '202cb962ac59075b964b07152d234b70', 'Asep Saipul Rahman', 'Laki-Laki', '2024-01-11', 'medan', 'awas@m.com', '3f8941b18eae437f3dbcefbb86035983', 'admin', '2024-02-01 10:43:32'),
(101002, 'user1', '202cb962ac59075b964b07152d234b70', 'baid', ' perempuan', '2024-02-20', 'medan', 'mail@mail.com', '756d85636bddeec0fed47f20435bbf4c', 'anggota', '2024-02-01 12:04:29'),
(101003, 'asepwa', '202cb962ac59075b964b07152d234b70', 'awaaa', 'Laki-Laki', '2023-02-09', 'medan', '9197@gmail.com', 'f4b104a36e16fb6223712ceae34cb09d', 'anggota', '2024-02-01 13:41:09'),
(101004, 'user134', '81dc9bdb52d04dc20036dbd8313ed055', 'Aiwan', 'Perempuan', '2000-09-09', 'binjai kota', 'aiwa@mail.com', 'c389abb02f84c7724e64c41330340b8d', 'anggota', '2024-02-19 19:51:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_film` (`id_film`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120008;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101005;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
