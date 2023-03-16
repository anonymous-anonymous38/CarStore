-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 01:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_carstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminn`
--

CREATE TABLE `adminn` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `passwordd` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminn`
--

INSERT INTO `adminn` (`id_admin`, `username`, `passwordd`, `nama_lengkap`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'paang7317@gmail.com', '1234567', 'Paang', '', '08129866689'),
(2, 'bilal@gmail.com', 'bilallll', 'bilal', '', '08593495729'),
(3, 'dmilanfahreza@gmail.com', 'wartam7317', 'Muhammad Farhan', 'Jakarta raya', '0480402832');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pembeli` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `alamat_pembeli`, `status_pembelian`) VALUES
(1, 1, '0000-00-00', 1456000, '', 'pending'),
(13, 1, '2023-01-22', 20000, '', 'pending'),
(14, 1, '2023-01-22', 20000, '', 'pending'),
(15, 1, '2023-01-22', 60000, '', 'pending'),
(16, 1, '2023-01-22', 60000, '', 'pending'),
(17, 1, '2023-01-22', 60000, '', 'pending'),
(18, 1, '2023-01-23', 40000, '', 'pending'),
(20, 1, '2023-01-23', 34444, '', 'pending'),
(21, 1, '2023-01-23', 74444, 'jakarta', 'pending'),
(22, 1, '2023-01-23', 34444, 'Bekasi Raya', 'pending'),
(23, 1, '2023-01-23', 20000, 'kakakakka', 'pending'),
(24, 1, '2023-01-23', 34444, 'hahha', 'pending'),
(25, 1, '2023-01-23', 128888, 'Jalan jakarta Raya', 'pending'),
(26, 1, '2023-01-23', 40000, 'Jalan bekasi raya', 'pending'),
(27, 1, '2023-01-23', 2147483647, 'Jalan Tebet Timur 4G no 8', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 1, 2),
(2, 14, 5, 1),
(3, 15, 4, 1),
(4, 15, 5, 1),
(5, 16, 4, 1),
(6, 16, 5, 1),
(7, 17, 4, 1),
(8, 17, 5, 1),
(9, 18, 4, 1),
(10, 19, 3, 1),
(11, 0, 3, 1),
(12, 0, 3, 1),
(13, 0, 4, 1),
(14, 0, 3, 2),
(15, 0, 3, 1),
(16, 20, 3, 1),
(17, 0, 5, 1),
(18, 0, 4, 1),
(19, 0, 3, 1),
(20, 21, 4, 1),
(21, 21, 3, 1),
(22, 22, 3, 1),
(23, 23, 5, 1),
(24, 24, 3, 1),
(25, 25, 3, 2),
(26, 25, 4, 1),
(27, 25, 5, 1),
(28, 26, 4, 1),
(29, 27, 9, 1),
(30, 27, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `berat_produk` int(11) DEFAULT NULL,
  `foto_produk` varchar(100) DEFAULT NULL,
  `deskripsi_produk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(3, 'Avanza 2012', 34444, 100, 't.jfif', '        Avanza Terbaru        '),
(5, 'Daihatsu MCVT', 20000, 10000, 'e.jfif', ''),
(8, 'Toyota 5678', 40000000, 21, 'y.jfif', ''),
(9, 'Agya CY567', 2147483647, 40, 't.jfif', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminn`
--
ALTER TABLE `adminn`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminn`
--
ALTER TABLE `adminn`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
