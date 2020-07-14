-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 05:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'abang', 'ucup', '1');

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nama_peminjam` varchar(40) NOT NULL,
  `alamat_peminjam` text DEFAULT NULL,
  `telepon_peminjam` varchar(14) NOT NULL,
  `username_peminjam` varchar(100) NOT NULL,
  `password_peminjam` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `nama_peminjam`, `alamat_peminjam`, `telepon_peminjam`, `username_peminjam`, `password_peminjam`) VALUES
(1, 'maulana', 'pengasinan', '01231', 'maul', '1'),
(3, 'yusuf', 'desa', '124124', 'yus', '1');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id_peminjaman_buku` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan`
--

CREATE TABLE `perpustakaan` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(250) NOT NULL,
  `harga_buku` float NOT NULL,
  `pengarang` varchar(10) NOT NULL,
  `stok_buku` float NOT NULL,
  `foto_buku` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perpustakaan`
--

INSERT INTO `perpustakaan` (`id_buku`, `nama_buku`, `harga_buku`, `pengarang`, `stok_buku`, `foto_buku`) VALUES
(9, 'milea (Suara dari Dilan)', 132000, 'Didi Bariq', 10, 'milea.jpg'),
(13, 'Laskar Pelangi', 151000, 'Andrea Hir', 10, 'laskar pelangi.jpg'),
(14, 'Romansa Dibawah Langit', 190000, 'Erviandyp', 10, 'romansa dibawah langit.jpg'),
(15, 'Rumah Tanpa Jendela', 134000, 'Asma Nadia', 10, 'rumah tanpa jendela.jpg'),
(16, 'Rahvayana ( Aku Lala Padamu)', 123000, 'Sujiwo Tej', 10, 'rahvayana ( aku lala padamu).jpg'),
(17, 'Critical Eleven', 75000, 'Ika Natass', 10, 'critical eleven.jpg'),
(18, '5cm', 95000, 'Donny Dhir', 10, '5cm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id_peminjaman` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` float NOT NULL,
  `total_bayar` float NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `lama_pinjam` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `kode_peminjaman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`id_peminjaman`, `id_peminjam`, `id_waktu`, `id_buku`, `jumlah`, `total_bayar`, `tanggal_pinjam`, `lama_pinjam`, `tarif`, `kode_peminjaman`) VALUES
(1, 3, 1, 0, 1, 10100, '2020-04-23', '1 hari', 10000, ''),
(2, 3, 1, 3, 1, 85000, '2020-04-23', '', 10000, ''),
(3, 3, 1, 1, 1, 10100, '2020-04-23', '', 10000, ''),
(4, 3, 1, 1, 1, 10100, '2020-04-23', '', 10000, ''),
(5, 3, 1, 2, 1, 130000, '2020-04-23', '', 10000, ''),
(6, 3, 1, 5, 1, 150000, '2020-04-23', '', 10000, ''),
(7, 3, 2, 3, 1, 87000, '2020-04-23', '', 12000, ''),
(8, 3, 6, 3, 1, 95000, '2020-04-23', '', 20000, ''),
(9, 3, 3, 3, 1, 89000, '2020-04-23', '3 hari', 14000, ''),
(10, 3, 1, 4, 1, 143000, '2020-04-23', '1 hari', 10000, ''),
(11, 3, 1, 1, 1, 10100, '2020-04-23', '1 hari', 10000, '');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `id_waktu` int(11) NOT NULL,
  `lama_pinjam` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`id_waktu`, `lama_pinjam`, `tarif`) VALUES
(1, '1 hari', 10000),
(2, '2 hari', 12000),
(3, '3 hari', 14000),
(4, '4 hari', 16000),
(5, '5 hari', 18000),
(6, '6 hari', 20000),
(7, '7 hari', 22000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD UNIQUE KEY `username_peminjam` (`username_peminjam`);

--
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`id_peminjaman_buku`);

--
-- Indexes for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_peminjam` (`id_peminjam`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `id_peminjaman_buku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
