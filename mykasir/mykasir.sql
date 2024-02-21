-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Feb 2024 pada 01.15
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mykasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(11) NOT NULL,
  `id_penjualan` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `id_penjualan`, `id_produk`, `jumlah_produk`, `subtotal`, `id_users`) VALUES
(1, 'PJ20240216010213', 0, 1, '3000.00', 1),
(2, 'PJ20240216010213', 0, 2, '4000.00', 1),
(3, 'PJ20240216010213', 0, 1, '3000.00', 1),
(4, 'PJ20240216010213', 0, 1, '2000.00', 1),
(6, 'PJ20240216010519', 7, 3, '6000.00', 1),
(7, 'PJ20240216010924', 7, 1, '2000.00', 1),
(8, 'PJ20240216011106', 3, 1, '3000.00', 1),
(9, 'PJ20240216032230', 7, 1, '2000.00', 1),
(10, 'PJ20240216032815', 1, 1, '2000.00', 1),
(11, 'PJ20240216032815', 7, 1, '2000.00', 1),
(12, 'PJ20240216034645', 7, 2, '4000.00', 1),
(13, 'PJ20240216034645', 1, 1, '2000.00', 1),
(14, 'PJ20240216034734', 7, 1, '2000.00', 1),
(15, 'PJ20240216034734', 3, 1, '3000.00', 1),
(16, 'PJ20240216034810', 7, 1, '2000.00', 1),
(17, 'PJ20240216034810', 2, 1, '3000.00', 1),
(18, 'PJ20240216035604', 3, 1, '3000.00', 1),
(19, 'PJ20240216035604', 2, 1, '3000.00', 1),
(20, 'PJ20240216035604', 7, 1, '2000.00', 1),
(21, 'PJ20240216035604', 1, 1, '2000.00', 1),
(22, 'PJ20240217032923', 7, 1, '2000.00', 1),
(23, 'PJ20240217032923', 2, 1, '3000.00', 1),
(24, 'PJ20240217032948', 3, 1, '3000.00', 1),
(25, 'PJ20240217033011', 1, 1, '2000.00', 1),
(26, 'PJ20240217033011', 3, 1, '3000.00', 1),
(27, 'PJ20240217033653', 3, 1, '3000.00', 1),
(28, 'PJ20240217033653', 7, 1, '2000.00', 1),
(29, 'PJ20240217033653', 1, 1, '2000.00', 1),
(30, 'PJ20240217034559', 1, 1, '2000.00', 1),
(31, 'PJ20240217034559', 7, 2, '4000.00', 1),
(32, 'PJ20240217034559', 3, 1, '3000.00', 1),
(33, 'PJ20240217035200', 7, 2, '4000.00', 1),
(34, 'PJ20240217035200', 2, 2, '6000.00', 1),
(35, 'PJ20240217035200', 1, 1, '2000.00', 1),
(36, 'PJ20240217035200', 3, 1, '3000.00', 1),
(37, 'PJ20240217035340', 1, 1, '2000.00', 1),
(38, 'PJ20240217035340', 2, 1, '3000.00', 1),
(39, 'PJ20240217035340', 3, 1, '3000.00', 1),
(40, 'PJ20240217035340', 7, 1, '2000.00', 1),
(41, 'PJ20240217040417', 2, 1, '3000.00', 1),
(42, 'PJ20240217040417', 1, 1, '2000.00', 1),
(43, 'PJ20240217040417', 3, 1, '3000.00', 1),
(44, 'PJ20240217040417', 7, 1, '2000.00', 1),
(45, 'PJ20240217040717', 7, 1, '2000.00', 1),
(46, 'PJ20240217040717', 1, 1, '2000.00', 1),
(47, 'PJ20240217040717', 3, 1, '3000.00', 1),
(48, 'PJ20240217040717', 2, 1, '3000.00', 1),
(49, 'PJ20240217043103', 1, 1, '2000.00', 1),
(50, 'PJ20240217045127', 2, 1, '3000.00', 1),
(51, 'PJ20240217045140', 3, 1, '3000.00', 1),
(52, 'PJ20240217045140', 1, 1, '2000.00', 1),
(53, 'PJ20240217062718', 3, 1, '3000.00', 1),
(54, 'PJ20240217063602', 2, 1, '3000.00', 1),
(55, 'PJ20240217063602', 1, 1, '2000.00', 1),
(56, 'PJ20240217064008', 3, 1, '3000.00', 1),
(57, 'PJ20240217064008', 1, 1, '2000.00', 1),
(58, 'PJ20240219041041', 12, 1, '3000.00', 1),
(59, 'PJ20240219135713', 16, 1, '6000.00', 1),
(60, 'PJ20240219135730', 19, 1, '8000.00', 1),
(61, 'PJ20240219135730', 14, 1, '4000.00', 1),
(62, 'PJ20240219142039', 15, 1, '6000.00', 1),
(63, 'PJ20240219142039', 13, 1, '4000.00', 1),
(64, 'PJ20240220000125', 14, 1, '4000.00', 1),
(65, 'PJ20240220000347', 22, 1, '9000.00', 1),
(66, 'PJ20240220000556', 19, 1, '8000.00', 1),
(67, 'PJ20240220000556', 14, 1, '4000.00', 1),
(68, 'PJ20240220000556', 22, 1, '9000.00', 1),
(69, 'PJ20240220022030', 19, 1, '8000.00', 1),
(70, 'PJ20240220022030', 22, 1, '9000.00', 1),
(71, 'PJ20240220155713', 12, 1, '3000.00', 1),
(72, 'PJ20240220155713', 24, 1, '3000.00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `telepon`) VALUES
(1, 'aji hambali', 'Sumedang ', '087654'),
(2, '', 'smd', '103873635'),
(3, '', 'bdg', '087352'),
(4, '', 'crj', '093625267'),
(5, 'ita', 'ckm', '0387363');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(255) NOT NULL,
  `tgl_penjualan` datetime NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl_penjualan`, `total_harga`, `id_pelanggan`) VALUES
('PJ20240216004124', '2024-02-16 00:41:24', '2.00', 0),
('PJ20240216010213', '2024-02-16 01:02:13', '2.00', 1),
('PJ20240216010225', '2024-02-16 01:02:25', '2.00', 1),
('PJ20240216010519', '2024-02-16 01:05:19', '6.00', 1),
('PJ20240216010924', '2024-02-16 01:09:24', '2.00', 1),
('PJ20240216011106', '2024-02-16 01:11:06', '3.00', 1),
('PJ20240216032230', '2024-02-16 03:22:30', '2.00', 1),
('PJ20240216032815', '2024-02-16 03:28:15', '2.00', 1),
('PJ20240216034645', '2024-02-16 03:46:45', '2.00', 1),
('PJ20240216034734', '2024-02-16 03:47:34', '3.00', 1),
('PJ20240216034810', '2024-02-16 03:48:10', '3.00', 1),
('PJ20240216035604', '2024-02-16 03:56:04', '10.00', 1),
('PJ20240217032923', '2024-02-17 03:29:23', '5.00', 1),
('PJ20240217032948', '2024-02-17 03:29:48', '3.00', 1),
('PJ20240217033011', '2024-02-17 03:30:11', '5.00', 1),
('PJ20240217033653', '2024-02-17 03:36:53', '7.00', 1),
('PJ20240217034559', '2024-02-17 03:45:59', '9.00', 1),
('PJ20240217035200', '2024-02-17 03:52:00', '15.00', 1),
('PJ20240217035340', '2024-02-17 03:53:40', '10.00', 1),
('PJ20240217040417', '2024-02-17 04:04:17', '10.00', 1),
('PJ20240217040717', '2024-02-17 04:07:17', '10.00', 1),
('PJ20240217043103', '2024-02-17 04:31:03', '2.00', 1),
('PJ20240217045127', '2024-02-17 04:51:27', '3.00', 1),
('PJ20240217045140', '2024-02-17 04:51:40', '5.00', 1),
('PJ20240217062718', '2024-02-17 06:27:18', '3.00', 1),
('PJ20240217063602', '2024-02-17 06:36:02', '5.00', 1),
('PJ20240217064008', '2024-02-17 06:40:08', '5.00', 1),
('PJ20240219041041', '2024-02-19 04:10:41', '3.00', 1),
('PJ20240219135713', '2024-02-19 13:57:13', '6.00', 1),
('PJ20240219135730', '2024-02-19 13:57:30', '12.00', 1),
('PJ20240219142039', '2024-02-19 14:20:39', '10.00', 1),
('PJ20240220000125', '2024-02-20 00:01:25', '4.00', 1),
('PJ20240220000347', '2024-02-20 00:03:47', '9.00', 1),
('PJ20240220000556', '2024-02-20 00:05:56', '21.00', 1),
('PJ20240220022030', '2024-02-20 02:20:30', '17.00', 1),
('PJ20240220155713', '2024-02-20 15:57:13', '6.00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `tgl_input`) VALUES
(12, 'Air Mineral', '3000.00', 45, '2024-02-19 10:53:00'),
(13, 'Cendol', '4000.00', 20, '2024-02-19 10:57:00'),
(14, 'Air Hujan', '4000.00', 20, '2024-02-19 10:58:00'),
(15, 'Cimory', '6000.00', 20, '2024-02-19 11:00:00'),
(18, 'Kue', '6000.00', 20, '2024-02-19 11:10:00'),
(19, 'Citato', '8000.00', 30, '2024-02-19 19:53:00'),
(20, 'mak', '9000.00', 61, '2024-02-19 19:57:00'),
(21, 'akkaak', '1500.00', 16, '2024-02-19 20:00:00'),
(23, 'Milo', '3000.00', 24, '2024-02-20 21:06:00'),
(24, 'Mie Goreng', '3000.00', 40, '2024-02-20 22:56:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `alamat`, `telpon`, `password`, `level`) VALUES
(12, 'Agis Maulana ', 'Cirebon', '09876', '$2y$10$ohro6ndeMPyOkThFtA.iDeDCTFDGgrVYLn3kvRvGfUPj1zM/ugvC.', 'administrator'),
(13, 'agis', 'ciraja', '0876', '$2y$10$6QtA0yF/nop1ROqda0ztguPBai2npMGRn2L8pkviGR7Hu2u.vsUbG', 'administrator'),
(14, 'Andri', 'Smd', '123456', '$2y$10$CdwQ53JYR5IwwdAYxIXIVOEHipglGyJ3PsukrkTblL5FmSlo9F0EC', 'administrator'),
(15, 'Maul', 'Smd', '0987665', '$2y$10$tsBEL4IZE4E6D7UIS6P/weYBRkYPrAQ76KZ7T8V.CztbS4pAyZfkS', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
