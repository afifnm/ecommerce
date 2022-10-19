-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2022 at 10:41 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `namafile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `kode_produk`, `namafile`) VALUES
(18, '202210180359545', '20221018090004.jpg'),
(19, '202210180359545', '20221018090010.jpg'),
(20, '202210180441455', '20221018094507.jpg'),
(22, '202210190904232', '20221019140844.jpg'),
(23, '202210190904232', '20221019140850.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `active`) VALUES
(6, 'Food', 0),
(7, 'Kecantikan', 0),
(8, 'Kerajinan dan Aksesoris', 0),
(9, 'Perlengkapan Rumah', 0),
(10, 'Fashion', 0);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(80) NOT NULL,
  `favicon` varchar(80) NOT NULL,
  `logo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `nama_website`, `favicon`, `logo`) VALUES
(1, 'Merch Tefa', 'fav.ico', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `active` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `stok` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama`, `deskripsi`, `id_kategori`, `active`, `tanggal`, `harga`, `stok`, `username`) VALUES
(7, '202210190904232', 'Basreng', '<p><span class="ILfuVd" lang="id"><span class="hgKElc"><strong>Basreng</strong> (berasal dari akronim bahasa Sunda: baso digor&eacute;ng, baso digoreng) adalah camilan khas Sunda yang terbuat dari olahan bakso ikan yang diiris tipis kemudian digoreng. <strong>Basreng</strong> dapat juga disajikan dengan taburan bumbu pedas.</span></span></p>', '6', 1, '2022-10-19 09:04:22', '10000', 100, 'root');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Pengguna') NOT NULL,
  `nama` varchar(70) NOT NULL,
  `tempat_lahir` varchar(40) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `kelas` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kelas`, `tahun_ajaran`, `email`, `no_hp`, `foto`, `active`, `last_login`) VALUES
(2, 'root', '$2y$05$vNyScV3/zLsCS2FFkMdtrufbXzrQIVdGAe34Z8pE7VxvoO9QMCsEu', 'Admin', 'Budimantaro, S.Kom, M.Kom', 'Boyolali', '1996-09-02', 'Karanganyar RT 02 RW 01, Bejen, Bejen, Karanganyar, 57444', '', '', 'manusiahalah@gmail.com', '896733333181', 'root.jpg', 1, '2022-10-10 10:26:02'),
(5, 'K3514003', '$2y$05$E6cvam62HaVPMszZTjWMoe48UBVmQMov05GvIkBg5Cjp2GWT7E9/e', 'Pengguna', 'Afif Nuruddin Maisaroh', 'Sukoharjo', '1996-06-08', 'Suruh RT 02 RW 01, Kayuapak, Polokarto, Sukoharjo, 57555', 'XI RB', '2011', 'afifnuruddinmaisaroh@gmail.com', '089673333318', 'K3514003.jpg', 1, '2022-10-12 11:18:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
